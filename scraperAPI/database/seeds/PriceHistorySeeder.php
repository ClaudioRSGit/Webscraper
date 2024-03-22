<?php

use Illuminate\Database\Seeder;

class PriceHistorySeeder extends Seeder
{
    public function run()
    {        
        DB::table('price_histories')->insert([
            'product_market_price_id' => 1,
            'avg_price' => 100.00,
            'collected_at' => now()->format('Y-m-d H:i:s')
        ]);

        DB::table('price_histories')->insert([
            'product_market_price_id' => 1,
            'avg_price' => 105.00,
            'collected_at' => now()->subDay()->format('Y-m-d H:i:s')
        ]);

        DB::table('price_histories')->insert([
            'product_market_price_id' => 1,
            'avg_price' => 110.00,
            'collected_at' => now()->subDays(2)->format('Y-m-d H:i:s')
        ]);
    }
}
