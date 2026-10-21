<?php

namespace Database\Seeders;

use App\Models\Chart;
use Database\Factories\ChartFactory;
use Illuminate\Database\Seeder;

class ChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                // get the number of chats
                $chartSeeders = count(ChartFactory::$chats);

                // generate chats using the factory
                $chats = Chart::factory()
                ->count($chartSeeders)
                ->make()
                ->toArray();

                // perform upsert operation
                Chart::upsert($chats,
                ['id'],
                [
                    'chart_title',
                    'chart_type_id',
                    'chart_category_id',
                    'sql_query',
                    'sql_query2',
                    'isActive',
                    'module_id',
                    'filterColumn',
                ]
            );
        // Chart::factory()->count(5)->create();
        // Chart::factory(count(ChartFactory::$chats))->create();
    }
}
