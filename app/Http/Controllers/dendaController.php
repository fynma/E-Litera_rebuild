<?php

namespace App\Http\Controllers;


use App\Models\borrow;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class dendaController extends Controller
{
    public function newdenda($borrow_id){

        $peminjaman = Borrow::find($borrow_id);

        $tglKembali = Carbon::parse($peminjaman->tgl_kembali);
        $keterlambatan = $tglKembali->diffInDays(now());

        dd($keterlambatan);
    }
}
