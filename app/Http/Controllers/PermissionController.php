<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use App\Http\Resources\PermissionCollection;
use App\Http\Resources\PermissionResource;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \App\Http\Resources\PermissionCollection
     */
    public function index()
    {
        $permissions = Permission::latest()->get();

        return new PermissionCollection($permissions);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StorePermissionRequest $request
     * @return \App\Http\Resources\PermissionResource
     */
    public function store(StorePermissionRequest $request)
    {
        $permission = Permission::create($request->validated());

        return new PermissionResource($permission);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Permission $permission
     * @return \App\Http\Resources\PermissionResource
     */
    public function show(Permission $permission)
    {
        return new PermissionResource($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdatePermissionRequest $request
     * @param \App\Models\Permission $permission
     * @return \App\Http\Resources\PermissionResource
     */
    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $permission->update($request->validated());

        return new PermissionResource($permission);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return response()->noContent();
    }
}
