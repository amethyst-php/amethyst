<?php

namespace Railken\LaraOre\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lara-ore:install {--force}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Installs all lara-ore packages';

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
        $this->call('vendor:publish', ['--provider' => 'Railken\LaraOre\UserServiceProvider', '--force' => $this->option('force')]);
        $this->call('vendor:publish', ['--provider' => 'Railken\LaraOre\ConfigServiceProvider', '--force' => $this->option('force')]);
        $this->call('vendor:publish', ['--provider' => 'Railken\LaraOre\RequestLoggerServiceProvider', '--force' => $this->option('force')]);
        $this->call('vendor:publish', ['--provider' => 'Railken\LaraOre\WorkServiceProvider', '--force' => $this->option('force')]);
        $this->call('vendor:publish', ['--provider' => 'Railken\LaraOre\ListenerServiceProvider', '--force' => $this->option('force')]);
    }
}
