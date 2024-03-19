<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Custom\Jwt;

class Auth extends Controller
{
    public function auth(Request $request){
        //verify if login's form email == user's email
        $user = User::where('email',$request->email)->first();
        if (!$user) {
            return response()->json('Not Authorized',401);
        }
        
        //verify if login's form password == user's password
        if (!password_verify($request->password, $user->password)) {
            return response()->json('Not Authorized',401);
        }

        //JWT -> creates and sends to front end to store on local storage
        $token = Jwt::create($user);
        
        return response()->json([
            'token' => $token,
            'user' => [
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'role_id' => $user->role_id
            ]
        ]);
    }

    public function verify(){
        return Jwt::validate();
    }

    public function register(Request $request) {
        $user = User::where('email',$request->email)->first();
        if ($user) {
            return response()->json(['error' => 'Email already exists'],401);
        } else {
            $newUser = new User();
            $newUser->firstName = $request->firstName;
            $newUser->lastName = $request->lastName;
            $newUser->email = $request->email;
            $newUser->password = bcrypt($request->password);
            $newUser->role_id = 2;
            $newUser->isActive = 1;
            $newUser->save();

            $token = Jwt::create($newUser);

            return response()->json(['success' => 'User registered successfully'], 200);
        }
    }
}
