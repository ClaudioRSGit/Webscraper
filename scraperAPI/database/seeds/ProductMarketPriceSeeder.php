<?php

use Illuminate\Database\Seeder;

class ProductMarketPriceSeeder extends Seeder
{
    public function run()
    {
        DB::table('product_market_prices')->insert([
            'market_id' => 1,
            'product_id' => 1,
            'price' => 999,
            'link' => 'https://www.worten.pt/produtos/maquina-de-lavar-e-secar-roupa-bosch-wng25400es-6-10-kg-1400-rpm-branco-7376418',
            'currency' => 'EUR',
            'tag' => '.value'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 2,
            'product_id' => 2,
            'price' => 370,
            'link' => 'https://mediamarkt.pt/products/smart-tv-lg-43ur73006la-led-43-ultra-hd-4k',
            'currency' => 'EUR',
            'tag' => '.bigprices'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 4,
            'product_id' => 3,
            'price' => 720,
            'link' => 'https://mediamarkt.pt/products/smart-tv-lg-43ur73006la-led-43-ultra-hd-4k',
            'currency' => 'EUR',
            'tag' => '.bigprices'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 1,
            'product_id' => 4,
            'price' => 220,
            'link' => 'https://mediamarkt.pt/products/smart-tv-lg-43ur73006la-led-43-ultra-hd-4k',
            'currency' => 'EUR',
            'tag' => '.bigprices'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 1,
            'product_id' => 5,
            'price' => 220,
            'link' => 'https://mediamarkt.pt/products/smart-tv-lg-43ur73006la-led-43-ultra-hd-4k',
            'currency' => 'EUR',
            'tag' => '.bigprices'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 1,
            'product_id' => 6,
            'price' => 220,
            'link' => 'https://mediamarkt.pt/products/smart-tv-lg-43ur73006la-led-43-ultra-hd-4k',
            'currency' => 'EUR',
            'tag' => '.bigprices'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 1,
            'product_id' => 7,
            'price' => 220,
            'link' => 'https://mediamarkt.pt/products/smart-tv-lg-43ur73006la-led-43-ultra-hd-4k',
            'currency' => 'EUR',
            'tag' => '.bigprices'
        ]);
        DB::table('product_market_prices')->insert([
            'market_id' => 1,
            'product_id' => 8,
            'price' => 220,
            'link' => 'https://mediamarkt.pt/products/smart-tv-lg-43ur73006la-led-43-ultra-hd-4k',
            'currency' => 'EUR',
            'tag' => '.bigprices'
        ]);
    }
}
