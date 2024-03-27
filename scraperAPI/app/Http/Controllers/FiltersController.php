<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FiltersController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with([
            'image' => function ($query) {
                $query->select('id', 'link', 'product_id');
            }, 
            'productMarketPrices' => function ($query) {
                $query->select('id', 'product_id', 'market_id', 'price', 'link', 'currency', 'tag');
            },'productMarketPrices.market'
        ]);
    
        if ($request->has('category')) {
            $categories = $request->input('category');
            if ($categories !== null) {
                $query->whereHas('category', function ($query) use ($categories) {
                    $query->whereIn('id', $categories);
                });
            }
        }

        if ($request->has('brand')) {
            $brands = $request->input('brand');
            if ($brands !== null) {
                $query->whereIn('brand', $brands);
            }
        }

        if ($request->has('titleFilter')) {
            $titleFilter = $request->input('titleFilter')[0];
            if ($titleFilter !== null) {
                $query->orderBy('title', $titleFilter === 'titleAscending' ? 'asc' : 'desc');
            }
        }

        // if ($request->has('priceFilter')) {
        //     $priceFilter = $request->input('priceFilter')[0];
        //     $direction = $priceFilter === 'priceAscending' ? 'asc' : 'desc';
        //     $query->orderBy('lowestPrice', $direction);
        // }
    
        // if ($request->has('priceFrom')) {
        //     $priceFrom = (float) $request->input('priceFrom')[0];
        //     $query->where('lowestPrice', '>=', $priceFrom);
        // }
        
        // if ($request->has('priceTo')) {
        //     $priceTo = (float) $request->input('priceTo')[0];
        //     $query->where('lowestPrice', '<=', $priceTo);
        // }
        
        if ($request->has('bestRated')) {
            $query->orderBy('avg_rating', 'desc');
        }
    
            
        $products = $query->get();
        
        return response()->json($products, 200);
    }
}