<?php

// Checking if the environment is debug, because we don't want to disable cache in production
$middleware = [];
if (Config::get('app.debug')){
    $middleware['middleware'] = 'clear-cache';
}

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

Route::group($middleware, function (){

    Route::group(['namespace' => 'Site'], function (){

        Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
        Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
        Route::get('about', ['as' => 'about', 'uses' => 'AboutController@index']);
        Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@index']);
        Route::get('contact-us', ['as' => 'contact-us', 'uses' => 'ContactUsController@index']);


        Route::group(['prefix' => 'products'], function (){
            Route::get('/', ['uses' => 'ProductsController@getAllProducts']);
            Route::get('{id}', ['uses' => 'ProductsController@getOneProduct']);
        });

    });

    Route::group(['prefix' => 'cms'], function (){

        Route::get('login', ['as' => 'login-page', 'uses' => 'Crm\LoginController@index']);
        Route::post('login', ['as' => 'login-validation', 'uses' => 'Crm\LoginController@login']);
        Route::get('logout', ['as' => 'logout', 'uses' => 'Crm\LogOutController@index']);

        Route::get('forgot-password', ['as' => 'forgot-password', 'uses' => 'Crm\ForgotPasswordController@index']);
        Route::post('forgot-password', [
            'as' => 'send-email-forgot-pass',
            'uses' => 'Crm\ForgotPasswordController@sendPasswordRestNotificationToEmail'
        ]);

        Route::get('register', ['as' => 'register-page', 'uses' => 'Crm\RegisterController@index']);
        Route::post('register',
            ['as' => 'add-user', 'uses' => 'Crm\RegisterController@addNewUserToDataBaseAndAutoConnectIt']);
//    Route::post('register/step-2',['uses'=>'Crm\RegisterController@addNewUserToDataBaseAndAutoConnectIt']);

        Route::group(['middleware' => 'login-check'], function (){
            Route::get('/', ['as' => 'crm-dashboard', 'uses' => 'Crm\AdminController@dashboard']);
            Route::get('dashboard', ['as' => 'crm-dashboard', 'uses' => 'Crm\AdminController@dashboard']);
            Route::resource('users', 'UsersController');
            Route::resource('pages', 'PagesController');
        });
    });
});

Route::get('/{catchall}', function (){
    return view('errors.503');
});
Route::get('/cms{catchall}', function (){
    return view('errors.503');
});