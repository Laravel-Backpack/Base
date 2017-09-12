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
        Route::get('dashboard', 'AdminController@dashboard')->name('backpack.dashboard');
        Route::get('/', 'AdminController@redirect')->name('backpack');
    }

    // if not otherwise configured, setup the "my account" routes
    if (config('backpack.base.setup_my_account_routes')) {
        Route::get('edit-account-info', 'Auth\MyAccountController@getAccountInfoForm')->name('backpack.account.info');
        Route::post('edit-account-info', 'Auth\MyAccountController@postAccountInfoForm');
        Route::get('change-password', 'Auth\MyAccountController@getChangePasswordForm')->name('backpack.account.password');
        Route::post('change-password', 'Auth\MyAccountController@postChangePasswordForm');
    }
});
