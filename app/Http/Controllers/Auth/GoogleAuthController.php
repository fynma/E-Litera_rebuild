<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();

            $user = User::where('email', $google_user->email)->first();

                if (!$user) {
                    $newUser = User::create([
                        'email' => $google_user->getEmail(),
                        'username' => $google_user->getName(),
                        'photo' => $google_user->getAvatar(),
                    ]);

                    Auth::login($newUser);
                } else {
                    Auth::login($user);
                    $token = $google_user->token;

                    session(['user' => $user]);
                    session(['user_id' => $user->user_id]);
                    session(['access' => $user->access]);
                    session(['token' => $token]);

                    switch ($user->access) {
                        case 'petugas':
                            return redirect('admin/dashboard')->with([
                                'status' => 'success',
                                'user' => $user,
                                'auth' => [
                                    'token' => $token,
                                    'type' => 'Bearer'
                                ]
                            ]);
                        case 'administrator':
                            return redirect('admin/dashboard')->with([
                                'status' => 'success',
                                'user' => $user,
                                'auth' => [
                                    'token' => $token,
                                    'type' => 'Bearer'
                                ]
                            ]);
                        case 'user':
                            return redirect('user/dashboard')->with([
                                'status' => 'success',
                                'user' => $user,
                                'auth' => [
                                    'token' => $token,
                                    'type' => 'Bearer'
                                ]
                            ]);
                    }
                
            }
            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function handleGoogleCallbackMobile()
    {
        try {
            //gampangya ini register cuy
            $google_user = Socialite::driver('google')->user();

            $user = User::where('email', $google_user->email)->first();

            if (!$user) {
                $newUser = User::create([
                    'email' => $google_user->getEmail(),
                    'username' => $google_user->getName(),
                ]);

                $user = $newUser;
            } else {
                // nah ini login cuy
                Auth::login($user);
                $token = $google_user->token;

                return response()->json([
                    'success' => true,
                    'user' => $user,
                    'auth' => [
                        'token' => $token,
                        'type' => 'Bearer',
                        'expires_in' => auth()->factory()->getTTL() * 10080
                    ]
                ]);
            }
        }
    }
}
