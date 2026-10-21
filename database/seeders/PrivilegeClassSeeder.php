<?php

namespace Database\Seeders;

use App\Models\PrivilegeClass;
use Database\Factories\PrivilegeClassFactory;
use Illuminate\Database\Seeder;

class PrivilegeClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the privilege classes to upsert
        $privilegeClasses = collect(PrivilegeClassFactory::$privilegeClasses)->map(function ($privilegeClass) {
            return [
                'id' => $privilegeClass[0],
                'name' => $privilegeClass[1],
                'created_at' => now(),
            ];
        })->toArray();

        // Perform upsert operation
        PrivilegeClass::upsert(
            $privilegeClasses,
            ['id'],   // Unique key to check on conflict
            ['name']  // Columns to update if there's a conflict
        );
    }
}

