<?php

namespace App\Jobs;

use App\Models\ProductMarketPrice;
use App\Models\PriceHistory;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Traits\ScrapingTrait;
use App\Mail\priceNotification;
use Illuminate\Support\Facades\Mail;

class UpdatePriceHistory implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, ScrapingTrait;

    public function handle()
    {
        $productMarketPrices = ProductMarketPrice::all();
        //.
        foreach ($productMarketPrices as $productMarketPrice) {
            $currentPrice = $this->scrapePrice($this->createClient(), $productMarketPrice->link, $productMarketPrice->tag);

            $priceHistory = new PriceHistory();
            $priceHistory->product_market_price_id = $productMarketPrice->id;
            $priceHistory->avg_price = $currentPrice;
            $priceHistory->collected_at = now();
            $priceHistory->save();
        }

    }

    // private function scrapCurrentPrice($link)
    // {
    //     $response = Http::get($link);
    //     $currentPrice = $response->json('price');
        
    //     return $currentPrice;
    // }
}