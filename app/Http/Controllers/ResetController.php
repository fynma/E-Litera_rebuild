<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

class ResetController extends Controller
{
    public function resetPassword(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->get();

            if (count($user) > 0)
            {
                $token = Str::random(40);
                $domain = URL::to('/');
                $url = $domain. '/api/reset-password?token='.$token;

                $data['url']= $url;
                $data['email'] = $request->email;
                $data['title'] = "password Reset";
                $data['body'] = "Click here to resets Password";

                Mail::send('forgetPasswordMail', ['data'=>$data], function ($message) use ($data) {
                    $message->to($data['email'])->subject($data['title']);
                });

                $datetime = Carbon::now()->format('Y-m-d H:i:s');
                PasswordReset::updateOrCreate(
                    ['email' => $request->email],
                    [
                        'email' => $request->email,
                        'token' => $token,
                        'created_at' => $datetime,
                    ]
                    );
                    return response()->json(['success'=>true, 'message'=> 'Check your email to reset password']);

            } else {
                return response()->json(['success'=>false, 'message'=> 'User not found ! ']);
            }
        } catch (\Exception $e) {
            return response()->json(['success'=>false, 'message'=>$e->getMessage()]);
        }
    }
    public function passwordLoad(Request $request)
    {
        $resetpw = PasswordReset::where('token', $request->token)->get();
        if (isset($request->token) && count($resetpw) > 0 ) {

            $user = User::where('email', $resetpw[0]['email'])->get();
            return view ('resetPassword', compact('user'));
        } else 
        {
            return view('404');
        }
    }

    public function updatepassword(Request $request)
    {
        $request ->validate([
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::find($request->user_id);
        $user ->password = $request->password;
        $user ->save();

        return "<h1>your password has been changed ! </h1>";

    }


}
