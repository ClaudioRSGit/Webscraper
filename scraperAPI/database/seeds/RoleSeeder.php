<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->insert([
            'description' => 'Administrador',
        ]);
        DB::table('roles')->insert([
            'description' => 'User',
        ]);
    }
}
