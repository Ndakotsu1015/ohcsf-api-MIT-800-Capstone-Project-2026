<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ChartCategory;
use App\Models\ChartProvider;

class ChartCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ChartCategory::class;

    public static $categories = [
        [1, 1, 'Bar'],
        [2, 1, 'Pie'],
        [3, 1, 'RangeBar'],
        [4, 1, 'Grid']
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category =  $this->faker->unique()->randomElement(self::$categories);

        return [
            'id' => $category[0],
            'chart_provider_id' => $category[1],
            'chart_category' => $category[2],
        ];
    }
}
