<?php

namespace Database\Seeders;

use App\Models\DashboardSetting;
use Database\Factories\DashboardSettingFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DashboardSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

                        // get the number of chats
                        $dashboardSettingsCount = count(DashboardSettingFactory::$dashboardSettings);

                        // generate dashboardSettings using the factory
                        $dashboardSettings = DashboardSetting::factory()
                        ->count($dashboardSettingsCount)
                        ->make()
                        ->toArray();
        
                        // perform upsert operation
                        DashboardSetting::upsert($dashboardSettings,
                        ['id'],
                        [
                            'chart_id',
                            'module_id',
                        'chart_type_id',
                    'chart_category_id',
                          'chart_title',
                            'is_active',
                              'orderby',
                        'sub_module_id',
                        ]
                    );
        // DashboardSetting::factory()->count(5)->create();
        // DashboardSetting::factory(count(DashboardSettingFactory::$dashboardSettings))->create();
    }
}
