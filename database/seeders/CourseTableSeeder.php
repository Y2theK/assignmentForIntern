<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = ['Myanmar','English','Math','Physics','Chemistry','Bio','Eco'];
        foreach ($courses as $course) {
            Course::create([
            'name' => $course,
            
        ]);
        }
    }
}
