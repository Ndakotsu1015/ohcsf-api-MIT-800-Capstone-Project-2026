<?php

namespace Database\Seeders;

use App\Models\RedeploymentRequests;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RedeploymentRequestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RedeploymentRequests::factory()->count(10)->create();
    }
}
