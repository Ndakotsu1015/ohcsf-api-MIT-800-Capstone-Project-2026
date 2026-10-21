<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ChartCategory;
use App\Models\ChartType;

class ChartTypeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChartType::class;

    public static $types = [
        [1, 1, 'bar'],
        [2, 2, 'doughnut'],
        [3, 1, 'spline'],
        [4, 1, 'stepline'],
        [5, 3, 'rangeBar'],
        [6, 4, 'grid']
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type =  $this->faker->unique()->randomElement(self::$types);

        return [
            'id' => $type[0],
            'chart_category_id' => $type[1],
            'chart_type' => $type[2],
        ];
    }
}
