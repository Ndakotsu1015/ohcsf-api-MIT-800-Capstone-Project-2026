<?php

namespace App\Http\Controllers;

use App\Http\Resources\ModuleCollection;
use App\Http\Resources\ModuleResource;
use App\Models\MenuAuthorization;
use App\Models\Module;
use Illuminate\Http\Request;
use App\Enums\UserType;
use Illuminate\Support\Facades\Log;

class ModuleController extends Controller
{

    private $withList = [
        'menus',
        'menus.parentMenu',
        'menus.module'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\ModuleCollection
     */
    public function index()
    {
        $modules = Module::latest()->get();

        return new ModuleCollection($modules);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $module = Module::create($request->validated());

        return new ModuleResource($module);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        return new ModuleResource($module);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        $module->update($request->validated());

        return new ModuleResource($module);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $module->delete();

        return response()->noContent();
    }

    public function myList(Request $request)
    {
        $menuAuthorizationCount = MenuAuthorization::count();
        $menus = [];
        $modules = [];
        $moduleIds = [];

        // // implement only if there is at least one assigned privilege
        // // else just  grant global privileges, give access to all menus and modules
        if ($menuAuthorizationCount > 0) {

            $currentUserPrivileges = auth()->user()->privileges()->pluck("privileges.id");

            $menus = MenuAuthorization::whereNull('privilege_id')
                ->orWhereIn('privilege_id', $currentUserPrivileges)
                ->with('menu')
                ->get()
                ->pluck('menu');



            $menus = $menus->filter(function ($query) {
                return $query->is_active;
            });

            $menus = $menus->sortBy(function ($query) {
                return $query->order;
            });

            // get the modules of all menus in $menus
            $moduleIds = $menus->map(function ($item, $key) {
                return $item['module_id'];
            });

            // get the modules of all menus in $menus
            $menuIds = $menus->map(function ($item, $key) {
                return $item['id'];
            });

            $modules = Module::where('active_id', 1)->whereIn('id', $moduleIds)->with([
                'menus' => function ($query) use ($menuIds) {
                    $query->whereIn('id', $menuIds);
                },
                'menus.parentMenu',
                'menus.module'
            ])->oldest('order_by')->get();
            $modules->menus = $menus;
        } else {
            $modules = Module::with($this->withList)->where('active_id', 1)->oldest('order_by')->get();
        }


        return ModuleResource::collection($modules);
    }


    public function toggleModules(Request $request)
    {
        $privileges = collect(auth()->user()->privileges->pluck('name'));
        $is_super_admin = $privileges->contains('Super Administrator');

        // Validate the request payload
        $validated = $request->validate([
            'payload' => 'required|array',
        ]);

        // Check if the authenticated user is a super admin
        if (!$is_super_admin) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized. Only Super Admins can perform this action.'
            ], 403); // 403 Forbidden
        }

        foreach ($validated['payload'] as $mdule) {
            $module = Module::find($mdule['module_id']);
            if($mdule['is_client']){
                $module->is_client_active = $mdule['is_active'];

            } else {
                $module->active_id = $mdule['is_active'];

            }
            $module->save();
        }

        $modules = Module::latest()->get();

        // Return Module Collection
        return new ModuleCollection($modules);
       }
}
