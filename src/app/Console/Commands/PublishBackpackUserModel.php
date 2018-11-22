<?php

namespace Backpack\Base\app\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class PublishBackpackUserModel extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'backpack:base:publish-user-model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the BackpackUser model to App\Models\BackpackUser';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return __DIR__.'/../../Models/BackpackUser.php';
    }

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        $destination_path = $this->laravel['path'].'/Models/BackpackUser.php';

        if ($this->files->exists($destination_path)) {
            $this->error('BackpackUser model already exists!');

            return false;
        }

        $this->makeDirectory($destination_path);

        $this->files->put($destination_path, $this->buildClass());

        $this->info($this->laravel->getNamespace().'Models\BackpackUser.php created successfully.');
    }

    /**
     * Build the class. Replace Backpack namespace with App one.
     *
     * @param string $name
     *
     * @return string
     */
    protected function buildClass($name = false)
    {
        $stub = $this->files->get($this->getStub());

        return $this->makeReplacements($stub);
    }

    /**
     * Replace the namespace for the given stub.
     * Replace the User model, if it was moved to App\Models\User.
     *
     * @param string $stub
     * @param string $name
     *
     * @return $this
     */
    protected function makeReplacements(&$stub)
    {
        $stub = str_replace('Backpack\Base\app\Models', $this->laravel->getNamespace().'Models', $stub);

        if (!$this->files->exists($this->laravel['path'].'/User.php') && $this->files->exists($this->laravel['path'].'/Models/User.php')) {
            $stub = str_replace($this->laravel->getNamespace().'User', $this->laravel->getNamespace().'Models\User', $stub);
        }

        return $stub;
    }
}
