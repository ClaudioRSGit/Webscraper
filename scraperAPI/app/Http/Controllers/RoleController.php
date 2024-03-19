<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        
        return response()->json($roles,200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $role = new Role();
        $role->description = $request->input('description');
        
        $role->save();
        
        return response()->json([
            "message" => "Role created successfully!",
            "code" => 201
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'description' => 'required|string|max:255',
        ]);
    
        $role = Role::findOrFail($id);
    
        $role->update($validatedData);
    
        return response()->json($role);
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if ($role) {
            $role->delete();
            
            return response()->json([
                "message" => "Role deleted successfully!",
                "code" => 201
            ]);
        }else{
            return response()->json([
                "message" => "Error! Role not found!",
            ]);
        }

    }
}
