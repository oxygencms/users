<?php

use Illuminate\Database\Seeder;
use Oxygencms\Users\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create the super user
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret123'),
            'superuser' => 1,
        ])->assignRole('administrator');

        User::create([
            'name' => 'Observer User',
            'email' => 'observer@example.com',
            'password' => bcrypt('secret123'),
        ])->assignRole('observer');
    }
}
