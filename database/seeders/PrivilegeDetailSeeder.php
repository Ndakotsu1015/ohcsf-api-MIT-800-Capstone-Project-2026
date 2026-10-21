<?php

namespace Database\Seeders;

use App\Models\PrivilegeDetail;
use Database\Factories\PrivilegeDetailFactory;
use Illuminate\Database\Seeder;

class PrivilegeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $privilegeDetails = [];

        // Fetch data from the factory
        foreach (PrivilegeDetailFactory::$privilegeDetails as $privilegeDetail) {
            $privilegeDetails[] = [
                'id' => $privilegeDetail[0],
                'privilege_class_id' => $privilegeDetail[1],
                'user_id' => $privilegeDetail[2],
                'privilege_id' => $privilegeDetail[3],

            ];
        }

        // Use upsert to insert or update privilege details
        PrivilegeDetail::upsert(
            $privilegeDetails,
            ['id'], // Detect conflicts based on these columns
            [ 'privilege_class_id', 'user_id','privilege_id',]           // Update privilege_id and timestamps on conflict
        );
    }
}
