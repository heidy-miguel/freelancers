<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;
use App\Models\Course;
use App\Models\Skill;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguageSeeder::class);
        $this->call(SkillSeeder::class);
        $this->call(CourseCategorySeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(InstructorSeeder::class);
        $this->call(TraineeSeeder::class);

        $skills = Skill::all();
        
        \App\Models\Trainee::factory(84)->create();
        \App\Models\Instructor::factory(123)->create();
        \App\Models\Instructor::all()->each(function($instructor) use($skills){
            $instructor->skills()->attach($skills->random(rand(2, 6))->pluck('id')->toArray());
        });
        // \App\Models\Instructor::factory(23)->create()->each(function($instructor){
        //     $courseId = rand(1, 24);
        //     $instructor->courses()->attach($courseId);            
        // });
        // \App\Models\Training::factory(35)->create();
    }
}
