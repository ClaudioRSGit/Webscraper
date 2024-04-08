<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Image;

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
            'productMarketPrices.market'
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
            'category_id' => 'required',
            'image_link' => 'required'
        ]);

        $product = new Product();
        $product->title = $request->input('title');
        $product->description = $request->input('productDescription');
        $product->brand = $request->input('brand');
        $product->avg_rating = $request->input('avg_rating');
        $product->category_id = $request->input('category_id');
        $product->isActive = $request->input('isActive');
        
        $product->save();

        $image = new Image();
        $image->link = $request->input('image_link');
        $image->product_id = $product->id;
        $image->save();
        
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
            $product->isActive = $request->input('isActive');

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

    public function searchByTitle($query){
        $products = Product::where('title', 'like', '%'.$query.'%')
                            ->with('image')
                            ->get(['id', 'title']);
        
        return response()->json($products, 200);
    }
    
    // public function searchProduct($query){
    //     $products = Product::where('title', 'like', '%'.$query.'%')->get(['id','title']);

    //     return response()->json($products, 200);
    // }
}
