<?php

if (!function_exists('backpack_url')) {
    /**
     * Appends the configured backpack prefix and returns
     * the URL using the standard Laravel helpers.
     *
     * @param $path
     *
     * @return string
     */
    function backpack_url($path = null)
    {
        $path = !$path || (substr($path, 1, 1) == '/') ? $path : '/'.$path;

        return url(config('backpack.base.route_prefix', 'admin').$path);
    }
}

if (!function_exists('backpack_avatar')) {
    /**
     * Returns the avatar URL of a user.
     *
     * @param $user
     *
     * @return string
     */
    function backpack_avatar_url($user)
    {
        switch (config('backpack.base.avatar_type')) {
            case 'gravatar':
                return Gravatar::fallback('https://placehold.it/160x160/00a65a/ffffff/&text='.$user->name[0])->get($user->email);
                break;

            case 'placehold':
                return 'https://placehold.it/160x160/00a65a/ffffff/&text='.$user->name[0];
                break;

            default:
                return $user->{config('backpack.base.avatar_type')};
                break;
        }
    }
}

/*
 * Returns the name of the middleware
 * defined by the application config
 * if a param is passed in, it will chain
 * the backpack middelware to it.
 * e.g guest:backpack.admin.
 */
if (!function_exists('backpack_middleware')) {
    function backpack_middleware($chainedWith = null)
    {
        if (config('backpack.base.separate_admin_session')) {
            $middleware = config('backpack.base.admin_guard.name');
        } else {
            $middleware = 'backpack.auth';
        }

        if ($chainedWith && config('backpack.base.separate_admin_session')) {
            $middleware = $chainedWith.':'.$middleware;
        } elseif ($chainedWith) {
            $middleware = $chainedWith;
        }

        return $middleware;
    }
}

/*
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

/*
 * Returns the user instance if it exists
 * of the currently authenticated admin
 * based off the defined guard.
 */
if (!function_exists('backpack_auth')) {
    function backpack_auth()
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
