<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PasswordResetToken;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Mail\Message;
use Illuminate\Support\Str;
use Carbon\Carbon;
class PasswordResetTokenController extends Controller
{
    public function sendResetPasswordEmail(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
        ]);

        $email = $request->email;

        $user = User::where('email', $email)->first();

        if(!$user){
            return response([
                'message'=>'Email does not exist.',
                'status'=>'failed',
            ], 404);
        }

        $token = Str::random(60);

        PasswordResetToken::create([
            'email'=> $email,
            'token'=> $token,
            'created_at'=>Carbon::now(),
        ]);

        Mail::send('reset', ['token'=>$token], function(Message $message)use($email){
            $message->to($email)->subject('Reset Your Password');
        });

        return response([
            'message'=>'Password reset email sent! Check your email.',
            'status'=>'success',
        ]);
    }

    public function resetForm(Request $request, $token)
    {
        $formatted = Carbon::now()->subMinutes(1)->toDateTimeString();
        PasswordResetToken::where('created_at', '<=', $formatted)->delete();

        $passwordReset = PasswordResetToken::where('token', $token)->first();

        if(!$passwordReset){
            return response([
                'message'=> 'Token is invalid or expired.',
                'status'=> 'failed',
            ], 404);
        }

        return view('ResetPasswordForm', ['token' => $token]);
    }
    public function reset(Request $request, $token)
    {   
        $request->validate([
            'password'=>'required|confirmed',
        ]);

        $passwordReset = PasswordResetToken::where('token', $token)->first();

        $user = User::where('email', $passwordReset->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        PasswordResetToken::where('email', $user->email)->delete();

        return response([
            'message'=>'Password reset successfully.',
            'status'=>'success',
        ], 200);
    }
}
