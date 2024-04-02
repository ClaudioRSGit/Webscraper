<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call([RoleSeeder::class]);
        $this->call([UserSeeder::class]);
        $this->call([CategorySeeder::class]);
        $this->call([ProductSeeder::class]);
        $this->call([MarketSeeder::class]);
        $this->call([ImageSeeder::class]);
        $this->call([ProductMarketPriceSeeder::class]);
        $this->call([PendingProductSeeder::class]);
        $this->call([PriceHistorySeeder::class]);
        // $this->call([FavoriteListSeeder::class]);
        // $this->call([ProductListSeeder::class]);
        $this->call([WishlistsSeeder::class]);
        $this->call([ProductWishlistSeeder::class]);
    }
}
