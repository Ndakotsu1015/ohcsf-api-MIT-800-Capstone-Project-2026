<?php

namespace Database\Seeders;

use App\Models\Redeployment;
use Illuminate\Database\Seeder;

class RedeploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Redeployment::factory()->count(5)->create();
    }
}
