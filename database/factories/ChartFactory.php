<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Chart;
use App\Models\ChartCategory;
use App\Models\ChartType;

class ChartFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chart::class;
    // id
    // 'chart_title',
    // 'chart_type_id',
    // 'chart_category_id',
    // 'sql_query',
    // 'isActive',
    // 'module_id',
    // 'filterColumn',
    public static $chats = [
        ["1", "TEst", "1",  "1", "SELECT count(*) total, Replace(Replace(m.name,'Federal Ministry of ',''),'Ministry of ','') name  FROM ministries m inner JOIN agencies a ON m.id = a.ministry_id
 group BY m.name Order by name",  "1",  "1",  "name",  "n",]];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $chat =  $this->faker->unique()->randomElement(self::$chats);

        return [
            'id' => $chat[0],
            'chart_title' => $chat[1],
            'chart_type_id' => $chat[2],
            'chart_category_id' => $chat[3],
            'sql_query' => $chat[4],
            'isActive' => $chat[5],
            'module_id' => $chat[6],
            'filterColumn' => $chat[7],
            'sql_query2' => $chat[8],
        ];
    }
}
