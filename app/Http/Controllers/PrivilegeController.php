<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrivilegeStoreRequest;
use App\Http\Requests\PrivilegeUpdateRequest;
use App\Http\Resources\PrivilegeCollection;
use App\Http\Resources\PrivilegeResource;
use App\Models\PermissionDetail;
use App\Models\Privilege;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PrivilegeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \App\Http\Resources\PrivilegeCollection
     */
    public function index()
    {
        $privileges = Privilege::latest()->get();

        return new PrivilegeCollection($privileges->load('permissions', 'permissions.permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\PrivilegeResource
     */
    public function store(PrivilegeStoreRequest $request)
    {
        // Start a database transaction
        DB::beginTransaction();

        try {
            // Validate the request
            $data = $request->validated();

            $permissionIds = $data['permission_ids'];

            // Create the Privilege
            $privilege = Privilege::create([
                'name' => $data['name'],
            ]);

            // Create PermissionDetail entry for each permission_id in the request
            $this->createPermissionDetails($privilege->id, $permissionIds);

            DB::commit();
            return new PrivilegeResource($privilege->load('permissions', 'permissions.permission'));
        } catch (\Exception $e) {
            // An error occurred, roll back the transaction
            DB::rollBack();

            // Handle the exception, log or report it as needed
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }


    /**
     * Delete all PermissionDetails for a given privilege.
     *
     * @param int $privilegeId
     * @return void
     */
    protected function deleteAllPermissionDetailsForPrivilege($privilegeId)
    {
        PermissionDetail::where('privilege_id', $privilegeId)->delete();
    }

    /**
     * Deactivate or delete permissions not in the request.
     *
     * @param int $privilegeId
     * @param array $permissionsToDelete
     * @return void
     */
    protected function deleteOrDeactivatePermissions($privilegeId, $permissionsToDelete)
    {
        // In the future, consider deactivating instead of deleting
        PermissionDetail::where('privilege_id', $privilegeId)->whereIn('permission_id', $permissionsToDelete)->delete();
    }

    /**
     * Create PermissionDetail entries for given permission IDs.
     *
     * @param int $privilegeId
     * @param array $newPermissionIds
     * @return \Illuminate\Support\Collection
     */
    protected function createPermissionDetails($privilegeId, $newPermissionIds)
    {
        return collect($newPermissionIds)->map(function ($permissionId) use ($privilegeId) {
            $data = [
                'privilege_id' => $privilegeId,
                'permission_id' => $permissionId,
            ];
            return PermissionDetail::create($data);
        });
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Privilege  $privilege
     * @return \App\Http\Resources\PrivilegeResource
     */
    public function show(Privilege $privilege)
    {
        return new PrivilegeResource($privilege->load('permissions', 'permissions.permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Privilege  $privilege
     * @return \App\Http\Resources\PrivilegeResource
     */
    public function update(PrivilegeUpdateRequest $request, Privilege $privilege)
    {
        $data = $request->validated();

        // Start a database transaction
        DB::beginTransaction();

        try {
            // Update the Privilege name
            $privilege->update(['name' => $data['name']]);

            // Check if permission_ids array exists and is not empty
            if (empty($data['permission_ids'])) {
                $this->deleteAllPermissionDetailsForPrivilege($privilege->id);

                // Commit the transaction and return the response
                DB::commit();
                return new PrivilegeResource($privilege->load('permissions', 'permissions.permission'));
            }

            $newPermissionIds = $request->permission_ids;
            $existingPermissionIds = PermissionDetail::where('privilege_id', $privilege->id)->pluck('permission_id')->toArray();

            // Identify permission IDs to delete
            $permissionsToDelete = array_diff($existingPermissionIds, $newPermissionIds);

            // Deactivate or delete permissions not in the request
            $this->deleteOrDeactivatePermissions($privilege->id, $permissionsToDelete);

            // Create or update PermissionDetail entry for each permission_id in the request
            $this->createOrUpdatePermissionDetails($privilege->id, $data);

            DB::commit();
            return new PrivilegeResource($privilege->load('permissions', 'permissions.permission'));
        } catch (\Exception $e) {
            // An error occurred, roll back the transaction
            DB::rollBack();
            Log::alert($e);

            // Handle the exception, log or report it as needed
            // You can customize this part based on your application's needs
            return response()->json(['error' => 'Something went wrong.'], 500);
        }
    }

    /**
     * Create or update PermissionDetail entry for each permission_id in the request.
     *
     * @param  int  $privilegeId
     * @param  array  $data
     * @return void
     */
    protected function createOrUpdatePermissionDetails($privilegeId, $data)
    {
        $newPermissionIds = $data['permission_ids'];

        collect($newPermissionIds)->each(function ($permissionId) use ($privilegeId, $data) {
            $permissionDetail = PermissionDetail::where('privilege_id', $privilegeId)
                ->where('permission_id', $permissionId)
                ->first();

            if ($permissionDetail) {
                // Update existing PermissionDetail entry
                $permissionDetail->update($data);
            } else {
                // Create new PermissionDetail entry
                PermissionDetail::create(['privilege_id' => $privilegeId, 'permission_id' => $permissionId] + $data);
            }
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Privilege  $privilege
     * @return \Illuminate\Http\Response
     */
    public function destroy(Privilege $privilege)
    {
        $privilege->delete();

        return response()->noContent();
    }

}
