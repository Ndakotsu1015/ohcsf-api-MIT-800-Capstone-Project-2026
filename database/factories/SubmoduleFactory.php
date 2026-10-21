<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Submodule;

class SubmoduleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Submodule::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'submodule' => $this->faker->word,
            'module_id' => $this->faker->randomNumber(),
            'isActive' => $this->faker->boolean,
        ];
    }
}
