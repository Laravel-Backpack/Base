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
        Route::auth();
        Route::get('logout', 'Auth\LoginController@logout');
    }

    // if not otherwise configured, setup the dashboard routes
    if (config('backpack.base.setup_dashboard_routes')) {
        Route::get('dashboard', 'AdminController@dashboard');
        Route::get('/', 'AdminController@redirect');
    }

    // if not otherwise configured, setup the "my account" routes
    if (config('backpack.base.setup_my_account_routes')) {
        Route::post('edit-account-info', 'Auth\MyAccountController@update');
        Route::get('edit-account-info', 'Auth\MyAccountController@showAccountInfoForm')->name('backpack.account.info');
        Route::get('change-password', 'Auth\MyAccountController@showChangePasswordForm')->name('backpack.account.password');
        Route::post('change-password', 'Auth\MyAccountController@updatePassword')->name('backpack.account.password');
    }
});
