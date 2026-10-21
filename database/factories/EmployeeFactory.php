<?php

namespace Database\Factories;

use App\Models\Lga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'passport_file' => $this->faker->imageUrl(),
            'title' => $this->faker->randomElement(['Mr', 'Mrs', 'Miss']),
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->optional()->firstName,
            'last_name' => $this->faker->lastName,
            'date_birth' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'marital_status' => $this->faker->randomElement(['Single', 'Married', 'Divorced', 'Widowed']),
            'residential_address' => $this->faker->address,
            'permanent_address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'nationality' => 'Nigerian',
            'nin' => $this->faker->randomNumber(11),
            'lga_id' => Lga::inRandomOrder()->first()->id,
            'email_address' => $this->faker->unique()->safeEmail,
            'IPPS_no' => $this->faker->randomNumber(10),
            'employee_no' => $this->faker->randomNumber(10),
        ];
    }
}
