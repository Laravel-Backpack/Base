<?php

/*
|--------------------------------------------------------------------------
| Backpack\Base Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are
| handled by the Backpack\Base package.
|
*/

Route::group(
[
    'namespace'  => 'Backpack\Base\app\Http\Controllers',
    'middleware' => 'web',
    'prefix'     => config('backpack.base.route_prefix'),
],
function () {
    // if not otherwise configured, setup the auth routes
    if (config('backpack.base.setup_auth_routes')) {
        
        //same routes as when calling Route::auth() but without route names
        //why? 
        //If you want front-end users, you can use Auth::routes(); without conflict in route names 
        //check: vendor/laravel/framework/src/Illuminate/Routing/Router.php
        //
        // Authentication Routes...
        Route::get('login', 'Auth\LoginController@showLoginForm');
        Route::post('login', 'Auth\LoginController@login');
        Route::post('logout', 'Auth\LoginController@logout');

        // Registration Routes...
        Route::get('register', 'Auth\RegisterController@showRegistrationForm');
        Route::post('register', 'Auth\RegisterController@register');

        // Password Reset Routes...
        Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
        Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        Route::post('password/reset', 'Auth\ResetPasswordController@reset');
        //end Route::auth();
        
        Route::get('logout', 'Auth\LoginController@logout');
    }

    // if not otherwise configured, setup the dashboard routes
    if (config('backpack.base.setup_dashboard_routes')) {
        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('/', 'AdminController@redirect');
    }
});
