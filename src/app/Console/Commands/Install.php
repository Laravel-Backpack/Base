<?php

namespace Backpack\Base\app\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backpack:base:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Require dev packages and publish files for Backpack\Base to work';

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
        $this->info("### Backpack\Base installation started. Please wait...");

        $this->executeProcess('composer require backpack/generators --dev');
        $this->executeProcess('composer require laracasts/generators:dev-master --dev');
        $this->executeProcess('php artisan vendor:publish --provider="Backpack\Base\BaseServiceProvider"', 'publishing configs, langs, views and AdminLTE files');
        $this->executeProcess('php artisan vendor:publish --provider="Prologue\Alerts\AlertsServiceProvider"', 'publishing config for notifications - prologue/alerts');
        $this->executeProcess('php artisan migrate', "generating users table (using Laravel's default migrations)");

        $this->info("### Backpack\Base installation finished.");
    }

    /**
     * Run a SSH command.
     *
     * @param string $command      The SSH command that needs to be run
     * @param bool   $beforeNotice Information for the user before the command is run
     * @param bool   $afterNotice  Information for the user after the command is run
     *
     * @return mixed Command-line output
     */
    public function executeProcess($command, $beforeNotice = false, $afterNotice = false)
    {
        if ($beforeNotice) {
            $this->info('### '.$beforeNotice);
        } else {
            $this->info('### Running: '.$command);
        }

        $process = new Process($command);
        $process->run(function ($type, $buffer) {
            if (Process::ERR === $type) {
                echo '... > '.$buffer;
            } else {
                echo 'OUT > '.$buffer;
            }
        });

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        if ($afterNotice) {
            $this->info('### '.$afterNotice);
        }
    }
}
