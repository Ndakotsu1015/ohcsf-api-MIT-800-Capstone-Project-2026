<?php

namespace Database\Seeders;

use App\Models\Deployment;
use Illuminate\Database\Seeder;

class DeploymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deployment::factory()->count(100)->create();
    }
}
