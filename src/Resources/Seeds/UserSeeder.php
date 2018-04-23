<?php

namespace Railken\LaraOre\Resources\Seeds;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => 'vercingetorige',
                'role' => 'admin',
                'enabled' => 1
            ],
        ];

        $um = new \Railken\LaraOre\Core\User\UserManager();

        foreach ($users as $user) {
            $result = $um->create($user);
        }
    }
}
