<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instructor;
use App\Models\Course;
use App\Models\Skill;
use App\Models\Education;
use App\Models\Job;
use App\Models\Trainee;
use App\Models\Employment;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(SkillSeeder::class);
        //$this->call(CourseCategorySeeder::class);
        //$this->call(CourseSeeder::class);
        $this->call(InstructorSeeder::class);
        //$this->call(TraineeSeeder::class);

        $skills = Skill::all();
        $instructor = Instructor::all();
        
        Trainee::factory(44)->create();
        Instructor::factory(23)->create();
        Job::factory(85)->create();
        Education::factory(50)->create();
        Employment::factory(50)->create();
        
        $educations = Education::all();
        $employments = Employment::all();

        \App\Models\Job::all()->each(function($job) use($instructor){
            $job->applicants()->attach(
                Arr::random(Instructor::all()->pluck('id')->toArray(), rand(1, 23))
            );
        });
        \App\Models\Job::factory(55)->create();

        \App\Models\Job::all()->each(function($job) use($skills){
            $job->skills()->attach($skills->random(rand(2, 6))->pluck('id')->toArray());
        });
        \App\Models\Instructor::all()->each(function($instructor) use($skills){
            $instructor->skills()->attach($skills->random(rand(2, 6))->pluck('id')->toArray());
        });

        \App\Models\Education::all()->each(function($educations) use($instructor){
            $educations->instructor()->associate($instructor->toArray(), rand(1, 50));
        });
        \App\Models\Employment::all()->each(function($employments) use($instructor){
            $employments->instructor()->associate($instructor->toArray(), rand(1, 50));
        });
        // \App\Models\Instructor::factory(23)->create()->each(function($instructor){
        //     $courseId = rand(1, 24);
        //     $instructor->courses()->attach($courseId);            
        // });
        // \App\Models\Training::factory(35)->create();
    }
}
