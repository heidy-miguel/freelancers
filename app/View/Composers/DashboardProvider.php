<?php

namespace App\View\Composers;

use App\Http\View\Composers\AppComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Application;
use App\Models\Institution;
use App\Models\User;
use App\Models\Category;

class DashboardProvider extends ServiceProvider 
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

        View::composer('dashboard', function($view){
            $applications = Application::latest('created_at')->orderBy('created_at', 'desc')->take(8)->get();
            $view->with(['applications' => $applications]); 
        });

        View::composer('layouts.headers.cards', function($view){
            $trainers = User::latest('created_at')->where('role', '=', 'trainer')->orderBy('created_at', 'desc')->take(8)->get();
            $institutions = User::latest('created_at')->where('role', '=', 'institution')->orderBy('created_at', 'desc')->take(8)->get();
            $solicitations = Application::latest('created_at')->orderBy('created_at', 'desc')->take(5)->get();
            $total_trainers = User::trainer()->count();
            $total_applications = Application::all()->count();
            $total_institutions = User::institution()->count();
            $total_managers = User::manager()->count();
            $view->with([
                'total_trainers' => $total_trainers,
                'total_applications' => $total_applications,
                'total_institutions' => $total_institutions,
                'total_managers' => $total_managers, 
            ]);
        });
}
        
}