<?php

namespace App\View\Composers;

use App\Http\View\Composers\AppComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Solicitation;
use App\Models\Trainer;
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

        View::composer('user.dashboard', function($view){
            $trainers = Trainer::latest('created_at')->orderBy('created_at', 'desc')->take(8)->get();
            $institutions = Institution::latest('created_at')->orderBy('created_at', 'desc')->take(8)->get();
            $solicitations = Solicitation::latest('created_at')->orderBy('created_at', 'desc')->take(8)->get();
            $total_trainers = Trainer::all()->count();
            $total_solicitations = Solicitation::all()->count();
            $total_institutions = Institution::all()->count();
            $view->with([
                'trainers' => $trainers,
                'institutions' => $institutions,
                'solicitations' => $solicitations,
                'total_solicitations' => $total_solicitations,
                'total_trainers' => $total_trainers,
                'total_institutions' => $total_institutions,
            ]);
        });

        View::composer(['solicitation.show', 'solicitation.edit', 'solicitation.create'], function($view){
            $users = User::all();
            $categories = Category::all();
            $view->with([
                'users' => $users,
                'categories' => $categories, 
            ]);
        });
    } 
}