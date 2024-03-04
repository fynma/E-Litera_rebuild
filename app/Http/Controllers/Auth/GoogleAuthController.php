<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{

    public function redirectGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function GoogleCallback()
    {
        try {
            $google_user = Socialite::driver('google')->user();



            $user = User::where('email', $google_user->getEmail())->first();

            $token = $google_user->token;

            session(['user' => $google_user]);
            session(['user_id' => $google_user->user_id]); 
            session(['access' => $google_user->access]); 
    
            $tokenFromSession = session('token');
            // dd($tokenFromSession);

            if(!$user) {
                $newUser = User::create([
                    'email' => $google_user->getEmail(),
                    'username' => $google_user->getName(),
                    'google_id' => $google_user->getId(),
                ]);

                Auth::login($newUser);

                return redirect()->intended('user/homepage');
            } else {

                Auth::login($user);
                return redirect('user/homepage');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
