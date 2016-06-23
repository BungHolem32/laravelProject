<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['namespace' => 'Site'], function (){

	Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
	Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
	Route::get('about', ['as' => 'about', 'uses' => 'AboutController@index']);
	Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@index']);
	Route::get('contact-us', ['as' => 'contact-us', 'uses' => 'ContactUsController@index']);


	Route::group(['prefix' => 'products'], function (){
		Route::get('/', ['uses' => 'ProductsController@GetProducts']);
		Route::get('{id}', ['uses' => 'ProductsController@GetProduct']);
	});

});


Route::group(['prefix' => 'admin'], function (){

	Route::get('login', ['as' => 'login-page', 'uses' => 'Crm\LoginController@index']);
	Route::post('login', ['as' => 'login-validation', 'uses' => 'Crm\LoginController@login']);
	Route::get('forgot-pass',['as'=>'forgot-password','uses'=>'Crm\ForgotPasswordController@index']);
	Route::post('forgot-pass',['as'=>'send-email-forgot-pass','uses'=>'Crm\ForgotPasswordController@sendPasswordRestNotificationToEmail']);

	Route::group(['middleware' => 'login-check'], function (){
		Route::get('/',    ['as' => 'crm-dashboard', 'uses' => 'Crm\AdminController@dashboard']);
		Route::get('home', ['as' => 'crm-dashboard', 'uses' => 'Crm\AdminController@dashboard']);
		Route::resource('users', 'UsersController');
		Route::resource('pages', 'PagesController');
	});
});


