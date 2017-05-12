<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() == 'local') {
            $this->app->register('Kurt\Repoist\RepoistServiceProvider');
        }

        $this->app->bind('App\Repositories\Trip\TripRepository', function($app)
          {
            return new EloquentTripRepository( new Trip );
          });
    }
}
