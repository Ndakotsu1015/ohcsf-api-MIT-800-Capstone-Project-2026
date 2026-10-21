<?php

namespace Database\Seeders;

use App\Models\Chart;
use App\Models\ChartCategory;
use App\Models\ChartProvider;
use App\Models\ChartType;
use App\Models\DashboardSetting;
use App\Models\Module;
use App\Models\Submodule;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        $this->call([
            UserSeeder::class,
            GeopoliticalZoneSeeder::class,
            StateSeeder::class,
            LgaSeeder::class,
            MinistrySeeder::class,
            AgencySeeder::class,
            BranchSeeder::class,
            DepartmentSeeder::class,
            DivisionSeeder::class,
            UnitSeeder::class,
            DesignationSeeder::class,
            CadreSeeder::class,
            GradeLevelSeeder::class,
            EmployeeSeeder::class,
            DeploymentSeeder::class,
            ModuleSeeder::class,
            SubModuleSeeder::class,
            ChartProviderSeeder::class,
            ChartCategorySeeder::class,
            ChartTypeSeeder::class,
            ChartSeeder::class,
            DashboardSettingSeeder::class,

        ]);
    }
}
