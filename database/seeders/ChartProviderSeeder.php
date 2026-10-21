<?php

namespace Database\Seeders;

use App\Models\ChartProvider;
use Illuminate\Database\Seeder;

class ChartProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "id"=> 1,
                'chart_provider' => 'Chart.js',
            ]
        ];

        // Perform upsert
        ChartProvider::upsert(
            $data,
            ['id'], // Unique constraint to determine whether to update or insert
            ['chart_provider']  // Fields to update if the record already exists
        );
    }
}
