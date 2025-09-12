<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        $request-> validate(
            [
                'email' => 'required|email' ,
                'password' => 'required'
            ]
        );
        if(!Auth::attempt($request->only('email','password')))
            return response()->json(
        [
            'message' => 'Invalid email or password'
        ],401);

        $user = User::where('email',$request->email)->FirstOrFail() ;
        $token = $user->createToken('auth_token')->plainTextToken ;
        return response()->json(
        [
            'message' => 'Login Successful' ,
             
            'user' => $user ,
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete() ;
        return response()->json(
            [
                'message' => 'Logout Successful'
            ]
            );
    }
}
