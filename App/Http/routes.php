<?php

// Checking if the environment is debug, because we don't want to disable cache in production
$middleware = [];
if (Config::get('app.debug')) {
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

Route::group($middleware, function () {

    Route::group(['namespace' => 'Site'], function () {

        Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
        Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
        Route::get('about', ['as' => 'about', 'uses' => 'AboutController@index']);
        Route::get('products', ['as' => 'products', 'uses' => 'ProductsController@index']);
        Route::get('contact-us', ['as' => 'contact-us', 'uses' => 'ContactUsController@index']);


        Route::group(['prefix' => 'products'], function () {
            Route::get('/', ['uses' => 'ProductsController@getAllProducts']);
            Route::get('{id}', ['uses' => 'ProductsController@getOneProduct']);
        });

    });


    /*CMS ROUTES */
    Route::group(['prefix' => 'cms'], function () {

        /*INSIDE CONTROLLER/Cms NAMESPACE*/
        Route::group(['namespace' => 'Cms'], function () {

            /*login & logout*/
            Route::get('login', ['as' => 'cms-login', 'uses' => 'LoginController@index']);
            Route::post('login', ['as' => 'login-validation', 'uses' => 'LoginController@login']);
            Route::get('logout', ['as' => 'logout', 'uses' => 'LogOutController@index']);

            /*forgot password*/
            Route::get('forgot-password', ['as' => 'forgot-password', 'uses' => 'ForgotPasswordController@index']);
            Route::post('forgot-password', [
                'as' => 'send-email-forgot-pass',
                'uses' => 'ForgotPasswordController@sendPasswordRestNotificationToEmail'
            ]);

            /*reset password*/
            Route::get('resetPassword', ['as' => 'reset-pass-page', 'uses' => 'ResetPasswordController@index']);
            Route::get('resetPassword/{what}', ['as' => 'change-pass', 'uses' => 'ResetPasswordController@reset']);

            /*register*/
            Route::get('register', ['as' => 'register-page', 'uses' => 'RegisterController@index']);
            Route::post('register',
                ['as' => 'add-user', 'uses' => 'RegisterController@addNewUserToDataBaseAndAutoConnectIt']);


//    Route::post('register/step-2',['uses'=>'RegisterController@addNewUserToDataBaseAndAutoConnectIt']);

            /**/
            Route::group(['middleware' => 'login-check'], function () {
                Route::get('/', ['as' => 'cms-dashboard', 'uses' => 'AdminController@dashboard']);
                Route::get('dashboard', ['as' => 'cms-dashboard', 'uses' => 'AdminController@dashboard']);

                Route::resource('user-management', 'UsersController');
                Route::resource('page-management', 'PagesController');

            });


        });


    });
});

Route::get('/{catchall}', function () {
    return view('errors.503');
});
Route::get('/cms/{catchall}', function () {
    return view('errors.503');
});