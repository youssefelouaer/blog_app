<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {   
    
        $user = User::create($request->all());
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(
            [
                "user" => $user 
            ]
        );

    }

    public function login(Request $request)
    {
        
    }

    public function logout(Request $request)
    {
        
    }
}
