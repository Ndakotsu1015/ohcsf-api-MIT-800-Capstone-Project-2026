<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Check if modules already exist
        if (Module::count() > 0) {
            return;
        }

        // Prepare module data for upsert
        $modules = collect(\Database\Factories\ModuleFactory::$modules)->map(function($module) {
            return [
                'id' => $module[0],
                'name' => $module[1],
                'order_by' => $module[2],
                'active_id' => $module[3],
                'is_client_active' => $module[4],
                'url' => $module[5],
                'client_url' => $module[6],
                'icon' => $module[7],
                'summary' => $module[8],
                'client_summary' => $module[9],
                'client_icon' => $module[10],
                'created_by' => \App\Models\User::inRandomOrder()->first()->id, // Assuming a random user creates these
                'bg_class' => 'bg-' . strtolower($module[1]), // Random bg class logic
                // 'privilege_set' => json_encode(value: $module, flags: JSON_PRETTY_PRINT)
            ];
        })->toArray();

        // Upsert data into the modules table
        Module::upsert(
            $modules, // Data array
            ['id'],   // Conflict on the 'id' column
            ['name', 'order_by', 'active_id', 'is_client_active', 'url', 'client_url', 'icon', 'summary', 'client_summary', 'client_icon', 'bg_class'] // Fields to update
        );
    }
}
