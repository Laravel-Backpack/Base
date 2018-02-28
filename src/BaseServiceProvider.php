<?php

namespace Backpack\Base;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Route;

class BaseServiceProvider extends ServiceProvider
{
    protected $commands = [
        \Backpack\Base\app\Console\Commands\Install::class,
        \Backpack\Base\app\Console\Commands\AddSidebarContent::class,
    ];

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Where the route file lives, both inside the package and in the app (if overwritten).
     *
     * @var string
     */
    public $routeFilePath = '/routes/backpack/base.php';

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(\Illuminate\Routing\Router $router)
    {
        // LOAD THE VIEWS
        // - first the published views (in case they have any changes)
        $this->loadViewsFrom(resource_path('views/vendor/backpack/base'), 'backpack');
        // - then the stock views that come with the package, in case a published view might be missing
        $this->loadViewsFrom(realpath(__DIR__.'/resources/views'), 'backpack');

        $this->loadTranslationsFrom(realpath(__DIR__.'/resources/lang'), 'backpack');

        // use the vendor configuration file as fallback
        $this->mergeConfigFrom(
            __DIR__.'/config/backpack/base.php', 'backpack.base'
        );

        // add the root disk to filesystem configuration
        app()->config['filesystems.disks.root'] = [
            'driver' => 'local',
            'root'   => base_path(),
        ];

        $this->registerAdminMiddleware($this->app->router);
        $this->setupRoutes($this->app->router);
        $this->publishFiles();
        $this->loadHelpers();
    }

    /**
     * Load the Backpack helper methods, for convenience.
     */
    public function loadHelpers()
    {
        require_once __DIR__.'/helpers.php';
    }

    /**
     * Define the routes for the application.
     *
     * @param \Illuminate\Routing\Router $router
     *
     * @return void
     */
    public function setupRoutes(Router $router)
    {
        // by default, use the routes file provided in vendor
        $routeFilePathInUse = __DIR__.$this->routeFilePath;

        // but if there's a file with the same name in routes/backpack, use that one
        if (file_exists(base_path().$this->routeFilePath)) {
            $routeFilePathInUse = base_path().$this->routeFilePath;
        }

        $this->loadRoutesFrom($routeFilePathInUse);
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // register the current package
        $this->app->bind('base', function ($app) {
            return new Base($app);
        });

        // register its dependencies
        $this->app->register(\Jenssegers\Date\DateServiceProvider::class);
        $this->app->register(\Prologue\Alerts\AlertsServiceProvider::class);
        $this->app->register(\Creativeorange\Gravatar\GravatarServiceProvider::class);

        // register their aliases
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Alert', \Prologue\Alerts\Facades\Alert::class);
        $loader->alias('Date', \Jenssegers\Date\Date::class);
        $loader->alias('Gravatar', \Creativeorange\Gravatar\Facades\Gravatar::class);

        // register the services that are only used for development
        if ($this->app->environment() == 'local') {
            if (class_exists('Laracasts\Generators\GeneratorsServiceProvider')) {
                $this->app->register('Laracasts\Generators\GeneratorsServiceProvider');
            }
            if (class_exists('Backpack\Generators\GeneratorsServiceProvider')) {
                $this->app->register('Backpack\Generators\GeneratorsServiceProvider');
            }
        }

        // register the artisan commands
        $this->commands($this->commands);
    }

    public function registerAdminMiddleware(Router $router)
    {
        Route::aliasMiddleware('admin', \Backpack\Base\app\Http\Middleware\Admin::class);
    }

    public function publishFiles()
    {
        $error_views = [__DIR__.'/resources/error_views' => resource_path('views/errors')];
        $backpack_base_views = [__DIR__.'/resources/views' => resource_path('views/vendor/backpack/base')];
        $backpack_public_assets = [__DIR__.'/public' => public_path('vendor/backpack')];
        $backpack_lang_files = [__DIR__.'/resources/lang' => resource_path('lang/vendor/backpack')];
        $backpack_config_files = [__DIR__.'/config' => config_path()];

        // sidebar_content view, which is the only view most people need to overwrite
        $backpack_sidebar_contents_view = [__DIR__.'/resources/views/inc/sidebar_content.blade.php' => resource_path('views/vendor/backpack/base/inc/sidebar_content.blade.php')];

        // calculate the path from current directory to get the vendor path
        $vendorPath = dirname(__DIR__, 3);
        $adminlte_assets = [$vendorPath.'/almasaeed2010/adminlte' => public_path('vendor/adminlte')];
        $gravatar_assets = [$vendorPath.'/creativeorange/gravatar/config' => config_path()];

        // establish the minimum amount of files that need to be published, for Backpack to work; there are the files that will be published by the install command
        $minimum = array_merge(
            $error_views,
            // $backpack_base_views,
            $backpack_public_assets,
            // $backpack_lang_files,
            $backpack_config_files,
            $backpack_sidebar_contents_view,
            $adminlte_assets,
            $gravatar_assets
        );

        // register all possible publish commands and assign tags to each
        $this->publishes($backpack_config_files, 'config');
        $this->publishes($backpack_lang_files, 'lang');
        $this->publishes($backpack_base_views, 'views');
        $this->publishes($backpack_sidebar_contents_view, 'sidebar_content');
        $this->publishes($error_views, 'errors');
        $this->publishes($backpack_public_assets, 'public');
        $this->publishes($adminlte_assets, 'adminlte');
        $this->publishes($gravatar_assets, 'gravatar');
        $this->publishes($minimum, 'minimum');
    }
}
