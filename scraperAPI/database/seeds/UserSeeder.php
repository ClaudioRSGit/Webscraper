<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'firstName' => 'administrator',
            'lastName' => 'administrator',
            'email' => 'administrator@admin.com',
            'password' => Hash::make('Claranet123!'),
            'isActive' => true,
            'role_id' => 1
        ]);
        DB::table('users')->insert([
            'firstName' => 'admin',
            'lastName' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('Claranet123!'),
            'isActive' => false,
            'role_id' => 1
        ]);
    }
}
