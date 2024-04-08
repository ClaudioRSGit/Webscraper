<?php

namespace App\Http\Controllers;

use App\Models\ProductMarketPrice;
use Illuminate\Http\Request;

class ProductMarketPriceController extends Controller
{
    public function index()
    {
        $productMarketPrices = ProductMarketPrice::with('market', 'product')->get();
        return response()->json($productMarketPrices);
    }

    public function store(Request $request)
    {
        $request->validate([
            'market_id' => 'required',
            'product_id' => 'required',
            'price' => 'required',
            'link' => 'required',
            'tag' => 'required',
            'currency' => 'required'
        ]);

        $productMarketPrice = new ProductMarketPrice();
        $productMarketPrice->market_id = $request->input('market_id');
        $productMarketPrice->product_id = $request->input('product_id');
        $productMarketPrice->price = $request->input('price');
        $productMarketPrice->link = $request->input('link');
        $productMarketPrice->tag = $request->input('tag');
        $productMarketPrice->currency = $request->input('currency');
        $productMarketPrice->created_at = now();
        $productMarketPrice->updated_at = now();

        $productMarketPrice->save();

        return response()->json($productMarketPrice, 200);
    }

    public function deleteAllProductMarketPrices($id)
    {
        $productMarketPrices = ProductMarketPrice::where('product_id', $id)->get();
        foreach ($productMarketPrices as $productMarketPrice) {
            $productMarketPrice->delete();
        }
        return response()->json(['message' => 'Product Market Prices deleted successfully'], 200);
    }
}
