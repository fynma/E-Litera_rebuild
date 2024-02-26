<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function sendReport(Request $request)
    {
        try {
            $data = $request->all();
            
            $newReport = new Contact([
                'user_id' => $data['user_id'],
                'username' => $data['username'],
                'email' => $data['email'],
                'contact' => $data['contact'],
                // 'tgl_report' => $data['tgl_report'],
            ]);

            $newReport->save();

            return response()->json(['success' => 'Report sent successfully'], 200);
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}
