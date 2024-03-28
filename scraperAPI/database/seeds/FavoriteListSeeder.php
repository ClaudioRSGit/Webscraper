<?php

use Illuminate\Database\Seeder;

class FavoriteListSeeder extends Seeder
{
    public function run()
    {
        DB::table('favorite_lists')->insert([
            'name' => 'Compras para casa',
            'user_id' => 1
        ]);

        DB::table('favorite_lists')->insert([
            'name' => 'Prenda Aniversário',
            'user_id' => 1
        ]);

        DB::table('favorite_lists')->insert([
            'name' => 'Black Friday',
            'user_id' => 1
        ]);
    }
}
