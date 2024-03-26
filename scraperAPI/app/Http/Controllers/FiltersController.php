<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FiltersController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::with([
           'image' => function ($query) {
            $query->select('id', 'link', 'product_id');
            }, 
            'productMarketPrices' => function ($query) {
            $query->select('id', 'product_id', 'market_id', 'price', 'link', 'currency', 'tag');
            },'productMarketPrices.market'
        ])->get();

        $categories = Category::all();

        return response()->json([
            'products' => $products,
            'categories' => $categories
        ]);
        
    }
}
