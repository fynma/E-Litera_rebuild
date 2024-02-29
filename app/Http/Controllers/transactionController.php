<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\transaction;

class transactionController extends Controller
{
    public function transaction_midtrans(Request $request)
    {

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $data['totalHarga'],
            ),

            'customer_details' => array (
                'username' => $data['username'],
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $transaction -> snap_token = $snapToken;
        

        $transaction->save();

        return response()->json($transaction);
    }
}
