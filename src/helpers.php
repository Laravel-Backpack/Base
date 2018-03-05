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

if (!function_exists('backpack_guard_name')) {
    /*
     * Returns the name of the guard defined
     * by the application config
     */
    function backpack_guard_name()
    {
        return config('backpack.base.guard', config('auth.defaults.guard'));
    }
}

if (!function_exists('backpack_auth')) {
    /*
     * Returns the user instance if it exists
     * of the currently authenticated admin
     * based off the defined guard.
     */
    function backpack_auth()
    {
        return \Auth::guard(backpack_guard_name());
    }
}

if (!function_exists('backpack_user')) {
    /*
     * Returns back a user instance without
     * the admin guard, however allows you
     * to pass in a custom guard if you like.
     */
    function backpack_user()
    {
        return backpack_auth()->user();
    }
}
