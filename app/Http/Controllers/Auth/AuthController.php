<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{   
    /*
    public function register(Request $request)
    {   
    
        $request->validate(
            [ 'name' => 'required|string' ,
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
            ]
        );

        $user = User::create([
        'name' => $request->name ,
        'email' => $request->name ,
        'password' => Hash::make($request->password)
        ]
        );
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(
            [
                "user" => $user 
            ],201
        );

    }
        */

    public function register(RegisterRequest $request)
    {   
    
        $user = User::create($request->all());
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(
            [
                "user" => $user 
            ],201
        );

    }

    public function login(Request $request)
    {
        
    }

    public function logout(Request $request)
    {
        
    }
}
