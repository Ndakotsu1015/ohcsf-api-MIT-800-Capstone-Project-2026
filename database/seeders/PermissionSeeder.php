<?php

namespace Database\Seeders;

use App\Models\Permission;
use Database\Factories\PermissionFactory;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Retrieve the permissions array from the factory
        $permissions = PermissionFactory::$permissions;

        // Prepare the permission data for upsert
        $permissionData = array_map(function ($permission) {
            return [
                'id' => $permission[0],
                'name' => $permission[1],
                'code' => $permission[2],
                'category' => PermissionFactory::$categories[$permission[3]][1],
                'created_at' => now(),
            ];
        }, $permissions);

        // Upsert the permissions based on 'id'
        Permission::upsert($permissionData, ['id'], ['name', 'code', 'category', 'created_at']);
    }
}
