<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class notifController extends Controller
{
    public function notification(Request $request)
    {
        $newnotif = $request -> all();

        $notification = new notification ([
            'user_id' => $newnotif['user_id'],
            'to_user' => $newnotif['to_user'],
            'title'   => $newnotif['title'],
            'message' => $newnotif['message'],
        ]);

        $notification ->save();

        if ($notification) {
            return response()->json(['data' => $notification], 200);
        } else {
            dd('data gagal ditambahkan ');
        }
    }

    public function showNotifAdmin()
    {
        $notif = DB::table('user_notification')
            ->where('access', 'user')
            ->get();
    
        return response()->json(['data' => $notif], 200);
    }

    public function showNotifUser()
    {
        $notif = DB::table('user_notification')
            ->where('access', 'administrator')
            ->get();
    
        return response()->json(['notif' => $notif], 200);
    }

    public function tampilkanNotif(Request $request)
    {
        $notif = DB::table('user_notification')
            ->where('access', 'administrator')
            ->when($request->has('to_user'), function ($query) use ($request) {
                return $query->where('to_user', $request->to_user);
            })
            ->get();
    
        return response()->json(['data' => $notif], 200);
    }
    
}
