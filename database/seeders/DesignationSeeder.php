<?php

namespace Database\Seeders;

use App\Models\Designation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $designations = [
            ['name' => 'Head of the Civil Service of the Federation', 'division_id' => 1],
            ['name' => 'Permanent Secretary', 'division_id' => 1],
            ['name' => 'Director', 'division_id' => 1],
            ['name' => 'Deputy Director', 'division_id' => 1],
            ['name' => 'Assistant Director', 'division_id' => 1],
            ['name' => 'Principal Officer', 'division_id' => 1],
            ['name' => 'Senior Officer', 'division_id' => 1],
            ['name' => 'Officer', 'division_id' => 1], 
            ['name' => 'Administrative Staff', 'division_id' => 1],
            ['name' => 'Technical Staff', 'division_id' => 1],
        ];

        foreach ($designations as $designation) {
            Designation::create($designation);
        }
    }
}
