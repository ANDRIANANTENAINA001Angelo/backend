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
        $credentials = $request->validated();
        
        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken("token");
    
            return $this->response->success(
                [
                'token' => $token->plainTextToken,
                "user"=>Auth::user()
            ],"user connected succesfuly!"
            );
            
        }
        
        return $this->response->error("BAD REQUEST","Les données reçues ne sont pas valide!",400);
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();

        return response()->json(
            ["message"=>"Utilisateur déconnecter"],200
        );
    }
}
