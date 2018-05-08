<?php

namespace Railken\LaraOre\Permission\Console\Commands;

use Illuminate\Console\Command;

use Railken\LaraOre\Permission\Role;
use Railken\LaraOre\Permission\Permission;

class FlushPermissionsCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'railken:lara-ore:flush-permissions {classes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate all permission';

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

        // Retrieve all managers and create relative permissions

        $managers = explode(",", $this->argument('classes'));


        foreach ($managers as $manager) {
            $manager = new $manager();
            $this->updatePermissions($manager->getAuthorizer()->getPermissions());
            foreach ($manager->getAttributes() as $attribute) {
                $this->updatePermissions($attribute->getPermissions());
            }
        }

        /*$admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();*/
        
    }

    public function updatePermissions($permissions)
    {
        foreach ($permissions as $permission) {
            $permission = Permission::firstOrCreate(['name' => $permission]);
        }
    }
}
