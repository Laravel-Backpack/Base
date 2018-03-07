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
        $placehold = 'https://placehold.it/160x160/00a65a/ffffff/&text='.$user->name[0];

        switch (config('backpack.base.avatar_type')) {
            case 'gravatar':
                if (config('backpack.base.authentication_column')=='email') {
                    return Gravatar::fallback('https://placehold.it/160x160/00a65a/ffffff/&text='.$user->name[0])->get($user->email);
                } else {
                    return $placehold;
                }
                break;

            case 'placehold':
                return $placehold;
                break;

            default:
                return $user->{config('backpack.base.avatar_type')};
                break;
        }
    }
}
