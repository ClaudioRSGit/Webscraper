<?php

namespace App\Custom;

use App\Models\User;
use Firebase\JWT\JWT as JWTFirebase;
use Firebase\JWT\JWK;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class Jwt{
    public static function validate(Request $request){
        $authorization = $request->cookie('Bearer');
        // $authorization = $_SERVER['HTTP_AUTHORIZATION'];
        $key = env('JWT_KEY');
        try{
            // $token = str_replace('Bearer ','',$authorization);
            $decode = JWTFirebase::decode($authorization, new Key($key, 'HS256'));
            return $decode;
        }catch(\Throwable $th){
            return response()->json($th->getMessage(), 401);
        }
    }
    public static function create(User $data){
        $key = env('JWT_KEY');
        $payload = [
            'exp' => time() + 86400,
            'iat' => time(),
            'role_id' => $data->role_id,
            'data' => $data
        ];
        //return the encoded payload with HS256 hash type
        return JWTFirebase::encode($payload, $key, 'HS256');
    }
}
