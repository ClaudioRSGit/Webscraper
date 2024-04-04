<?php

namespace App\Jobs;

use App\Models\PriceNotification;
use App\Services\EmailService;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\priceNotifications;

class CheckPriceNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $priceNotifications = PriceNotification::all();
        //.
        foreach ($priceNotifications as $notification) {
            $product = Product::find($notification->product_id);

            if ($product && $product->lowestPrice > $notification->wanted_price) {
                $product->lowestPrice = $notification->wanted_price;
                $product->save();
            }                

            $emailData = [
                'price' => $product->lowestPrice,
            ];

            $email = new priceNotifications($emailData);
            Mail::to('e7803678@gmail.com')->send($email);
        }
    }
}

