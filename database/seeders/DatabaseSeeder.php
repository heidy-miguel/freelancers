<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CourseCategorySeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(InstructorSeeder::class);
        $this->call(TraineeSeeder::class);
        \App\Models\Trainee::factory(84)->create();
        \App\Models\Instructor::factory(23)->create()->each(function($instructor){
            $courseId = rand(1, 24);
            $instructor->courses()->attach($courseId);            
        });
        \App\Models\Training::factory(100)->create();
    }
}
