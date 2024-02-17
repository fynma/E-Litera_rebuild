<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    public function profile()
    {
        try{
            return response()->json(['success' => true, 'data' => Auth::user()], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function profileweb()
    {
        try{
            $id = session()->get('user_id');

            $opr = User::where('user_id', $id)->first();
            return response()->json(['success' => true, 'data' => $opr], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    public function editProfile(Request $request)
    {
        $userId = $request->input('user_id');
    
        $validator = Validator::make($request->all(), [
            'photo' => 'file|mimes:jpeg,png,jpg,gif',
            'email' => 'string',
            'username' => 'string|max:10',
            'long_name' => 'string',
            'telp' => 'integer',
            'address' => 'string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
        }
    
        // Ambil pengguna berdasarkan user_id
        $user = User::find($userId);
    
        if (!$user) {
            return response()->json(['success' => false, 'message' => 'Pengguna tidak ditemukan'], 404);
        }
    
        // Upload foto jika ada
        $photo = $request->file('photo');
        $encodedphoto = $photo ? base64_encode(file_get_contents($photo)) : null;
    
        // Simpan data pengguna
        $user->email = $request->input('email', $user->email);
        $user->username = $request->input('username', $user->username);
        $user->long_name = $request->input('long_name', $user->long_name);
        $user->telp = $request->input('telp', $user->telp);
        $user->address = $request->input('address', $user->address);
        $user->photo = $encodedphoto ?? $user->photo;
    
        $user->save();

        session(['user' => $user]);
        session(['username'     => $user->username]);
        session(['long_name'    => $user->long_name]);
        session(['telp'         => $user->telp]);
        session(['email'        => $user->email]);
        session(['address'      => $user->address]);
        session(['photo'        => $user->photo]);

        
        return response()->json([
            'success' => true,
            'message' => 'Profil berhasil diperbarui',
            'user' => $user,
        ], 200);
    }

    public function totalUser()
    {
        try{
            $data = User::count();
            return response()->json(['success' => true, 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function ListUser()
    {
        try{
            $data = User::all();
            return response()->json(['success' => true, 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    public function deleteUser(Request $request)
    {
        try{
            $id = $request->input('user_id');

            $user = User::find($id);
            
            $user->delete();
            return response()->json(['success' => true, 'message' => 'User deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }
    
}
