<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Seeder;
use DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // State::factory()->count(5)->create();
        // DB::table('states')->insert([
            $states = [
            //States bases on zones NC
            ["name" => "FCT", "geopolitical_zone_id" => 1],
            ["name" => "Benue", "geopolitical_zone_id" => 1],
            ["name" => "Kogi", "geopolitical_zone_id" => 1],
            ["name" => "Nasarawa", "geopolitical_zone_id" => 1],
            ["name" => "Niger", "geopolitical_zone_id" => 1],
            ["name" => "Kwara", "geopolitical_zone_id" => 1],
            ["name" => "Pleateau", "geopolitical_zone_id" => 1],
            //States bases on zones NE
            ["name" => "Adamawa", "geopolitical_zone_id" => 2],
            ["name" => "Bauchi", "geopolitical_zone_id" => 2],
            ["name" => "Gombe" , "geopolitical_zone_id" => 2],
            ["name" => "Borno", "geopolitical_zone_id" => 2],
            ["name" => "Taraba", "geopolitical_zone_id" => 2],
            ["name" => "Yobe", "geopolitical_zone_id" => 2],
            //States bases on zones NW
            ["name" => "Jigawa", "geopolitical_zone_id" => 3],
            ["name" => "Kaduna", "geopolitical_zone_id" => 3],
            ["name" => "Kano", "geopolitical_zone_id" => 3],
            ["name" => "Katsina", "geopolitical_zone_id" => 3],
            ["name" => "Kebbi", "geopolitical_zone_id" => 3],
            ["name" => "Sokoto", "geopolitical_zone_id" => 3],
            ["name" => "Zamfara", "geopolitical_zone_id" => 3],
            //States bases on zones SE
            ["name" => "Abia", "geopolitical_zone_id" => 4],
            ["name" => "Anambara", "geopolitical_zone_id" => 4],
            ["name" => "Ebonyi", "geopolitical_zone_id" => 4],
            ["name" => "Enugu", "geopolitical_zone_id" => 4],
            ["name" => "Imo", "geopolitical_zone_id" => 4],
            //States bases on zones SS
            ["name" => "Akwa Ibom", "geopolitical_zone_id" => 5],
            ["name" => "Bayelsa", "geopolitical_zone_id" => 5],
            ["name" => "Cross River", "geopolitical_zone_id" => 5],
            ["name" => "Delta", "geopolitical_zone_id" => 5],
            ["name" => "Edo", "geopolitical_zone_id" => 5],
            ["name" => "Rivers", "geopolitical_zone_id" => 5],
             //States bases on zones SW
            ["name" => "Ekiti", "geopolitical_zone_id" => 6],
            ["name" => "Lagos", "geopolitical_zone_id" => 6],
            ["name" => "Ogun", "geopolitical_zone_id" => 6],
            ["name" => "Ondo", "geopolitical_zone_id" => 6],
            ["name" => "Osun", "geopolitical_zone_id" => 6],
            ["name" => "Oyo", "geopolitical_zone_id" => 6],
        ];

        DB::table('states')->upsert(
            $states,
            ['name'], // Use 'name' as the unique key
            ['geopolitical_zone_id'] // Update these columns if a record with the same name exists
        );
    }
}
