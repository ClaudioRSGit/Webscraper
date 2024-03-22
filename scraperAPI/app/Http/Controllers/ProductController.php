<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with([
           'image' => function ($query) {
            $query->select('id', 'link', 'product_id');
            }, 
            'productMarketPrices' => function ($query) {
            $query->select('id', 'product_id', 'market_id', 'price', 'link', 'currency', 'tag');
            },'productMarketPrices.market'
        ])->get();

        return response()->json($products, 200);
    }

    public function getProductById($id)
    {
        $product = Product::with([
            'image' => function ($query) {
                $query->select('id', 'link', 'product_id');
            },
            'productMarketPrices' => function ($query) {
                $query->select('id', 'product_id', 'market_id', 'price', 'link', 'currency', 'tag');
            },
            'productMarketPrices.market' // Carrega informações sobre o mercado associado
        ])->find($id);

        return response()->json($product, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'brand' => 'required',
            'avg_rating' => 'required',
            'category_id' => 'required'
        ]);

        $product = new Product();
        $product->title = $request->input('title');
        $product->description = $request->input('productDescription');
        $product->brand = $request->input('brand');
        $product->avg_rating = $request->input('avg_rating');
        $product->category_id = $request->input('category_id');
        
        $product->save();
        
        return response()->json([
            "message" => "product created successfully!",
            "code" => 201
        ]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->title = $request->input('title');
            $product->description = $request->input('description');
            $product->brand = $request->input('brand');
            $product->avg_rating = $request->input('avg_rating');
            $product->category_id = $request->input('category_id');
            
            $product->save();
            
            return response()->json([
                "message" => "Product updated successfully!",
                "code" => 201
            ]);
        }else{
            return response()->json([
                "message" => "Error! Product not found!",
            ]);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            
            return response()->json([
                "message" => "Product deleted successfully!",
                "code" => 201
            ]);
        }else{
            return response()->json([
                "message" => "Error! Product not found!",
            ]);
        }

    }
}
