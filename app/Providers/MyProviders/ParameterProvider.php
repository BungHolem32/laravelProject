<?php
/**
 * Created by PhpStorm.
 * User: ilan
 * Date: 25/06/16
 * Time: 16:13
 */

namespace App\Providers\MyProviders;

use Illuminate\Support\ServiceProvider;


class ParameterProvider extends ServiceProvider
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
        $this->app->bind('App\\Http\\Models\\Interfaces\\ParameterInterface', function ($app) {
            return $app->make('App\\Http\\Models\\Service\\ParameterService');
        });
    }
}