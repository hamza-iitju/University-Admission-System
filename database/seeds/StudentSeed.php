<?php

use Illuminate\Database\Seeder;
use App\Course;

class StudentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        for($i = 0; $i < 60; $i++) {
            App\Student::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'contact' => $faker->numberBetween($min = 10000000000, $max = 90000000000),
                'ssc_gpa' => $faker->numberBetween($min = 3.00, $max = 5.00),
                'hsc_diploma_gpa' => $faker->numberBetween($min = 3.00, $max = 5.00),
                'address' => $faker->address,
                'image' => '1513238022-Logomakr_3zaNpj.png',
            ]);
        }
        for($i = 0; $i < 60; $i++) {
            DB::table('course_student')->insert([
                'course_id' => rand(1,8),
                'student_id' => $faker->unique()->numberBetween(1, 60)
            ]);
        }
    }
}