<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Custom\Jwt;
use Illuminate\Support\Facades\Cookie;
use App\Traits\RegisterCode;

class Auth extends Controller
{
    use RegisterCode;

    public function auth(Request $request){
        //verify if login's form email == user's email
        $user = User::where('email',$request->email)->first();
        if (!$user) {
            return response()->json('Not Authorized',401);
        }

        //verify if login's form password == user's password
        if (!password_verify($request->password, $user->password) || ($user->isActive == 0 && $user->firstLogin == 0)) {
            return response()->json('Not Authorized',401);
        }

        //JWT -> creates and sends to front end to store on local storage
        $token = Jwt::create($user);

        $cookie = cookie('Bearer', $token, 60 * 24);//1 day

        return response()->json([
            'user' => [
                'firstName' => $user->firstName,
                'lastName' => $user->lastName,
                'role_id' => $user->role_id
            ]
        ])->cookie($cookie);
    }

    public function verify(Request $request){

        try {
            $requestValidated = Jwt::validate($request);
            $user = $requestValidated->data;

            return response()->json([
                'user' => [
                    'id' => $user->id,
                    'firstName' => $user->firstName,
                    'lastName' => $user->lastName,
                    'role_id' => $user->role_id
                ]
            ]);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage(),401);
        }
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
            $newUser->isActive = 0;
            $newUser->firstLogin = 1;
            $newUser->registerCode = mt_rand(100000, 999999);
            $newUser->save();

            $this->sendCodeEmail($newUser);

            $token = Jwt::create($newUser);

            return response()->json(['success' => 'User registered successfully'], 200);
        }
    }

    public function logout(Request $request) {
        $cookie = Cookie::forget('Bearer');

        return response()->json(['success' => 'User logged out successfully'], 200)->cookie($cookie);
    }

    public function verification($code) {

        $user = User::where('registerCode', $code)->first();
        
        if ($user && $user->registerCode == $code) {
            $user->isActive = 1;
            $user->firstLogin = 0;
            $user->save();
            return response()->json(['success' => 'User verified successfully'], 200);
        }
        
        return response()->json(['message' => 'Invalid code'], 401);
    }
}
