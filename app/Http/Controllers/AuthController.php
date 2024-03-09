<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ApiResponse;

class AuthController extends Controller
{
    public function __construct(private ApiResponse $response) {
        
    }

    public function login(LoginRequest $request){
        $email = $request->validated("email");
        
        $user= User::where("email","=",$email)->get();
        $token = $user[0]->createToken("token");
        // Auth::authenticate($user[0]);

        return $this->response->success(
            [
            'token' => $token->plainTextToken,
            "user"=>$user[0]
        ],"user connected succesfuly!");       
    }
        

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json(
            ["message"=>"Utilisateur déconnecter"],200
        );
    }
}
