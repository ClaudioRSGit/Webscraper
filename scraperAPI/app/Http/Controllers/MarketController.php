<?php

namespace App\Http\Controllers;

use App\Models\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    public function index()
    {
        $markets = Market::all();
        return response()->json($markets,200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required'
        ]);

        $market = new Market();
        $market->name = $request->input('name');
        $market->logo = $request->input('logo');
        
        $market->save();
        
        return response()->json([
            "message" => "Market created successfully!",
            "code" => 201
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
            'logo' => 'required|string|max:255',
        ]);
    
        $market = Role::findOrFail($id);
    
        $market->update($validatedData);
    
        return response()->json($market);
    }


    public function destroy($id)
    {
        $market = Market::find($id);
        if ($market) {
            $market->delete();
            
            return response()->json([
                "message" => "Market deleted successfully!",
                "code" => 201
            ]);
        }else{
            return response()->json([
                "message" => "Error! Market not found!",
            ]);
        }

    }
}
