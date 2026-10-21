<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PermissionDetail>
 */
class PermissionDetailFactory extends Factory
{

    public static function getAllPermissions()
    {
        // $permissions = array();
        // foreach(PermissionFactory::$permissions as $permission) {
        //     array_push($permissions, $permission[0]);
        // }

        return PermissionFactory::$permissions;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $permissionDetail = $this->faker->unique()->randomElement(self::$permissionDetails);

        return [
            // 'id' => $permissionDetail[0],
            // 'is_active' => $permissionDetail[1],
            // 'privilege_id' => $permissionDetail[2],
            // 'permission_id' => $permissionDetail[3],
            // 'created_at' => date('Y-m-d')
        ];
    }
}
