<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Look & feel customizations
    |--------------------------------------------------------------------------
    |
    | Make it yours.
    |
    */

    // Date & Datetime Format Syntax: https://carbon.nesbot.com/docs/#api-localization
    'default_date_format'     => 'D MMM YYYY',
    'default_datetime_format' => 'D MMM YYYY, HH:mm',

    // ----
    // HEAD
    // ----

    // Project name. Shown in the window title.
    'project_name' => 'Backpack Admin Panel',

    // Content of the HTML meta robots tag to prevent indexing and link following
    'meta_robots_content' => 'noindex, nofollow',

    // Overlays - CSS files that change the look and feel of the admin panel
    'overlays' => [
        'packages/digitallyhappy/backstrap/css/backstrap.css',
    ],

    // ------
    // HEADER
    // ------

    // Menu logo. You can replace this with an <img> tag if you have a logo.
    'project_logo'   => '<b>Back</b>pack',

    // Horizontal navbar classes. Helps make the admin panel look similar to your project's design.
    'header_class' => 'app-header bg-transparent border-0 navbar position-relative',
        // Try adding bg-dark, bg-primary, bg-secondary, bg-danger, bg-warning, bg-success, bg-info, bg-blue, bg-light-blue, bg-indigo, bg-purple, bg-pink, bg-red, bg-orange, bg-yellow, bg-green, bg-teal, bg-cyan
        // You might need to add "navbar-dark" too if the background color is a dark one.

    // ----
    // BODY
    // ----

    // Body element classes.
    'body_class' => 'app aside-menu-fixed sidebar-lg-show',
        // Try sidebar-hidden, sidebar-fixed, sidebar-compact, sidebar-lg-show

    // Sidebar element classes.
    'sidebar_class' => 'sidebar sidebar-pills sidebar-bg-transparent',
        // Try removing our sidebar-pills class and adding a background class like bg-dark, bg-primary, bg-secondary, bg-danger, bg-warning, bg-success, bg-info, bg-blue, bg-light-blue, bg-indigo, bg-purple, bg-pink, bg-red, bg-orange, bg-yellow, bg-green, bg-teal, bg-cyan

    // ------
    // FOOTER
    // ------

    // Developer or company name. Shown in footer.
    'developer_name' => 'Cristian Tabacitu',

    // Developer website. Link in footer. Type false if you want to hide it.
    'developer_link' => 'http://tabacitu.ro',

    // Show powered by Laravel Backpack in the footer? true/false
    'show_powered_by' => true,

    /*
    |--------------------------------------------------------------------------
    | Registration Open
    |--------------------------------------------------------------------------
    |
    | Choose whether new users/admins are allowed to register.
    | This will show the Register button on the login page and allow access to the
    | Register functions in AuthController.
    |
    | By default the registration is open only on localhost.
    */

    'registration_open' => env('BACKPACK_REGISTRATION_OPEN', env('APP_ENV') === 'local'),

    /*
    |--------------------------------------------------------------------------
    | Routing
    |--------------------------------------------------------------------------
    */

    // The prefix used in all base routes (the 'admin' in admin/dashboard)
    // You can make sure all your URLs use this prefix by using the backpack_url() helper instead of url()
    'route_prefix' => 'admin',

    // Set this to false if you would like to use your own AuthController and PasswordController
    // (you then need to setup your auth routes manually in your routes.php file)
    'setup_auth_routes' => true,

    // Set this to false if you would like to skip adding the dashboard routes
    // (you then need to overwrite the login route on your AuthController)
    'setup_dashboard_routes' => true,

    // Set this to false if you would like to skip adding "my account" routes
    // (you then need to manually define the routes in your web.php)
    'setup_my_account_routes' => true,

    /*
    |--------------------------------------------------------------------------
    | Authentication
    |--------------------------------------------------------------------------
    */

    // Fully qualified namespace of the User model
    'user_model_fqn' => App\Models\BackpackUser::class,

    // The classes for the middleware to check if the visitor is an admin
    // Can be a single class or an array of clases
    'middleware_class' => [
        App\Http\Middleware\CheckIfAdmin::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        // \Backpack\Base\app\Http\Middleware\UseBackpackAuthGuardInsteadOfDefaultAuthGuard::class,
    ],

    // Alias for that middleware
    'middleware_key' => 'admin',
    // Note: It's recommended to use the backpack_middleware() helper everywhere, which pulls this key for you.

    // Username column for authentication
    // The Backpack default is the same as the Laravel default (email)
    // If you need to switch to username, you also need to create that column in your db
    'authentication_column'      => 'email',
    'authentication_column_name' => 'Email',

    // The guard that protects the Backpack admin panel.
    // If null, the config.auth.defaults.guard value will be used.
    'guard' => 'backpack',

    // The password reset configuration for Backpack.
    // If null, the config.auth.defaults.passwords value will be used.
    'passwords' => 'backpack',

    // What kind of avatar will you like to show to the user?
    // Default: gravatar (automatically use the gravatar for his email)
    // Other options:
    // - placehold (generic image with his first letter)
    // - example_method_name (specify the method on the User model that returns the URL)
    'avatar_type' => 'gravatar',

    /*
    |--------------------------------------------------------------------------
    | File System
    |--------------------------------------------------------------------------
    */

    // Backpack\Base sets up its own filesystem disk, just like you would by
    // adding an entry to your config/filesystems.php. It points to the root
    // of your project and it's used throughout all Backpack packages.
    //
    // You can rename this disk here. Default: root
    'root_disk_name' => 'root',

    /*
    |--------------------------------------------------------------------------
    | License Code
    |--------------------------------------------------------------------------
    |
    | If you, your employer or your client make money by using Backpack, you need
    | to purchase a license. A license code will be provided after purchase,
    | which you can put here or in your ENV file in staging & production.
    |
    | More info and payment form on:
    | https://www.backpackforlaravel.com
    |
    */

    'license_code' => env('BACKPACK_LICENSE', false),
];
