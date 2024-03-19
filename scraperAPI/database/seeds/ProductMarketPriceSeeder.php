<?php

use Illuminate\Database\Seeder;

class ProductMarketPriceSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_market_prices')->insert([
            'market_id' => 1,
            'product_id' => 1,
            'price' => 650,
            'link' => 'www.worten.pt',
            'currency' => 'EUR',
            'tag' => '<u>'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 2,
            'product_id' => 2,
            'price' => 370,
            'link' => 'www.fnac.pt',
            'currency' => 'EUR',
            'tag' => '<u>'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 3,
            'product_id' => 3,
            'price' => 720,
            'link' => 'www.pcdiga.pt',
            'currency' => 'EUR',
            'tag' => '<u>'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 1,
            'product_id' => 4,
            'price' => 220,
            'link' => 'www.radiopopular.pt',
            'currency' => 'EUR',
            'tag' => '<u>'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 1,
            'product_id' => 5,
            'price' => 220,
            'link' => 'www.walmart.pt',
            'currency' => 'USD',
            'tag' => '<u>'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 1,
            'product_id' => 6,
            'price' => 220,
            'link' => 'www.walmart.pt',
            'currency' => 'USD',
            'tag' => '<u>'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 1,
            'product_id' => 7,
            'price' => 220,
            'link' => 'www.walmart.pt',
            'currency' => 'EUR',
            'tag' => '<u>'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 1,
            'product_id' => 8,
            'price' => 220,
            'link' => 'www.walmart.pt',
            'currency' => 'USD',
            'tag' => '<u>'
        ]);
    }
}
