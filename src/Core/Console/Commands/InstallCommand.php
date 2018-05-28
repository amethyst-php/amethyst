<?php

namespace Railken\LaraOre\Core\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'railken:lara-ore:install';

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
        $this->call('vendor:publish', ['--provider' => 'Railken\LaraOre\Config\ConfigServiceProvider']);
        $this->call('passport:install');
        $this->call('db:seed', ['--class' => 'Railken\LaraOre\Resources\Seeds\UserSeeder']);
    }
}
