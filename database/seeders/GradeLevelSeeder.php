<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GradeLevel;
use App\Models\Cadre;

class GradeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch cadre IDs dynamically based on names
        $cadreMapping = [
            'Junior' => Cadre::where('name', 'Junior')->value('id'),
            'Mid Level Officers' => Cadre::where('name', 'Mid Level Officers')->value('id'),
            'Senior' => Cadre::where('name', 'Senior')->value('id'),
            'Director' => Cadre::where('name', 'Director')->value('id'),
        ];

        // Define grade levels and map them to cadre_id
        $gradeLevels = [
            ['name' => '01', 'description' => 'Entry-level position', 'cadre_id' => $cadreMapping['Junior']],
            ['name' => '02', 'description' => 'Basic junior officer role', 'cadre_id' => $cadreMapping['Junior']],
            ['name' => '03', 'description' => 'Junior officer with minor responsibilities', 'cadre_id' => $cadreMapping['Junior']],
            ['name' => '04', 'description' => 'Intermediate junior officer', 'cadre_id' => $cadreMapping['Junior']],
            ['name' => '05', 'description' => 'Mid-junior officer with supervision duties', 'cadre_id' => $cadreMapping['Junior']],
            ['name' => '06', 'description' => 'Higher junior officer role', 'cadre_id' => $cadreMapping['Junior']],

            ['name' => '07', 'description' => 'Entry mid-level officer', 'cadre_id' => $cadreMapping['Mid Level Officers']],
            ['name' => '08', 'description' => 'Experienced mid-level position', 'cadre_id' => $cadreMapping['Mid Level Officers']],
            ['name' => '09', 'description' => 'Senior mid-level officer', 'cadre_id' => $cadreMapping['Mid Level Officers']],
            ['name' => '10', 'description' => 'Lower senior-level officer', 'cadre_id' => $cadreMapping['Mid Level Officers']],

            ['name' => '11', 'description' => 'Senior officer handling complex tasks', 'cadre_id' => $cadreMapping['Senior']],
            ['name' => '12', 'description' => 'High-ranking senior officer', 'cadre_id' => $cadreMapping['Senior']],
            ['name' => '13', 'description' => 'Directorate-level entry position', 'cadre_id' => $cadreMapping['Senior']],

            ['name' => '14', 'description' => 'Mid directorate level', 'cadre_id' => $cadreMapping['Director']],
            ['name' => '15', 'description' => 'Senior directorate officer', 'cadre_id' => $cadreMapping['Director']],
            ['name' => '16', 'description' => 'Top-level executive officer', 'cadre_id' => $cadreMapping['Director']],
            ['name' => '17', 'description' => 'Highest service level (Permanent Secretary)', 'cadre_id' => $cadreMapping['Director']],
        ];

        foreach ($gradeLevels as $level) {
            GradeLevel::updateOrCreate(
                ['name' => $level['name']],
                [
                    'description' => $level['description'],
                    'cadre_id' => $level['cadre_id'],
                ]
            );
        }
    }
}
