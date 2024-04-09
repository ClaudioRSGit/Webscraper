<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use App\Models\PendingProduct;
use App\Models\Market;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $products = Product::count();
        $pendingProducts = PendingProduct::count();
        $markets = Market::count();

        $categories = Category::withCount('products')->get();
        $categoryWithMostProducts = $categories->sortByDesc('products_count')->first();
        $categoryInfo = $categories->map(function ($category) {
            return "{$category->description} - {$category->products_count} products";
        });
        $categoryInfo[] = "Most products: {$categoryWithMostProducts->description} - {$categoryWithMostProducts->products_count} products";

        return response()->json([
            'users' => $users,
            'products' => $products,
            'pendingProducts' => $pendingProducts,
            'markets' => $markets,
            'categories' => $categoryInfo
        ]);
    }
}
