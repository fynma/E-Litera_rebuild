<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function register(Request $request)
    {
    // Validasi data registrasi
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|max:48',
        'username' => 'required|string|max:18',
        'long_name' => 'required|string|max:48',
        'telp' => 'required|string|max:15',
        'password' => 'required|string|min:8|confirmed'
    ]);
    
    if ($validator->fails()) {
        return response()->json($validator->errors(), 422);
    }

        // Buat pengguna baru
        $user = User::create([   
            'email' => $request->email,
            'username' => $request->username,
            'long_name' => $request->long_name,
            'telp' => $request->telp,
            'password' => bcrypt($request->password),
        ]);

        if($user) {
            return response()->json([
                'success' => true,
                'user'    => $user,  
            ], 201);
        }

        return response()->json([
            'success' => false,
        ], 409);
    }

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {   
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication successful
            $user = User::where('email', $request->email)->first();
            $token = auth()->attempt(['email' => $request->email, 'password' => $request->password]);
        
        } else {
            // Authentication failed
            dd('Authentication failed');
        }
        

        session(['user' => $user]);
        session(['user_id' => $user->user_id]);
        session(['access' => $user->access]);
        session(['token' => $token]);

         // session(['jwt'])
        switch ($user->access) {
            case 'petugas':
                $request->session()->regenerate();
                return redirect('admin/homepage')->with([
                'status' => 'success',
                'user' => $user,
                'auth' => [
                    'token' => $token,
                    'type' => 'Bearer'
                ]
            ]);
        }

        switch ($user->access) {
            case 'administrator':
                $request->session()->regenerate();
                return redirect('admin/homepage')->with([
                'status' => 'success',
                'user' => $user,
                'auth' => [
                    'token' => $token,
                    'type' => 'Bearer'
                ]
            ]);
        }


        switch ($user->access) {
            case 'user':
                $request->session()->regenerate();
                return redirect('/home')->with([
                'status' => 'success',
                'user' => $user,
                'auth' => [
                    'token' => $token,
                    'type' => 'Bearer'
                ]
            ]);
        }
    }



    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 10080
        ]);
    }


    public function me()
    {
        return response()->json(auth()->user());
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

}
