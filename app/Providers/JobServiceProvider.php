<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Faker\JobProvider;
use Faker\{Factory, Generator};

class JobServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
        $this->app->singleton(Generator::class, function(){
            $faker = Factory::create();
            $faker->addProvider(new JobProvider($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
