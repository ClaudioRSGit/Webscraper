<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;

class WishListsController extends Controller
{
    public function index()
    {
        $wishlists = WishList::all();

        return response()->json($wishlists);
    }

    public function destroy($id)
    {
        $wishlist = WishList::findOrFail($id);
        $wishlist->delete();

        return response()->json(null, 204);
    }

    public function userWishList($userId)
    {
        $wishlists = WishList::with('products.image')->where('user_id', $userId)->get();

        return response()->json($wishlists);
    }
}
