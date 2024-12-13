<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' =>'required',
            'email' =>'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            "success" => true,
           'message' => 'User registered successfully'
            
        ], 201);
    }

    public function login(Request $request){
        $request->validate([
            
            'email' =>'required|email|max:255',
            'password' => 'required|min:8',
        ]);

        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                "success" => false,
               'message' => 'Unauthorized login'
            ],401);
        }

        $user=User::where('email', $request->email)->firstOrFail();
        $token=$user->createToken('auth_token')->plainTextToken;
        return response()->json([
            "success" => true,
            'token' => $token,
            'message' => "User Login Successfully"
        ],202);            
        
    }

    public function logout(Request $request){
       $request->user()->currentAccessToken()->delete();
       return response()->json([
           "success" => true,
          'message' => 'User logged out successfully'
       ],200);          
        
    }
}
