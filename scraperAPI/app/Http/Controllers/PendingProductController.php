<?php

namespace App\Http\Controllers;

use App\Models\PendingProduct;
use Illuminate\Http\Request;

class PendingProductController extends Controller
{
    public function index()
    {
        $pendingProducts = PendingProduct::all();
        return response()->json($pendingProducts);
    }

    public function store(Request $request)
    {
        $pendingProduct = new PendingProduct();
        $pendingProduct->title = $request->title;
        $pendingProduct->description = $request->description;
        $pendingProduct->brand = $request->brand;
        $pendingProduct->link = $request->link;
        $pendingProduct->save();

        return response()->json('Pending Product Created Successfully!');
    }

    public function destroy($id){
        $pendingProduct = PendingProduct::find($id);
        $pendingProduct->delete();

        return response()->json('Pending Product Deleted');
    }
}
