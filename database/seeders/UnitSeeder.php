<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Unit under Federal Ministry of Environment
        DB::table('units')->upsert([
            // units under Legal department of Federal Ministry of Environment
            ["id" => 1, "name" => "Information and Corporate Communications Unit", "division_id" => 1,"created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 2, "name"  => "ICT Unit", "division_id"  => 1, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 3, "name"  => "Legal Audit", "division_id"   => 1, "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["id" => 4, "name"   => "Protocol Unit", "division_id"   => 1, "created_at" => Carbon::now(), "updated_at" => Carbon::now()],
            ["id" => 5, "name"   => "Reform Unit", "division_id"   => 1, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 6, "name"   => "Procurement Unit", "division_id"   => 1, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],

            // unit under Federal Ministry of Health and Social Welfare
            ["id" => 7, "name"   => "Information communication technology", "division_id" => 42, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 8, "name"   => "Servicom", "division_id" => 42, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 9, "name"   => "Legal Audit", "division_id" => 42, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 10, "name"   => "Protocol Unit", "division_id" => 42, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 11, "name"   => "Stock Verification", "division_id" => 42, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 12, "name"   => "Procurement Unit", "division_id" => 42, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 13, "name"   => "Policy", "division_id" => 42, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],

            // unit under Federal Ministry of Housing & Urban Development

            ["id" => 14, "name"   => "Legal Services", "division_id" => 8, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 14, "name"   => "Press and Public Relations", "division_id" => 8, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 14, "name"   => "Office of the Permanent Secretary", "division_id" => 8, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 14, "name"   => "Audit", "division_id" => 8, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 14, "name"   => "Protocol", "division_id" => 8, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 14, "name"   => "Public Private Partnership", "division_id" => 8, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 14, "name"   => "Reforms, Servicom and Anti-Corruption Unit", "division_id" => 8, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 14, "name"   => "CADASTRAL AND LEGAL SURVEYS", "division_id" => 8, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],
            ["id" => 14, "name"   => "Special Project Unit (SPU)", "division_id" => 8, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],

            // ["id" => 14, "name"   => , "division_id" => 8, "created_at" => Carbon::now(),"updated_at" => Carbon::now()],







            // ["id" => 4, "name"   => "Unit D", "division_id"   => 2],
            // Add additional sample units as needed...
        ],
        ["id"], // Unique key for checking duplicates
        ["name", "division_id", "updated_at"] // Columns to update if a record exists
    );
}
}






