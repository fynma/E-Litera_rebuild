<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function ambilUser()
    {
        // Mengambil semua data user dari tabel users
        $users = User::all();
        
        // Mengembalikan data dalam format JSON
        return response()->json([
            'success' => true,
            'message' => 'Data users berhasil diambil',
            'data' => $users
        ]);
    }

    public function userSatuan($user_id = null)
    {
        if ($user_id === null) {
            return response()->json([
                'success' => false,
                'message' => 'ID pengguna tidak diberikan.'
            ], 400);
        }

        $user = User::where('user_id', $user_id)->firstOrFail();
        
        return response()->json([
            'success' => true,
            'data' => $user
        ]);
    }
}
