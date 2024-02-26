<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaction;

class transactionController extends Controller
{
    public function transaction_midtrans(Request $request)
    {
        $data = $request->all();

        $transaction = transaction::create([
            'email' => $data['email'],
            'username' => $data['username'],
            'denda_id' => $data['denda_id'],
            'user_id' => $data['user_id'],
            'total_denda' => $data['total_denda'],
        ]);

        // config('midtrans.serverKey')
        \Midtrans\Config::$serverKey = 'SB-Mid-server-RriNo9Xmt9LiSgIMj7tdvhLt';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $data['totalHarga'],
            ),

            'customer_details' => array (
                'first_name' => $data['username'],
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transaction -> snap_token = $snapToken;
        

        $transaction->save();

        return response()->json($transaction);
    }
}
