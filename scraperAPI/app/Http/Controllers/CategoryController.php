<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories,200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'link' => 'required'
        ]);

        $category = new Category();
        $category->description = $request->input('description');
        $category->link = $request->link;
        
        $category->save();
        
        return response()->json([
            "message" => "Category created successfully!",
            "code" => 201
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'link' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return response()->json([
            'message' => 'Category updated successfully!',
            'code' => 200,
            'category' => $category
        ]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category) {
            $category->delete();
            
            return response()->json([
                "message" => "Category deleted successfully!",
                "code" => 201
            ]);
        }else{
            return response()->json([
                "message" => "Error! Category not found!",
            ]);
        }

    }
}
