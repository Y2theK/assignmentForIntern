<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create 5 students and attach with 3 random courses via many to many relationship
        $courses = Course::all();
        \App\Models\Student::factory(5)->create()->each(function ($student) use ($courses) {
            $student->courses()->attach($courses->random(3));
        });
    }
}
