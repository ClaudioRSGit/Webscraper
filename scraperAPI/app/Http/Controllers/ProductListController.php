<?php

namespace App\Http\Controllers;

use App\Models\ProductList;
use Illuminate\Http\Request;

class ProductListController extends Controller
{
    public function index()
    {
        $productLists = ProductList::with('product')->get();
        return response()->json($productLists);
    }

    public function store(Request $request)
    {
        $productList = new ProductList();
        $productList->name = $request->name;
        $productList->user_id = $request->user_id;
        $productList->save();
        
        return response()->json($productList);
    }
}
