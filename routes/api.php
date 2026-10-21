<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeploymentController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\RedeploymentRequestsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BranchController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/redeployments/approve-multiple', [DeploymentController::class, 'approveMultipleRequests']);

Route::post('/redeployments/approve-multiple-requests', [RedeploymentRequestsController::class, 'approveMultipleRedeploymentRequests'])
    ->middleware(['auth:sanctum']);

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [AuthController::class, 'login']);

    Route::group(['middleware' => 'auth:sanctum',], function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    });
});


Route::apiResource('geopolitical-zones', App\Http\Controllers\GeopoliticalZoneController::class);

Route::apiResource('states', App\Http\Controllers\StateController::class);

Route::apiResource('lgas', App\Http\Controllers\LgaController::class);

Route::apiResource('ministries', App\Http\Controllers\MinistryController::class);

Route::apiResource('agencies', App\Http\Controllers\AgencyController::class);

Route::get('branches/by-source', [App\Http\Controllers\BranchController::class, 'getBySource']);

Route::apiResource('branches', App\Http\Controllers\BranchController::class);


Route::apiResource('designations', App\Http\Controllers\DesignationController::class);

Route::apiResource('departments', App\Http\Controllers\DepartmentController::class);

Route::apiResource('divisions', App\Http\Controllers\DivisionController::class);

Route::apiResource('units', App\Http\Controllers\UnitController::class);

Route::get('deployments/count', [DeploymentController::class, 'getTotalDeployments']);

Route::get('deployments/re-deployment-proposed-count', [DeploymentController::class, 'getTotalProposedRedeployments']);

Route::get('/deployments/redeployed/count', [DeploymentController::class, 'getTotalRedeployedDeployments']);

Route::apiResource('deployments', App\Http\Controllers\DeploymentController::class);


Route::get('proposed-list', [App\Http\Controllers\DeploymentController::class, 'getProposedList']);

Route::apiResource('redeployment-requests', App\Http\Controllers\RedeploymentRequestsController::class);

Route::put('redeployment-requests/{id}/toggle-status', [RedeploymentRequestsController::class, 'toggleStatus']);

Route::apiResource('chart', App\Http\Controllers\ChartController::class);

Route::apiResource('chart-category', App\Http\Controllers\ChartCategoryController::class);

Route::apiResource('chart-provider', App\Http\Controllers\ChartProviderController::class);

Route::apiResource('chart-type', App\Http\Controllers\ChartTypeController::class);

Route::apiResource('dashboard-setting', App\Http\Controllers\DashboardSettingController::class);

Route::get('dashboard/{id}', [App\Http\Controllers\DashboardSettingController::class, 'dashboard']);

Route::post('dashboard/{id}', [App\Http\Controllers\DashboardSettingController::class, 'dashboardFilter']);

Route::apiResource('modules', App\Http\Controllers\ModuleController::class);

Route::patch('/toggle-modules', [App\Http\Controllers\ModuleController::class, 'toggleModules'])->name('toggleModules');

Route::apiResource('menus', App\Http\Controllers\MenuController::class);

Route::apiResource('menu-authorizations', App\Http\Controllers\MenuAuthorizationController::class); //->middleware('log.activity:Performed action on menu authorizations');

Route::post('/menu-authorizations/add', [App\Http\Controllers\MenuAuthorizationController::class, 'add']);

Route::apiResource('modules', App\Http\Controllers\ModuleController::class);

Route::get('/my-list', [App\Http\Controllers\ModuleController::class, 'myList'])->name('myList');

Route::apiResource('privileges', App\Http\Controllers\PrivilegeController::class);

Route::apiResource('privilege-classes', App\Http\Controllers\PrivilegeClassController::class);

Route::apiResource('privilege-details', App\Http\Controllers\PrivilegeDetailController::class); //->middleware('log.activity:Performed action on user privileges');

Route::post('/privilege-details/add', [App\Http\Controllers\PrivilegeDetailController::class, 'add']);

Route::apiResource('redeployments', App\Http\Controllers\RedeploymentController::class);
Route::prefix('file')/*->middleware('auth:api')*/ ->group(function () {
    Route::post('/upload', [FileUploadController::class, 'upload'])->name('file.upload');

    Route::get('/get/{filename}/{visibility?}', [FileUploadController::class, 'getFile'])->name('file.get');
});


Route::apiResource('cadres', App\Http\Controllers\CadreController::class);

Route::apiResource('grade-levels', App\Http\Controllers\GradeLevelController::class);
