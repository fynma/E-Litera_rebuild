<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class roleCheck
{
    public function handle($request, Closure $next, $role)
    {
        // try {
        // Check if the request contains a valid Bearer token
        // dd(session('token'));
        // session(['token' => null]);
        $token = session('token');
        // dd(session('access'));
        // dd($token);
        // $token = JWTAuth::parseToken()->authenticate();
        // dd($token);      
        // If the token is valid, proceed to check the user's role
        $userRole = session('access');
        if ($token   != null) {
            // dd("true");
            if (in_array($userRole, explode('|', $role))) {
                return $next($request);
            } else {
                // Handle role-based redirection or response
                if ($userRole === 'petugas') {
                    return redirect('admin/dashboard')->with('message', 'no access');
                } else if ($userRole === 'administrator') {
                    return redirect('admin/dashboard')->with('message', 'no access');
                } else  if ($userRole === 'user') {
                    return redirect('user')->with('message', 'no access');
                }
            }
        } else {    
            return redirect('/loginpage')->with('message', 'no access');
        }

        // } catch (\Exception $e) {
        //     // Handle invalid or missing token
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
    }
}