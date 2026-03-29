<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller{


    public function login(LoginRequest $request){

    $credentials = $request->only('email','password');

    $token = JWTAuth::attempt($credentials);

    if (!$token){
        return response(["message"=>"unAthorized"],401);
    }

     return response([
        "message"=>"login attemptted successfully",
        "token" => $token,
        "expires_at" => JWTAuth::factory()->getTTl() * 60
        ],
        200
    );

    }


    public function refresh(){
        
    }

    public function me(){}


    public function logout(){}

}