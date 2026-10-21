<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrivilegeClass>
 */
class PrivilegeClassFactory extends Factory
{

    /**
     * Privileges
     *
     * @var array
     */
    public static $privilegeClasses = [
        [1, 'Deactivation'],
        [2, 'Activation'],
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $privilegeClass = $this->faker->unique()->randomElement(self::$privilegeClasses);
        return [
            'id' => $privilegeClass[0],
            'name' => $privilegeClass[1],
            'created_at' => now(),
        ];
    }
}
