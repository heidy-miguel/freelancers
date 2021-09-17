<?php

namespace App\View\Composers;

use App\Http\View\Composers\AppComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Promotion;
use App\Models\Instructor;
use App\Models\Job;
use App\Models\Skill;
use App\Models\Trainee;

class AdminProvider extends ServiceProvider 
{
       /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('dashboard.admin.trainee.index', function($view){
            $trainees = Trainee::where('id', '>=', 1)->orderBy('created_at', 'desc')->paginate(15);
            $view->with(['trainees' => $trainees]);
        });

        View::composer('dashboard.admin.job.index', function($view){
            $jobs = Job::where('id', '>=', 1)->orderBy('created_at', 'desc')->paginate(15);
            $skills = Skill::all();
            $view->with([
                'jobs' => $jobs,
                'skills' => $skills,
            ]);
        });

        View::composer('dashboard.admin.home', function ($view) {
            $total_instructors = Instructor::all()->count();
            $lastest_instructors = Instructor::latest('created_at')->orderBy('created_at', 'desc')->take(8)->get();
            $lastest_jobs = Job::latest('created_at')->orderBy('created_at', 'desc')->take(7)->get();
            
            $view->with([
                'total_instructors' => $total_instructors, 
                'lastest_instructors' => $lastest_instructors,
                'lastest_jobs' => $lastest_jobs,
            ]);
        });

        View::composer('dashboard.admin.instructor.index', function($view){
            $instructors = Instructor::where('id', '>=', 1)->orderBy('created_at', 'desc')->paginate(15);
            $view->with('instructors', $instructors);
        });

        // View::composer('welcome', function ($view) {
        //     $promotions = Promotion::latest('created_at')->where('active', 1)->orderBy('created_at', 'desc')->paginate(4);
        //     $view->with(['promotions' => $promotions]);
        // });
    } 
}