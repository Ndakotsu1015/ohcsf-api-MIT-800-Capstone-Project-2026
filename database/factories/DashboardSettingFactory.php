<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Chart;
use App\Models\ChartCategory;
use App\Models\ChartType;
use App\Models\DashboardSetting;
use App\Models\Module;
use App\Models\SubModule;

class DashboardSettingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DashboardSetting::class;
    // id
    // 'chart_id',
    // 'module_id',
    // 'chart_type_id',
    // 'chart_category_id',
    // 'chart_title',
    // 'is_active',
    // 'orderby',
    // 'is_group',
    // 'sub_module_id',

    public static $dashboardSettings = [
        // Affidavit Dashboard Settings
        [ "1", "1", "3", "1", "1", "Distribution of Agencies by Ministry", "1", "1", "0",  "1", "6",],
        [ "2", "1", "3", "2", "2", "% Distribution of Agencies by Ministry", "1", "2", "0",  "1", "6",]
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dashboardSetting =  $this->faker->unique()->randomElement(self::$dashboardSettings);

        return [
            'id' => $dashboardSetting[0],
            'chart_id' => $dashboardSetting[1],
            'module_id' => $dashboardSetting[2],
            'chart_type_id' => $dashboardSetting[3],
            'chart_category_id' => $dashboardSetting[4],
            'chart_title' => $dashboardSetting[5],
            'is_active' => $dashboardSetting[6],
            'orderby' => $dashboardSetting[7],
            'is_group' => $dashboardSetting[8],
            'sub_module_id' => $dashboardSetting[9],
            'column_width' => $dashboardSetting[10]
        ];
    }
}
