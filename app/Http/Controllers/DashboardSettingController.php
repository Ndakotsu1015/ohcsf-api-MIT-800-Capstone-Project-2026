<?php

namespace App\Http\Controllers;

use App\Http\Requests\DashboardSettingStoreRequest;
use App\Http\Requests\DashboardSettingUpdateRequest;
use App\Http\Resources\DashboardSettingCollection;
use App\Http\Resources\DashboardSettingResource;
use App\Models\DashboardSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardSettingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\DashboardSettingCollection
     */
    public function index(Request $request)
    {
        $dashboardSettings = DashboardSetting::latest()->get();

        return new DashboardSettingCollection($dashboardSettings);
    }

    /**
     * @param \App\Http\Requests\DashboardSettingStoreRequest $request
     * @return \App\Http\Resources\DashboardSettingResource
     */
    public function store(DashboardSettingStoreRequest $request)
    {
        $dashboardSetting = DashboardSetting::create($request->validated());

        return new DashboardSettingResource($dashboardSetting);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DashboardSetting $dashboardSetting
     * @return \App\Http\Resources\DashboardSettingResource
     */
    public function show(Request $request, DashboardSetting $dashboardSetting)
    {
        return new DashboardSettingResource($dashboardSetting);
    }

    /**
     * @param \App\Http\Requests\DashboardSettingUpdateRequest $request
     * @param \App\Models\DashboardSetting $dashboardSetting
     * @return \App\Http\Resources\DashboardSettingResource
     */
    public function update(DashboardSettingUpdateRequest $request, DashboardSetting $dashboardSetting)
    {
        $dashboardSetting->update($request->validated());

        return new DashboardSettingResource($dashboardSetting);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DashboardSetting $dashboardSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DashboardSetting $dashboardSetting)
    {
        $dashboardSetting->delete();

        return response()->noContent();
    }

    public function dashboard($id)
    {
        $dashboardSettings = DashboardSetting::where(['sub_module_id' => $id, 'is_active' => true])->oldest('orderby')->get();
        return DashboardSettingResource::collection($dashboardSettings);
    }

    public function dashboardfilter(Request $request, $id)
    {

        $payload = $request->validate([
            'from' => 'nullable|date',
            'to' => 'nullable|date',
            'court_id' => 'nullable|integer'
        ]);

        //re-format the date
        $fromDate = Carbon::createFromDate($payload['from']);
        $tillDate = Carbon::createFromDate($payload['to']);

        // caache the dashboard settings
        $dashboardSettings = DashboardSetting::where(['sub_module_id' => $id, 'is_active' => true])->oldest('orderby')->get();
        // });

        // $contracts = cache()->remember('affidavits', now()->addMinutes(1), function () use ($fromDate, $tillDate, $payload) {
        //     if($payload['from'] != null){
        //         $affidavits = Affidavit::where('created_at', '>=', $fromDate);
        //         if($payload['to']!= null)
        //             $affidavits->where('created_at', '<=', $tillDate);
        //     }
        //     if($payload['from'] == null && $payload['to']!= null)
        //         $affidavits = Affidavit::where('created_at', '<=', $tillDate);
        //     return $affidavits->get();
        // });


        return DashboardSettingResource::collection($dashboardSettings);
    }
}
