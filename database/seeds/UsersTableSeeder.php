<?php

use Illuminate\Database\Seeder;
use Laraspace\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'email' => 'moderator@gmail.com',
            'name' => 'Moderator',
            'role' => 'moderator',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'email' => 'admin@gmail.com',
            'name' => 'Admin',
            'role' => 'admin',
            'password' => bcrypt('123456')
        ]);

        User::create([
            'email' => 'user@gmail.com',
            'name' => 'User',
            'role' => 'user',
            'password' => bcrypt('123456')
        ]);
    }
}
