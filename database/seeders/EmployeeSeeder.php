<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Lga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) { // Generate 50 employees
            Employee::create([
                'passport_file' => $faker->optional()->imageUrl(100, 100, 'people'),
                'title' => $faker->randomElement(["Mr", "Mrs", "Miss"]),
                'first_name' => $faker->firstName,
                'middle_name' => $faker->optional()->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->date('Y-m-d', '2000-01-01'), // Ensure reasonable age
                'gender' => $faker->randomElement(["Male", "Female"]),
                'marital_status' => $faker->randomElement(["Single", "Married", "Divorced", "Widowed"]),
                'residential_address' => $faker->address,
                'permanent_address' => $faker->address,
                'phone_number' => $faker->unique()->numerify('080########'),
                'nationality' => 'Nigerian',
                'nin' => $faker->unique()->numerify('##############'), // 14-digit NIN
                'lga_id' => Lga::inRandomOrder()->first()->id ?? 1, // Ensure LGA exists
                'email_address' => $faker->unique()->safeEmail,
                'ippis_no' => $faker->unique()->numerify('IPPIS########'),
                'employee_no' => $faker->unique()->numerify('EMP-####'), // Generate random unique employee number
            ]);
        }
    }
}
