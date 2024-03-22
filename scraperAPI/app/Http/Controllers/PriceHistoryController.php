<?php

namespace App\Http\Controllers;

use App\Models\PriceHistory;
use Illuminate\Http\Request;

class PriceHistoryController extends Controller
{
    public function priceHistoryById($id){
        $priceHistory = PriceHistory::where('product_market_price_id', $id)->get();
        return response()->json($priceHistory);
    }
}
