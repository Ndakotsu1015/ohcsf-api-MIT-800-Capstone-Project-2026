<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "id" => 1,
                "name" => "Test User",
                "email" => "test@ohcsf.gov.ng",
                "password" => Hash::make('password'),
                "email_verified" => true,
                "is_active" => true,
                "user_type" => "HR",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ],
            [
                "id" => 2,
                "name" => "PS",
                "email" => "ps@ohcsf.gov.ng",
                "password" => Hash::make('password'),
                "email_verified" => true,
                "is_active" => true,
                "user_type" => "PS",
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        ];

        DB::table('users')->upsert(
            $users,
            ["id"],
            ["name", "email", "password", "email_verified", "is_active", "user_type", "updated_at"]
        );
    }
}
