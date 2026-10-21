<?php

namespace Database\Seeders;

use App\Models\ChartCategory;
use Database\Factories\ChartCategoryFactory;
use Illuminate\Database\Seeder;

class ChartCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the privilege classes to upsert
        $categories = collect(ChartCategoryFactory::$categories)->map(function ($category) {
            return [
                'id' => $category[0],
                'chart_provider_id' => $category[1],
                'chart_category' => $category[2],
            ];
        })->toArray();

        // Perform upsert operation
        ChartCategory::upsert(
            $categories,
            ['id'],   // Unique key to check on conflict
            ['chart_provider_id', 'chart_category']  // Columns to update if there's a conflict
        );

        // ChartCategory::factory()->count(5)->create();
        // ChartCategory::factory(count(ChartCategoryFactory::$categories))->create();
    }
}
