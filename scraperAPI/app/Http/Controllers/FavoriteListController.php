<?php

namespace App\Http\Controllers;

use App\Models\FavoriteList;
use Illuminate\Http\Request;

class FavoriteListController extends Controller
{
    public function index()
    {
        $favoriteLists = FavoriteList::with('products.product')->get();
        return response()->json($favoriteLists);
    }

    public function store(Request $request)
    {
        $favoriteList = new FavoriteList();
        $favoriteList->name = $request->name;
        $favoriteList->user_id = $request->user_id;
        $favoriteList->save();
        
        return response()->json($favoriteList);
    }
}
