<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
    public function editProfile(Request $request)
    {
        // try {
            $user = Auth::user();

            $validator = Validator::make($request->all(), [
                'photo' => 'file|mimes:jpeg,png,jpg,gif',
                'email' => 'string',
                'username' => 'string',
                'long_name' => 'string',
                'telp' => 'string',
                'address' => 'string',
            ]);

            if ($validator->fails()) {
                return response()->json(['success' => false, 'errors' => $validator->errors()], 422);
            }
            $user = Auth::user();
            $oldEmail       = $user->email;
            $oldUsername    = $user->username;
            $oldLongName    = $user->long_name;
            $oldTelp        = $user->telp;
            $oldAddress     = $user->address;

            // Upload foto jika ada
            $photo= $request->file('photo');
            $encodedphoto = base64_encode(file_get_contents($photo));

            // Simpan data pengguna
            $user->email = $request->input('email', $oldEmail);
            $user->username = $request->input('username', $oldUsername);
            $user->long_name = $request->input('long_name', $oldLongName);
            $user->telp = $request->input('telp', $oldTelp);
            $user->address = $request->input('address', $oldAddress);
            $user->photo = $encodedphoto;
            
            // print_r($user);
            $user->save();

            return response()->json(['success' => true, 'message' => 'Profil berhasil diperbarui'], 200);
        // } catch (\Exception $e) {
        //     return response()->json(['success' => false, 'message' => 'Failed to update profile'], 500);
        // }
    }
}
