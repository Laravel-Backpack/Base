<?php

namespace Backpack\Base\app\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class AddSidebarContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backpack:base:add-sidebar-content
                                {code : HTML/PHP code that shows the sidebar item. Use either single quotes or double quotes. Never both. }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add HTML/PHP code to the Backpack sidebar_content file';

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
        $disk_name = config('backpack.base.root_disk_name');
        $disk = Storage::disk($disk_name);
        $code = $this->argument('code');

        if ($disk->exists($path)) {
            $contents = Storage::disk($disk_name)->get($path);

            if ($disk->put($path, $contents.PHP_EOL.$code)) {
                $this->info('Successfully added code to sidebar_content file.');
            } else {
                $this->error('Could not write to sidebar_content file.');
            }
        } else {
            $this->error("The sidebar_content file does not exist. Make sure Backpack\Base is properly installed.");
        }
    }
}
