<?php

namespace Database\Seeders;

use App\Models\Privilege;
use Database\Factories\PrivilegeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the privileges to upsert
        $privileges = collect(PrivilegeFactory::$privileges)->map(function ($privilege) {
            return [
                'id' => $privilege[0],
                'name' => $privilege[1],
                'created_at' => now(),
                // 'code' => substr(string: $privilege[1], offset: 0, length: 4)
            ];
        })->toArray();

        // Perform upsert operation
        Privilege::upsert(
            $privileges,
            ['id'],   // Unique key to check on conflict
            ['name']  // Columns to update if there's a conflict
        );
    }

}
