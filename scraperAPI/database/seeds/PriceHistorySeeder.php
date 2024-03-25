<?php

use Illuminate\Database\Seeder;

class PriceHistorySeeder extends Seeder
{
    public function run()
    {        
        $startDate = now()->subMonth();
        $endDate = now();
        
        $productId = 1;
        
        $currentDate = $startDate->copy();
        
        while ($currentDate->lte($endDate)) {
            $avgPrice = rand(90, 120);
            
            DB::table('price_histories')->insert([
                'product_market_price_id' => $productId,
                'avg_price' => $avgPrice,
                'collected_at' => $currentDate->format('Y-m-d H:i:s')
            ]);
            
            $currentDate->addDay();
        }
    }
}
