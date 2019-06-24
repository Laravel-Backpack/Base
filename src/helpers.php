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
    function backpack_url($path = null, $parameters = [], $secure = null)
    {
        $path = !$path || (substr($path, 0, 1) == '/') ? $path : '/'.$path;

        return url(config('backpack.base.route_prefix', 'admin').$path, $parameters = [], $secure = null);
    }
}

if (!function_exists('backpack_authentication_column')) {
    /**
     * Return the username column name.
     * The Laravel default (and Backpack default) is 'email'.
     *
     * @return string
     */
    function backpack_authentication_column()
    {
        return config('backpack.base.authentication_column', 'email');
    }
}

if (!function_exists('backpack_users_have_email')) {
    /**
     * Check if the email column is present on the user table.
     *
     * @return string
     */
    function backpack_users_have_email()
    {
        $user_model_fqn = config('backpack.base.user_model_fqn');
        $user = new $user_model_fqn();

        return \Schema::hasColumn($user->getTable(), 'email');
    }
}

if (!function_exists('backpack_avatar_url')) {
    /**
     * Returns the avatar URL of a user.
     *
     * @param $user
     *
     * @return string
     */
    function backpack_avatar_url($user)
    {
        $firstLetter = property_exists($user, 'name') ? $user->name[0] : 'A';
        $placeholder = 'https://placehold.it/160x160/00a65a/ffffff/&text='.$firstLetter;

        switch (config('backpack.base.avatar_type')) {
            case 'gravatar':
                if (backpack_users_have_email()) {
                    return Gravatar::fallback('https://placehold.it/160x160/00a65a/ffffff/&text='.$firstLetter)->get($user->email);
                } else {
                    return $placeholder;
                }
                break;

            case 'placehold':
                return $placeholder;
                break;

            default:
                return method_exists($user, config('backpack.base.avatar_type')) ? $user->{config('backpack.base.avatar_type')}() : $user->{config('backpack.base.avatar_type')};
                break;
        }
    }
}

if (!function_exists('backpack_middleware')) {
    /**
     * Return the key of the middleware used across Backpack.
     * That middleware checks if the visitor is an admin.
     *
     * @param $path
     *
     * @return string
     */
    function backpack_middleware()
    {
        return config('backpack.base.middleware_key', 'admin');
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

if (!function_exists('mb_ucfirst')) {
    /**
     * Capitalize the first letter of a string,
     * even if that string is multi-byte (non-latin alphabet).
     *
     * @param string   $string   String to have its first letter capitalized.
     * @param encoding $encoding Character encoding
     *
     * @return string String with first letter capitalized.
     */
    function mb_ucfirst($string, $encoding = false)
    {
        $encoding = $encoding ? $encoding : mb_internal_encoding();

        $strlen = mb_strlen($string, $encoding);
        $firstChar = mb_substr($string, 0, 1, $encoding);
        $then = mb_substr($string, 1, $strlen - 1, $encoding);

        return mb_strtoupper($firstChar, $encoding).$then;
    }
}
