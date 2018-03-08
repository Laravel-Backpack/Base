<?php

namespace Backpack\Base\app\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class AddCustomRouteContent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backpack:base:add-custom-route
                                {code : HTML/PHP code that registers a route. Use either single quotes or double quotes. Never both. }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add HTML/PHP code to the routes/backpack/custom.php file';

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
        $path = 'routes/backpack/custom.php';
        $disk_name = config('backpack.base.root_disk_name');
        $disk = Storage::disk($disk_name);
        $code = $this->argument('code');

        if ($disk->exists($path)) {
            $old_file_content = Storage::disk($disk_name)->get($path);

            // insert the given code before the file's last line
            $file_lines = explode(PHP_EOL, $old_file_content);
            $number_of_lines = count($file_lines);
            $file_lines[$number_of_lines] = $file_lines[$number_of_lines - 1];
            $file_lines[$number_of_lines - 1] = '    '.$code;
            $new_file_content = implode(PHP_EOL, $file_lines);

            if ($disk->put($path, $new_file_content)) {
                $this->info('Successfully added code to '.$path);
            } else {
                $this->error('Could not write to file: '.$path);
            }
        } else {
            $command = 'php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider" --tag=custom_routes';

            $process = new Process($command, null, null, null, 300, null);

            $process->run(function ($type, $buffer) {
                if (Process::ERR === $type) {
                    $this->line($buffer);
                } else {
                    $this->line($buffer);
                }
            });

            // executes after the command finishes
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            $this->handle();
        }
    }
}
