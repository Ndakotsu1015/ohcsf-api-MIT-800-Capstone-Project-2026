<?php

namespace Database\Seeders;

use App\Models\Submodule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Prepare the data to be upserted
        $data = [
            [
                "id"=> 1,
                'submodule' => 'Human Resource',
                'module_id' => 3,
                'isActive' => 1,
            ],
            // [
            //     'id'=> 2,
            //     'submodule' => 'Revenue',
            //     'module_id' => 2,
            //     'isActive' => 1,
            // ],
            // [
            //     'id'=> 3,
            //     'submodule' => 'Human Resource',
            //     'module_id' => 3,
            //     'isActive' => 1,
            // ],
        ];

        // Use upsert to insert or update submodules
        Submodule::upsert(
            $data,
            ['id'],  // Unique columns to check for conflicts
            [  'submodule', 'module_id', 'isActive',]   // Columns to update on conflict
        );
    }
}
