<?php

use Illuminate\Database\Seeder;

class ProductListSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_lists')->insert([
            'product_id' => 1,
            'favorite_list_id' => 1
        ]);

        DB::table('product_lists')->insert([
            'product_id' => 2,
            'favorite_list_id' => 1
        ]);

        DB::table('product_lists')->insert([
            'product_id' => 2,
            'favorite_list_id' => 2
        ]);

        DB::table('product_lists')->insert([
            'product_id' => 4,
            'favorite_list_id' => 2
        ]);

        DB::table('product_lists')->insert([
            'product_id' => 1,
            'favorite_list_id' => 3
        ]);

        DB::table('product_lists')->insert([
            'product_id' => 2,
            'favorite_list_id' => 3
        ]);

        DB::table('product_lists')->insert([
            'product_id' => 4,
            'favorite_list_id' => 3
        ]);
    }
}
