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
    public function newDenda(Request $request)
    {
            $newDenda = $request-> all();
            

            $newDenda = Denda::create([
                'user_id' => $newDenda['user_id'],
                'book_id' => $newDenda['book_id'],
                'keterlambatan' => $newDenda['keterlambatan'],
                'tarif_denda' => $newDenda['tarif_denda'],
            ]);

            if ($newDenda) {
                return response()->json(['message' => 'Denda ditambahkan'], 200);
            } else {
                return response()->json(['message' => 'Denda gagal ditambahkan'], 500);
            }
    }
}
