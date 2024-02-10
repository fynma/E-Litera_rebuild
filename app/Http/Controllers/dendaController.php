<?php

namespace App\Http\Controllers;


use App\Models\borrow;
use App\Models\Book;
use App\Models\User;
use App\Models\Denda;
use Illuminate\Http\Request;
use Carbon\Carbon;

class dendaController extends Controller
{
    public function newDenda()
    {
        $borrows = borrow::all();

        foreach ($borrows as $borrow) {
            $tglKembali = Carbon::parse($borrow->tgl_kembali);  
            $hariIni    = Carbon::now();
            $keterlambatan = $tglKembali->diffInDays($hariIni);


            if ($keterlambatan > 0) {

                $tarifDendaPerHari = 1000; 

                $totalDenda = $keterlambatan * $tarifDendaPerHari;

                $newDenda = Denda::create([
                    'book_id' => $borrow->book_id,
                    'user_id' => $borrow->user_id,
                    'borrow_id' => $borrow->id,
                    'keterlambatan' => $keterlambatan,
                    'tarif_denda' => $totalDenda,
                ]);

                $book = Book::find($borrow->book_id);

                return response()->json($newDenda + $book);
            }   
        }
    }
}
