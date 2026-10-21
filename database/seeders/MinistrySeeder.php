<?php

namespace Database\Seeders;

use App\Models\Ministry;
use Illuminate\Database\Seeder;

class MinistrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ministry::factory()->count(5)->create();
        $ministries = [
            'Office of the Head of Civil Service of the Federation',
            'Federal Ministry of Mines and Steel Development',
            'Federal Ministry of Water Resources and Sanitation',
            'Federal Ministry of Housing & Urban Development',
            'Federal Ministry of Environment',
            'Federal Ministry of Justice',
            'Federal Ministry of Works',
            'Federal Ministry of Education',
            'Federal Ministry of Budget and Economic Planning',
            'Federal Ministry of Health and Social Welfare',

            'Ministry of Solid Minerals Development',
            'Federal Ministry of Marine and Blue Economy',
            'Federal Ministry of Humanitarian Affairs And Poverty Alleviation',
            'Federal Ministry of Sports Development',
            'Ministry of Arts, Culture And Creative Economy/Tourism',
            'Ministry of Information and National Orientation',
            'Federal Ministry of Women Affairs',
            'Federal Ministry of Finance',
            'Federal Ministry of Information and Culture',
            'Ministry of Petroleum Resources',
            'Federal Ministry of Youth Development',
            'Federal Ministry of Power & Steel',
            'Federal Ministry of Aviation',
            'Federal Ministry of Transport',
            'Federal Ministry of Science and Technology and Innovation',
            'Federal Ministry of Labour,Employment and Productivity',
            'Federal Ministry of Industry, Trade, and Investment',
            'Federal Ministry of Agriculture and Food Security',
            'Federal Ministry of Interior',
            'Federal Ministry of Communication and Digital Economy',
            'Ministry of Foreign Affairs',
            'Federal Ministry of Defense',
        ];

        foreach ($ministries as $ministry) {
            Ministry::create([
                'name' => $ministry,
            ]);
        }
    }
}
