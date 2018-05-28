<?php

namespace Railken\LaraOre\Console\Commands;

use Illuminate\Console\Command;

class SeedCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lara-ore:seed';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed all lara-ore packages';

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
        $this->call('lara-ore:permission:flush');
        $this->call('db:seed', ['--class' => 'Railken\LaraOre\User\Database\Seeds\UserSeeder']);
        $this->call('passport:install');
    }
}
