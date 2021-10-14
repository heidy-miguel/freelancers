<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Mail;
use App\Models\Application;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
//use App\Mail\NewApplication;
use App\Notifications\NewApplication;

class AppServiceProvider extends ServiceProvider
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
        //
        Application::created(function($application){
            try{

                $admin_emails = User::admin();
                //Mail::to($admin_emails)->send(new NewApplication($application));
                Notification::send($admin_emails, new NewApplication($application));
            } catch(Exception $e){

            }
        });

    }
}
