<?php

use Illuminate\Database\Seeder;

class WishlistsSeeder extends Seeder
{
    public function run()
    {
        DB::table('wishlists')->insert([
            'user_id' => 1,
            'name' => 'Compras para a casa',
        ]);
        DB::table('wishlists')->insert([
            'user_id' => 1,
            'name' => 'Black Friday',
        ]);
        DB::table('wishlists')->insert([
            'user_id' => 1,
            'name' => 'Férias de Verão',
        ]);
        DB::table('wishlists')->insert([
            'user_id' => 2,
            'name' => 'Prendas para o natal',
        ]);
    }
}
