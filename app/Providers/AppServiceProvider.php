<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //Make sure that the diectory for compiled views is available
        if(! is_dir(config('view.compiled'))){
            mkdir(config('view.compiled'), 0755, true);
        }
    }
}
