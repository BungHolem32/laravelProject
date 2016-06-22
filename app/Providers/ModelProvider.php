<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ModelProvider extends ServiceProvider
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
//		$this->app->bind('App\\Http\\Models\\Interfaces\\ModelInterface', 'App\\Http\\Models\\AdminModel');
	}
}
