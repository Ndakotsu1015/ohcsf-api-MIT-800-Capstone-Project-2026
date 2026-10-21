<?php

namespace Database\Factories;

use App\Models\Agency;
use App\Models\Branch;
use App\Models\Cadre;
use App\Models\Department;
use App\Models\Division;
use App\Models\Employee;
use App\Models\GradeLevel;
use App\Models\Ministry;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Deployment;
use App\Models\Designation;
use App\Models\Unit;

class DeploymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Deployment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        // Determine cadre and grade level
        $cadreOptions = [
            'Junior' => ['min_level' => 1, 'max_level' => 6, 'years' => rand(0, 4)],
            'Mid Level Officers' => ['min_level' => 7, 'max_level' => 10, 'years' => rand(2, 4)],
            'Senior' => ['min_level' => 11, 'max_level' => 14, 'years' => rand(1, 4)],
            'Director' => ['min_level' => 15, 'max_level' => 17, 'years' => rand(5, 9)],
        ];

        $cadre = $this->faker->randomElement(array_keys($cadreOptions));
        $gradeLevel = $this->faker->numberBetween(
            $cadreOptions[$cadre]['min_level'],
            $cadreOptions[$cadre]['max_level']
        );

        // Set deployment date based on cadre
        $deploymentDate = Carbon::now()->subYears($cadreOptions[$cadre]['years'])->subMonths(rand(1, 12));

        return [
            'designation_id' => Designation::inRandomOrder()->first()->id ?? Designation::factory(),
            'unit_id' => Unit::inRandomOrder()->first()->id ?? Unit::factory(),
            'division_id' => Division::inRandomOrder()->first()->id ?? Division::factory(),
            'department_id' => Department::inRandomOrder()->first()->id ?? Department::factory(),
            'branch_id' => Branch::inRandomOrder()->first()->id ?? Branch::factory(),
            'agency_id' => Agency::inRandomOrder()->first()->id ?? Agency::factory(),
            'ministry_id' => Ministry::inRandomOrder()->first()->id ?? Ministry::factory(),
            'employee_id' => Employee::inRandomOrder()->first()->id ?? Employee::factory(),
            'expected_assumption_date' => $deploymentDate,
            'assumption_date' => $deploymentDate->copy()->addDays(rand(1, 30)),
            'cadre_id' => Cadre::inRandomOrder()->first()->id ?? Cadre::factory(),
            'grade_level_id' => GradeLevel::inRandomOrder()->first()->id ?? GradeLevel::factory(), // Ensures two-digit format


            // Updated qualification format as per rules
            'qualification' => json_encode([
                [
                    'qualification' => $this->faker->randomElement(['BSc Computer Science', 'MSc Data Science', 'PhD AI']),
                    'institution' => $this->faker->company . ' University',
                    'year' => $this->faker->year,
                ],
                [
                    'qualification' => $this->faker->randomElement(['HND Electrical Engineering', 'BSc Mechanical Engineering']),
                    'institution' => $this->faker->company . ' Institute',
                    'year' => $this->faker->year,
                ],
            ]),

            // Updated certification format as per rules
            'certification' => json_encode([
                [
                    'certification' => $this->faker->randomElement(['AWS Certified Solutions Architect', 'PMP Certification']),
                    'year' => $this->faker->year,
                ],
                [
                    'certification' => $this->faker->randomElement(['Google Cloud Certified', 'Scrum Master']),
                    'year' => $this->faker->year,
                ],
            ]),

            // Redeployment details
            'is_redeployed' => $this->faker->boolean(30),
            'request_type' => $this->faker->randomElement(["General", "Special", "Compassionate"]),
            'reason' => $this->faker->optional()->sentence(),
            'request_letter_file' => $this->faker->optional()->word . '.pdf',
            'status' => $this->faker->randomElement(["Approved", "Pending", "Rejected"]),
            'approved_by' => User::inRandomOrder()->first()->id ?? null,
        ];
    }
}
