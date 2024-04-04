<?php

namespace App\Http\Controllers;

use App\Models\PriceNotification;
use Illuminate\Http\Request;
use App\Models\Product;

class PriceNotificationController extends Controller
{
    public function index()
    {
        $priceNotifications = PriceNotification::all();

        return response()->json($priceNotifications);
    }

    public function store(Request $request)
    {
        $priceNotification = new PriceNotification();
        $priceNotification->user_id = $request->user_id;
        $priceNotification->product_id = $request->product_id;
        $priceNotification->wanted_price = $request->wanted_price;
        $priceNotification->save();

        return response()->json($priceNotification);
    }

    public function show()
    {
        $notifications = [];

        $priceNotifications = PriceNotification::all();
        //.
        foreach ($priceNotifications as $notification) {
            $product = Product::find($notification->product_id);

            if ($product && $product->lowestPrice > $notification->wanted_price) {
                $message = "Wanted price: {$notification->wanted_price}, Lowest price: {$product->lowestPrice}, Product: {$product->title}";
                $notifications[] = $message;

                $product->lowestPrice = $notification->wanted_price;
                $product->save();
            }
        }
        
        return response()->json($notifications);
    }
}
