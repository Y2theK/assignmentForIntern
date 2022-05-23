<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\CourseTableSeeder;
use Database\Seeders\StudentTableSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //call seeder for courses
        $this->call([
            CourseTableSeeder::class,
            StudentTableSeeder::class
        ]);
    }
}
