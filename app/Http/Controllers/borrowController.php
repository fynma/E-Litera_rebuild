<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\borrow;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class borrowController extends Controller
{
    public function borrowBook(Request $request)
    {

        $book_id = $request->input('book_id');  
        $user_id = $request->input('user_id');  
        $jumlah_dipinjam = $request->input('jumlah_pinjam');
        $tgl_pinjam = now();
        $tgl_kembali = Carbon::parse($tgl_pinjam)->addDays(7);

        $book = Book::find($book_id);

        if ($book && $book->stok >= $jumlah_dipinjam) {
            $book->stok -= $jumlah_dipinjam;
            $book->save();

            $borrow = Borrow::create([
                'user_id' => $user_id,
                'book_id' => $book_id,
                'tgl_pinjam' => $tgl_pinjam,
                'tgl_kembali' => $tgl_kembali,
                'jumlah_pinjam' => $jumlah_dipinjam,
                'status' => 'Sedang diproses',
                'petugas_pinjam' => 'belum dikonfirmasi',
                'petugas_kembali' => 'belum dikonfirmasi',
                'konfirmasi_peminjaman' => '0',
                'konfirmasi_pengembalian' => '0',
            ]);


            if ($borrow) {
                return response()->json(['message' => 'Berhasil meminjam, tunggu konfirmasi petugas'], 200);
            } else {
                return response()->json(['message' => 'Gagal meminjam'], 500);
            }
        } else {
            return response()->json(['message' => 'Stok buku tidak mencukupi'], 400);
        }
    }

    public function confirmBorrow(Request $request)
    {

        $id = $request->input('borrow_id');

        $borrow = Borrow::findOrFail($id);
        $petugas = User::find($request->user_id);

        $tgl_pinjam = $request->input('tgl_pinjam');
        $tgl_kembali = $request->input('tgl_kembali');
        $jumlah_pinjam = $request->input('jumlah_pinjam');
        if ($borrow) {
            $borrow->update([
                'konfirmasi_pinjam' => '1',
                'status' => 'Dipinjam',
                'petugas_pinjam' => $petugas->long_name,
                'tgl_pinjam' => $tgl_pinjam,
                'tgl_kembali' => $tgl_kembali,
                'jumlah_pinjam' => $jumlah_pinjam,
            ]);
            // dd($borrow);


            return response()->json(['message' => 'Sudah dikonfirmasi'], 200);
        } else {
            return response()->json(['message' => 'Gagal konfirmasi'], 500);
        }
    }

    public function returnBorrow(Request $request)
    {
        $id = $request->input('borrow_id');
        $borrow = Borrow::findOrFail($id);
        $petugas = User::find($request->user_id);
        $tgl_pinjam = $request->input('tgl_pinjam');
        $tgl_kembali = $request->input('tgl_kembali');
        $jumlah_pinjam = $request->input('jumlah_pinjam');
        $konfirmasi = $request->input('konfirmasi_kembali');
    
        if ($borrow) {
            $book = Book::find($borrow->book_id);
    
            if ($book) {
                if (!$borrow->konfirmasi_kembali) {
                    $book->stok += $borrow->jumlah_pinjam;
                    $book->save();
    
                    if ($borrow->konfirmasi_pinjam == '1') {
                        $status = ($konfirmasi == 1) ? 'Tersedia' : 'Terlambat';
    
                        $borrow->update([
                            'konfirmasi_kembali' => $konfirmasi,
                            'status' => $status,
                            'petugas_kembali' => $petugas->long_name,
                            'tgl_kembali' => $tgl_kembali,
                            'tgl_pinjam' => $tgl_pinjam,
                            'jumlah_pinjam' => $jumlah_pinjam,
                            'konfirmasi_pinjam' => '1',
                        ]);
                    } else {
                        return response()->json(['message' => 'Peminjaman belum dikonfirmasi'], 400);
                    }
                } else {
                    return response()->json(['message' => 'Peminjaman sudah dikonfirmasi sebelumnya'], 400);
                }
            } else {
                return response()->json(['message' => 'Buku tidak ditemukan'], 404);
            }
        } else {
            return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
        }
    }
    

    public function showBorrow()
    {

        $borrow = Borrow::all();
        return response()->json($borrow, 200);
    }


    

    //cancel belum fix 
    public function  cancelBorrow(Request $request)
    {
        // $user_id = $request->input('user_id');
        // $book_id = $request->input('book_id');
        $borrow_id = $request->input('borrow_id');


        $borrow = borrow::find($borrow_id);

        if (!$borrow) {
            return response()->json(['message' => 'data pinjam tidak ditemukan'], 404);
        }

        $confirm = $borrow -> konfirmasi_pinjam;

        if ($confirm == 0)
        {
            $borrow->delete();
        } else {
            return response()->json(['message' => 'peminjaman sudah dikonfirmasi '], 400);
        }

    }

}
