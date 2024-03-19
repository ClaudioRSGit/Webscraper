<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users,200);
    }

    public function getUserById($id)
    {
        $user = User::find($id);
        return response()->json($user,200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $user = new User();
        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = $request->input('role_id');
        $user->isActive = $request->input('isActive');
        
        $user->save();
        
        return response()->json([
            "message" => "User created successfully!",
            "code" => 201
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        $user = User::find($id);
        if (!$user) {
            return response()->json([
                "message" => "User not found!",
            ], 404);
        }

        $user->firstName = $request->input('firstName');
        $user->lastName = $request->input('lastName');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->role_id = $request->input('role_id');
        $user->isActive = $request->input('isActive');

        $user->save();

        return response()->json([
            "message" => "User updated successfully!",
            "code" => 200
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            
            return response()->json([
                "message" => "User deleted successfully!",
                "code" => 201
            ]);
        }else{
            return response()->json([
                "message" => "Error! User not found!",
            ]);
        }

    }
}
