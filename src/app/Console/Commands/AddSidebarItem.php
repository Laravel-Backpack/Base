<?php

namespace Backpack\Base\app\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class AddSidebarItem extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backpack:base:add-sidebar-item
                                {code : HTML/PHP code that shows the sidebar item. Use either single quotes or double quotes. Never both. }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add an item to the Backpack sidebar';

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
     *
     * @return mixed
     */
    public function handle()
    {
        $path = 'resources/views/vendor/backpack/base/inc/sidebar_content.blade.php';
        $disk = Storage::disk('root');
        $code = $this->argument('code');

        if ($disk->exists($path)) {
            $contents = Storage::disk('root')->get($path);

            if ($disk->put($path, $contents.PHP_EOL.$code)) {
                $this->info("Successfully added sidebar item.");
            } else {
                $this->error("Could not write to sidebar_content file.");
            }
        } else {
            $this->error("The file sidebar_content.blade.php does not exist. Make sure Backpack\Base is properly installed.");
        }
    }
}
