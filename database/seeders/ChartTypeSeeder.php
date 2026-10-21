<?php

namespace Database\Seeders;

use App\Models\ChartType;
use Database\Factories\ChartTypeFactory;
use Illuminate\Database\Seeder;

class ChartTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the privilege classes to upsert
        $types = collect(ChartTypeFactory::$types)->map(function ($type) {
            return [
                'id' => $type[0],
                'chart_category_id' => $type[1],
                'chart_type' => $type[2],
            ];
        })->toArray();

        // Perform upsert operation
        ChartType::upsert(
            $types,
            ['id'],   // Unique key to check on conflict
            ['chart_category_id', 'chart_type']  // Columns to update if there's a conflict
        );
        // ChartType::factory()->count(5)->create();
        // ChartType::factory(count(ChartTypeFactory::$types))->create();
    }
}
