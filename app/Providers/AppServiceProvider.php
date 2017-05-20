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
            //To generate model from db
            $this->app->register('Kurt\Repoist\RepoistServiceProvider');
            //
            $this->app->register('Reliese\Coders\CodersServiceProvider');
        }

        $this->app->bind('App\Repositories\Trip\TripRepository', function($app)
          {
            return new EloquentTripRepository( new Trip );
          });
/*
        $this->app->bind('App\Repositories\Duty\DutyRepository', function($app)
          {
            return new EloquentDutyRepository( new Duty );
          });   
*/
                  $this->app->bind('App\Repositories\Duties\DutiesRepository', function($app)
          {
            return new EloquentDutiesRepository( new Duties );
          });       

        $this->app->bind('App\Repositories\Objects\ObjectsRepository', function($app)
          {
            return new EloquentObjectsRepository( new Objects );
          });  
    }
}
