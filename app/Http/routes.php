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


Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('about', ['as' => 'about', 'uses' => 'AboutController@index']);
Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@index']);
Route::get('contact-us', ['as' => 'contact-us', 'uses' => 'ContactUsController@index']);


Route::group(['prefix' => 'products'], function () {
    Route::get('/', ['uses' => 'ProductsController@GetProducts']);
    Route::get('{id}', ['uses' => 'ProductsController@GetProduct']);
});


Route::group(['prefix'=>''],function(){

    Route::get('/',['as'=>'routes-login','uses'=>'AdminController@index' ]);
    Route::post('/',['as'=>'routes-request','uses'=>'AdminController@login']);

});