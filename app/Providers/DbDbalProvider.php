<?php
/**
 * Created by PhpStorm.
 * User: ilanv
 * Date: 22/06/2016
 * Time: 12:04
 */

namespace App\Providers;

use App\Http\Services\DBLA;
use Illuminate\Support\ServiceProvider;

class DbDbalProvider extends ServiceProvider
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

//        $conn = DriverManager::getConnection($connectionParams, $config);
//        $sql = "SELECT now();";
//        $stmt = $conn->query($sql); // Simple, but has several drawbacks
//        $stmt->execute();
//        $get = $stmt->fetchAll();

        $this->app->singleton('App\Http\Services\DBLA', function ($app){
            return $app->make('App\Http\Services\DBLA');
        });
    }
}
