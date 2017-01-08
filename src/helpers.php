<?php

/**
 * Returns the user instance if it exists
 * of the currently authenticated admin
 * based off the defined guard.
 */
if (!function_exists('backpack_admin')) {
    function backpack_admin()
    {
        if (config('backpack.base.separate_admin_session')) {
            $guard = config('backpack.base.admin_guard.name');
        } else {
            $guard = null;
        }

        return \Auth::guard($guard)->user();
    }
}

/**
 * Returns back a user instance without
 * the admin guard, however allows you
 * to pass in a custom guard if you like.
 */
if (!function_exists('backpack_user')) {
    function backpack_user($guard = null)
    {
        return \Auth::guard($guard)->user();
    }
}
