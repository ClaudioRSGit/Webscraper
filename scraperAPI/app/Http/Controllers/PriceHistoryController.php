<?php

namespace App\Http\Controllers;

use App\Models\PriceHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PriceHistoryController extends Controller
{
    public function index(){
        $priceHistory = PriceHistory::all();
        return response()->json($priceHistory);
    }
    public function priceHistoryById($id){
        $priceHistory = PriceHistory::where('product_market_price_id', $id)->get();

        return response()->json($priceHistory);
    }
}
