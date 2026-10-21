<?php

namespace Database\Factories;

use App\Models\Privilege;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrivilegeDetail>
 */
class PrivilegeDetailFactory extends Factory
{

    //To Do: get ID's from of privileges directly

    // public $adminPrivilegeId = 2;
    // public $commissionerPrivilegeId = 1;
    // public $revenueAdminPrivilegeId = 7;

    /**
     * Privilege Details
     *
     * @var array
     * id
     * privilege_class_id
     * user_id
     * privilege_id
     *
     * Administrator
     * Commissioner for Oath
     * Revenue
     */
    public static $privilegeDetails = [
        [1, 2, 1, 1], //super
        [2, 2, 2, 2], //admin
        [3, 2, 3, 3], //technical staff
        [4, 2, 4, 4], //revenue admin
        [5, 2, 11, 10], //admin fresh file
        [6, 2, 12, 11], //chief registrer
        [7, 2, 13, 12], //commisioner  for oath
        [8, 2, 6, 6], //probate admin
        [9, 2, 9, 9], //process staff
        [10, 2, 5, 5], //revenue staff
        [11, 2, 8, 8], //process admin
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $privilegeDetail = $this->faker->unique()->randomElement(self::$privilegeDetails);
        return [
            'id' => $privilegeDetail[0],
            'privilege_class_id' => $privilegeDetail[1],
            'user_id' => $privilegeDetail[2],
            'privilege_id' => $privilegeDetail[3],
            'created_at' => date('Y-m-d')
        ];
    }
}
