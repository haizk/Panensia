<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{

    // login function
    public function login(Request $request){
        $request->validate([
            "email"=> "required|email:dns",
            "password"=> "required",
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'success'   => false,
                'message' => 'Login failed! Invalid credentials.',
            ], 404);
        }
    
        $token = $user->createToken('ApiToken')->plainTextToken;
    
        $response = [
            'success'   => true,
            'message' => 'Successfully logged in!',
            'user'      => $user,
            'token'     => $token
        ];
    
        return response($response, 201);
    }

    //logout function
    public function logout()
    {
        auth()->logout();
        return response()->json([
            'success'    => true,
            'message' => 'Successfully logged out!'
        ], 200);
    }
}
