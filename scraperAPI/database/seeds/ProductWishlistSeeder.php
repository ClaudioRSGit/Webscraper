<?php

use Illuminate\Database\Seeder;

class ProductWishlistSeeder extends Seeder
{
    public function run()
    {
        //list 1
        DB::table('product_wishlist')->insert([
            'wishlist_id' => 1,
            'product_id' => 1,
        ]);

        DB::table('product_wishlist')->insert([
            'wishlist_id' => 1,
            'product_id' => 2,
        ]);

        DB::table('product_wishlist')->insert([
            'wishlist_id' => 1,
            'product_id' => 3,
        ]);

        DB::table('product_wishlist')->insert([
            'wishlist_id' => 1,
            'product_id' => 4,
        ]);
        
        //list 2
        DB::table('product_wishlist')->insert([
            'wishlist_id' => 2,
            'product_id' => 6,
        ]);
        
        //list 3
        DB::table('product_wishlist')->insert([
            'wishlist_id' => 3,
            'product_id' => 2,
        ]);

        DB::table('product_wishlist')->insert([
            'wishlist_id' => 3,
            'product_id' => 5,
        ]);
    }
}
