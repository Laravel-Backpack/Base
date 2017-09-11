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

    // if not otherwise configured, setup the edit profile routes
    if (config('backpack.base.setup_profile_routes')) {
        Route::post('edit-profile', 'Auth\EditAdminProfileController@update');
        Route::get('edit-profile', 'Auth\EditAdminProfileController@showEditForm')
        ->name('backpack.profile.edit');
        Route::post('edit-profile/password', 'Auth\EditAdminProfileController@updatePassword')
        ->name('backpack.profile.password');
    }
});
