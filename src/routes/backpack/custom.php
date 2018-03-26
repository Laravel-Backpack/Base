<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    // Make sure to also add your middleware here, by default it should be 'web'
    // if you have only one session.If you have different sessions for users and admins
    // you should use your own sessions middleware here. Example:
    // 'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'middleware' => [config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
}); // this should be the absolute last line of this file
