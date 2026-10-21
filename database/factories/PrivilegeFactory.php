<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Privilege>
 */
class PrivilegeFactory extends Factory
{

    /**
     * Privileges
     *
     * @var array
     */
    public static $privileges = [
        [1, 'Super Administrator'],
        [2, 'Administrator'],
        [3, 'Technical Staff'],
        [4, 'Revenue Administrator'],
        [5, 'Revenue Staff'],
        [6, 'Probate Administrator'],
        [7, 'Probate Staff'],
        [8, 'Process Administrator'],
        [9, 'Process Staff'],
        [10, 'Admin-Fresh-File'],
        [11, 'Chief Registrar'],
        [12, 'Commissioner for Oath']
    ];

    public static function getPrivilegeIdByName(String $searchName)
    {
        foreach (self::$privileges as $privilege) {
            if ($privilege[1] == $searchName) {
                return $privilege[0];
            }
        }
        return null;
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $privilege = $this->faker->unique()->randomElement(self::$privileges);
        return [
            'id' => $privilege[0],
            'name' => $privilege[1],
            // 'created_by' => \App\Models\Employee::inRandomOrder()->first(),
            'created_at' => now(),
        ];
    }
}
