<?php

namespace App\Console\Commands;

use Artisan;
use Illuminate\Console\Command;

class MakeCrud extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a new backpack crud';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $argument  = str_singular($this->argument('name'));
        $plural    = title_case(str_plural($argument));
        $snakeName = snake_case($argument);
        $camelName = camel_case($argument);

        $routeArgument   = sprintf("CRUD::resource('%s', '%sCrudController');", $snakeName, $camelName);
        $sidebarArgument = sprintf(
            "<li><a href='{{ backpack_url('%s') }}'><i class='fa fa-question-circle'></i> <span>%s</span></a></li>",
            $argument,
            $plural
        );

        Artisan::call('backpack:crud', ['name' => $snakeName]);
        Artisan::call('backpack:base:add-custom-route', ['code' => $routeArgument]);
        Artisan::call('backpack:base:add-sidebar-content', ['code' => $sidebarArgument]);
    }
}
