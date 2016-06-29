<?php


namespace App\Providers\MyProviders;

use Illuminate\Support\ServiceProvider;

class DbORMProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\\Http\\Models\\Interfaces\\DBORMInterface',function($app){
            return $app->make('App\\Http\\Models\\Service\\DBORMService');
        });
    }
}
