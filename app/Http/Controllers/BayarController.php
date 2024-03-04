<?php

namespace App\Http\Controllers;

use App\Models\borrow;
use Illuminate\Http\Request;

class BayarController extends Controller
{
    public function bayarDenda(Request $request)
    {
        $totalHarga = $request->input('totalHarga');
        $namaUser = $request->input('namauser');
        $borrow_id = $request->input('idBorrow');
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $borrow_id,
                'gross_amount' => $totalHarga,
            ),
            'customer_details' => array(
                'username' => $namaUser,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return response()->json(['snapToken' => $snapToken]);
        // return view('user/Denda', compact('snapToken'));
    }

    public function success(Request $request)
    {
        if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
            $ubah = borrow::find($request->idPinjam);
            $ubah->update(['status' => 'Telah dibayar']);
            return response()->json(['message' => 'Pembayaran Berhasil ']);
        }

        // $serverKey = config('midtrans.server_key');
        // $hashed = hash('sha512', $serverKey);
        // if($hashed == $request->signature_key) {
        //     if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
        //         $ubah = borrow::find($request->idPinjam);
        //         $ubah->update(['status' => 'Telah dibayar']);
        //         return response()->json(['message' => 'Pembayaran Berhasil ']);
        //     }
        // }
    }
}
