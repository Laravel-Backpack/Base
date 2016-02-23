<?php

Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/admin', 'AdminController@dashboard');
});