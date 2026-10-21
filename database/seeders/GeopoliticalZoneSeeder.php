<?php

namespace Database\Seeders;

use App\Models\GeopoliticalZone;
use Illuminate\Database\Seeder;
use DB;

class GeopoliticalZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // GeopoliticalZone::factory()->count(5)->create();
        $zones = [
            ['name' => 'North Central (NC)'],
            ['name' => 'North East (NE)'],
            ['name' => 'North West (NW)'],
            ['name' => 'South East (SE)'],
            ['name' => 'South South (SS)'],
            ['name' => 'South West (SW)'],
        ];

        foreach ($zones as $zone) {
            GeopoliticalZone::create($zone);
        }
    }
}
