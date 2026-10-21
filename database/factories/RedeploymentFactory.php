<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Deployment;
use App\Models\Designation;
use App\Models\Redeployment;
use App\Models\Unit;

class RedeploymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Redeployment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'unit_id' => Unit::factory(),
            'designation_id' => Designation::factory(),
            'request_type' => fake()->randomElement(["Special","Compassionate"]),
            'deployment_id' => Deployment::factory(),
            'benefit' => fake()->text(),
            'request_letter_file' => fake()->word(),
            'effective_date' => fake()->date(),
            'end_date_report' => fake()->date(),
            'remarks' => fake()->text(),
        ];
    }
}
