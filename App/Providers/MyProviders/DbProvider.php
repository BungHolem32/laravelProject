<?php


namespace App\Providers\MyProviders;

    use Illuminate\Support\ServiceProvider;

class DbProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('urls',['home','register','about','products','contact-us','other']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('App\\Http\\Models\\Interfaces\\DBInterface',function($app){
            return $app->make('App\\Http\\Models\\Service\\DbService');
        });
    }
}
