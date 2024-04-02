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
