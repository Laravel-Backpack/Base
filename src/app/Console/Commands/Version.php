<?php

namespace Backpack\Base\app\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Version extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backpack:base:version';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Show the version of PHP and Backpack packages.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment('### PHP VERSION:');
        $this->runConsoleCommand('php -v');

        $this->comment('### BACKPACK PACKAGES VERSION:');
        $this->runConsoleCommand('composer show | grep "backpack\|laravel/framework"');

        $this->comment('### MYSQL VERSION:');
        $this->runConsoleCommand('mysql --version');
    }

    /**
     * Run a shell command in a separate process.
     *
     * @param string $command Text to be executed.
     *
     * @return void
     */
    private function runConsoleCommand($command)
    {
        $process = new Process($command, null, null, null, 60, null);
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
    }
}
