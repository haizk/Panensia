<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        $user = User::where("email", $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            $token = $user->createToken($request->email)->plainTextToken;
            return response([
                'token' => $token,
                'message' => 'Logged in successfully.',
                'status' => 'success',
            ], 200);
        }

        return response([
            'message' => 'Invalid credentials.',
            'status' => 'failed',
        ], 401);
    }
    public function logout(Request $request)
    {
        // Revoke token
        $request->user()->currentAccessToken()->delete();

        return response([
            'message' => 'Logged out successfully.',
            'status' => 'success',
        ], 200);
    }

    public function loggedUser()
    {
        $loggedUser = auth()->user();
        return response([
            'user'=>$loggedUser,
            'message'=>'Logged used data.',
            'status'=>'success',
        ], 200);
    }
}
