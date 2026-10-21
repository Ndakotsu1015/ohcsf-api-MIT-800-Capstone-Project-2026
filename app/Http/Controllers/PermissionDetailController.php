<?php

namespace App\Http\Controllers;

use App\Models\PermissionDetail;
use App\Http\Requests\StorePermissionDetailRequest;
use App\Http\Requests\UpdatePermissionDetailRequest;
use App\Http\Resources\PermissionDetailCollection;
use App\Http\Resources\PermissionDetailResource;

class PermissionDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\PermissionDetailCollection
     */
    public function index()
    {
        $permissionDetails = PermissionDetail::with('privilege', 'permission')->latest()->get();

        return new PermissionDetailCollection($permissionDetails);
    }


   /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePermissionDetailRequest $request
     * @return \App\Http\Resources\PermissionDetailCollection
     */
    public function store(StorePermissionDetailRequest $request)
    {
        $data = $request->validated();

        // get permission id array
        $permissionIds = $data['permission_id'];

        // Create PermissionDetail for each permission_id
        $permissionDetails = collect($permissionIds)->map(function ($permissionId) use ($data) {
            $data['permission_ids'] = $permissionId;

            return PermissionDetail::create($data);
        });

        return new PermissionDetailCollection($permissionDetails);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermissionDetail  $permissionDetail
     * @return \App\Http\Resources\PermissionDetailResource
     */
    public function show(PermissionDetail $permissionDetail)
    {
        return new PermissionDetailResource($permissionDetail->load('privilege', 'permission'));
    }

    /**
     * Get all PermissionDetail entries by privilege_id.
     *
     * @param int $privilegeId
     * @return \App\Http\Resources\PermissionDetailCollection
     */
    public function getByPrivilegeId($privilegeId)
    {
        $permissionDetails = PermissionDetail::where('privilege_id', $privilegeId)->get();

        return new PermissionDetailCollection($permissionDetails->load('privilege','permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermissionDetailRequest  $request
     * @param  \App\Models\PermissionDetail  $permissionDetail
     * @return \App\Http\Resources\PermissionDetailResource
     */
    public function update(UpdatePermissionDetailRequest $request, PermissionDetail $permissionDetail)
    {
        $permissionDetail->update($request->validated());

        return new PermissionDetailResource($permissionDetail->load('privilege', 'permission'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermissionDetail  $permissionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermissionDetail $permissionDetail)
    {
        $permissionDetail->delete();

        return response()->noContent();
    }
}
