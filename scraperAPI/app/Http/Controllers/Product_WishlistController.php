<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_WishList;

class Product_WishlistController extends Controller
{
    public function index()
    {
        $productWishlist = Product_Wishlist::all();

        return response()->json($productWishlist);
    }

    public function store(Request $request)
    {
        $request->validate([
            'wishlist_id' => 'required',
            'product_id' => 'required',
        ]);

        $productWishlist = new Product_Wishlist();
        $productWishlist->wishlist_id = $request->input('wishlist_id');
        $productWishlist->product_id = $request->input('product_id');
        $productWishlist->save();

        return response()->json($productWishlist, 200);
    }

    public function removeFromWishlist($wishlistId, $productId)
    {
        $productWishlist = Product_WishList::where('wishlist_id', $wishlistId)
                                            ->where('product_id', $productId)
                                            ->firstOrFail();
        
        $productWishlist->delete();

        return response()->json('success deleting product', 200);
    }

    public function delete(Request $request, $id)
    {
        $productWishlist = Product_Wishlist::findOrFail($id);
        $productWishlist->delete();

        return response()->json(null, 204);
    }
}
