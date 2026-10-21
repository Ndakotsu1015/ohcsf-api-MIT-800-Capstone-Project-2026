<?php

namespace Database\Seeders;

use Database\Factories\PermissionFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allPermissions = PermissionFactory::$permissions;

        // seed super admin permissions
        foreach ($allPermissions as $permissionArray) {
            $privilegeArray = $permissionArray[4];

            foreach ($privilegeArray as $privilegeId) {
                DB::table('permission_details')->upsert([
                    [
                        'is_active' => true,
                        'privilege_id' => $privilegeId,
                        'permission_id' => $permissionArray[0],
                        'created_at' => now()
                    ]
                ], 
                [], // Unique keys to determine duplicates
                [ 'is_active','privilege_id','permission_id'] // Columns to update if a duplicate is found
                );
            }
        }
    }
}

