<?php

namespace Database\Seeders;

use App\Models\Cadre;
use Illuminate\Database\Seeder;

class CadreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cadres = [
            [
                'name' => 'Director',
                'description' => 'Top-level management responsible for policy implementation.',
            ],
            [
                'name' => 'Senior',
                'description' => 'Senior officers with high-level decision-making responsibilities.',
            ],
            [
                'name' => 'Mid Level Officers',
                'description' => 'Middle management bridging senior and junior officers.',
            ],
            [
                'name' => 'Junior',
                'description' => 'Entry-level officers handling routine tasks and responsibilities.',
            ],

            [
                'name' => 'Permanent Secretary',
                'description' => 'Top government official responsible for ministry administration.',
            ],
            [
                'name' => 'Head Of Service',
                'description' => 'The highest-ranking official overseeing public service operations.',
            ],
        ];

        foreach ($cadres as $cadre) {
            Cadre::updateOrCreate(['name' => $cadre['name']], $cadre);
        }
    }
    }

