<?php
/**
 * Returns the name of the middleware
 * defined by the application config
 * if a param is passed in, it will chain
 * the backpack middelware to it.
 * e.g guest:backpack.admin
 */
if (!function_exists('backpack_middleware')) {
    function backpack_middleware($chainedWith = null)
    {
        if (config('backpack.base.separate_admin_session')) {
            $middlware = config('backpack.base.admin_guard.name');
        } else {
            $middlware = 'backpack.base.admin';
        }

        if ($chainedWith && config('backpack.base.separate_admin_session')) {
            $middlware = $chainedWith . ':' . $middlware;
        } elseif($chainedWith) {
            $middleware = $chainedWith;
        }

        return $middlware;
    }
}

/**
 * Returns the name of the guard defined
 * by the application config
 */
if (!function_exists('backpack_guard')) {
    function backpack_guard()
    {
        if (config('backpack.base.separate_admin_session')) {
            $guard = config('backpack.base.admin_guard.name');
        } else {
            $guard = null;
        }

        return $guard;
    }
}

/**
 * Returns the user instance if it exists
 * of the currently authenticated admin
 * based off the defined guard.
 */
if (!function_exists('backpack_admin')) {
    function backpack_admin()
    {
        return \Auth::guard(backpack_guard())->user();
    }
}

/*
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
