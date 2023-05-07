<?php

namespace App\Providers;

use Faker\Factory;
use Faker\Generator;
use App\Providers\Custome;
use Illuminate\Support\ServiceProvider; 

class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->app->singleton(Generator::class, function () {
        $faker = Factory::create(config('app.faker_locale'));
        $faker->addProvider(new Custome($faker));
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
