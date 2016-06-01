<?php

// All BackPack routes are placed under the 'admin' prefix, to minimize possible conflicts with your application. This means your login/logout/register urls are also under the 'admin' prefix, so you can have separate logins for users and admins.
Route::group(['middleware' => 'web', 'prefix' => 'admin'], function () {
    // Admin authentication routes
    Route::auth();

    // Other Backpack\Base routes
    Route::get('/', 'AdminController@redirectToDashboard');
    Route::get('dashboard', 'AdminController@dashboard');
});

// REDIRECT "login" URL TO "admin/login"
//
// The login url is hardcoded in Laravel in a few places, most importantly in the auth middleware. If your application has a different login for users (non-admins), you should consider overwriting this.
Route::get('login', 'Controller@redirectToLogin');
