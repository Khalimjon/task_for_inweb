<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::attempt($data)){
            return response()->json(['message' => 'Auth failed']);
        }

        $user = User::where('email', $data['email'])->first();
        $token = $user->createToken('token')->plainTextToken;

        return response()->json(['token' => $token]);
    }
}
