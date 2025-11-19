<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
public function Registar(Request $request)
{
    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'Mobile' => 'required|string|unique:users,Mobile|min:10',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $user = User::create([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'Mobile' => $request->Mobile,
        'password' => Hash::make($request->password),
    ]);

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'status' => 200,
        'message' => 'User Registered Successfully',
        'data' => [
            'Token' => $token,
            'user' => $user,
        ],
    ]);
}

public function login(Request $request  )
{
     $request->validate([
        'Mobile' => 'required|string',
        'password' => 'required|string|min:8',
    ]);

    if (!Auth::attempt($request->only('Mobile', 'password'))) {
        return response()->json(['message' => 'Invalid login details'], 401);
    }

    $user = User::where('Mobile', $request->Mobile)->first();
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json(
        [
            'status' => 200,
            'message' => 'User Logged In Successfully',
            'data' => [
                'Token' => $token,
                'user' => $user,
            ],
        ]
    );
    
}

public function logout(Request $request)
{
   
  $request->user()->currentAccessToken()->delete();

    return response()->json(
        [
            'status' => 200,
            'message' => 'User Logged Out Successfully',
        ]
    );
}
}