<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RedeploymentRequests>
 */
class RedeploymentRequestsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_id' => Unit::inRandomOrder()->first()->id ?? Unit::factory(),
            'employee_id' => Employee::inRandomOrder()->first()->id ?? Employee::factory(),
            'reason' => $this->faker->paragraph,
            'request_letter_file' => 'sample.pdf',
            'status' => $this->faker->randomElement(['Approved', 'Pending', 'Rejected']),
            'request_type' => $this->faker->randomElement(['Special', 'Compassionate']),
            'approved_by' => User::factory(),
        ];
    }
}
