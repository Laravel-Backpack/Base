<?php

namespace Backpack\Base\app\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

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
        $this->info("Backpack\Base installation started. Please wait...");

        $this->executeProcess("composer require backpack/generators --dev");
        $this->executeProcess("composer require laracasts/generators:dev-master --dev");
        $this->executeProcess("php artisan vendor:publish --provider='Backpack\Base\BaseServiceProvider'", "publishing configs, langs, views and AdminLTE files");
        $this->executeProcess("php artisan vendor:publish --provider='Prologue\Alerts\AlertsServiceProvider'", "publishing config for notifications - prologue/alerts");
        $this->executeProcess("php artisan migrate", "generating users table (using Laravel's default migrations)");

        $this->info("Backpack\Base installation finished.");
    }

    public function executeProcess($command, $beforeNotice = false, $afterNotice = false) {
        if ($beforeNotice) {
            $this->info("### ".$beforeNotice);
        } else {
            $this->info("### running: ".$command);
        }


        $process = new Process($command);
        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        echo $process->getOutput();

        if ($afterNotice) {
            $this->info("### ".$afterNotice);
        }
    }
}
