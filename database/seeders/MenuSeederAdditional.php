<?php

namespace Database\Seeders;

use App\Models\Menu;
use Database\Factories\MenuFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeederAdditional extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //// Fetch the menus from the factory
        $menus = MenuFactory::$menusAdditional;

        // Prepare the data for upsert
        $menuData = array_map(function ($menu) {
            return [
                'id' => $menu[0],
                'title' => $menu[1],
                'link' => $menu[2],
                'order' => $menu[3],
                'is_active' => $menu[4],
                'icon' => $menu[5],
                'parent_id' => $menu[6],
                'module_id' => $menu[7],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }, $menus);

        // Use upsert to insert or update the data
        Menu::upsert($menuData, ['id'], ['title', 'link', 'order', 'is_active', 'icon', 'parent_id', 'module_id', 'updated_at']);
    }
}
