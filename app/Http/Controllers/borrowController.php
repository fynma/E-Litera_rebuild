<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\borrow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class borrowController extends Controller
{
    public function borrowBook(Request $request)
    {

        $book_id = $request->input('book_id');  
        $user_id = $request->input('user_id');  
        $jumlah_dipinjam = $request->input('jumlah');
        $tgl_pinjam = $request->input('tanggal-pinjam');
        $tgl_kembali = $request->input('tgl-kembali');

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
                'konfirmasi_pinjam' => '0',
                'konfirmasi_kembali' => '0',
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

        $id = $request->borrow_id;

        $borrow = Borrow::findOrFail($id);
        $petugas = User::find($request->user_id);

        $tgl_pinjam = $request->tgl_pinjam;
        $tgl_kembali = $request->tgl_kembali;
        $jumlah_pinjam = $request->jumlah_pinjam;
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
                        $status = ($konfirmasi == 1) ? 'Dikembalikan' : 'Terlambat';
    
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
    public function returnBorrowAfterPayment(Request $request)
    {
        $id = $request->borrowId;
        $borrow = Borrow::findOrFail($id);
        $petugas = User::find($request->userid);
        $tgl_pinjam = $request->tglpinjam;
        $tgl_kembali = $request->tglkembali;
        $jumlah_pinjam = $request->jumlahpinjam;
        $konfirmasi = $request->konfirmasiKembali;
        $status = 'Dikembalikan';

        if ($borrow) {
            $book = Book::find($borrow->book_id);

            if ($book) {
                $borrow->update([
                    'konfirmasi_kembali' => $konfirmasi,
                    'status' => $status,
                    'petugas_kembali' => $petugas->long_name,
                    'tgl_kembali' => $tgl_kembali,
                    'tgl_pinjam' => $tgl_pinjam,
                    'jumlah_pinjam' => $jumlah_pinjam,
                ]);

                return response()->json(['message' => 'Peminjaman sudah dikonfirmasi.'], 200);
            } else {
                return response()->json(['message' => 'Buku tidak ditemukan'], 404);
            }
        } else {
            return response()->json(['message' => 'Peminjaman tidak ditemukan'], 404);
        }
    }
    

    public function showBorrow()
    {

        // Mengambil semua data user dari tabel users
        $borrow = Borrow::all();
        
        // Mengembalikan data dalam format JSON
        return response()->json([
            'success' => true,
            'message' => 'Data pinjam berhasil diambil',
            'data' => $borrow
        ]);
    }

    public function showReturn()
    {
        // Mengambil semua data pinjaman dengan status "Dipinjam" dari tabel borrow
        $borrowedBooks = Borrow::where('status', 'Dipinjam')->get();
        
        // Mengecek apakah ada data yang ditemukan
        if ($borrowedBooks->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data pinjaman dengan status "Dipinjam"'
            ], 404);
        }
        
        // Mengembalikan data dalam format JSON
        return response()->json([
            'success' => true,
            'message' => 'Data pinjaman dengan status "Dipinjam" berhasil diambil',
            'data' => $borrowedBooks
        ]);
    }

    public function showTelat()
    {
        // Mengambil semua data pinjaman dengan status "Dipinjam" dari tabel borrow
        $borrowedBooks = Borrow::where('status', 'Terlambat')->get();
        
        // Mengecek apakah ada data yang ditemukan
        if ($borrowedBooks->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Tidak ada data pinjaman dengan status "Dipinjam"'
            ], 404);
        }
        
        // Mengembalikan data dalam format JSON
        return response()->json([
            'success' => true,
            'message' => 'Data pinjaman dengan status "Dipinjam" berhasil diambil',
            'data' => $borrowedBooks
        ]);
    }

    public function listdenda(Request $request)
    {
        // Mengambil data dari view menggunakan query builder
        $borrows = DB::table('borrow_view')
                    ->where('status', 'Terlambat')
                    ->when($request->has('user_id'), function ($query) use ($request) {
                        return $query->where('user_id', $request->user_id);
                    })
                    ->get();
    
        // Mengirim data ke view untuk ditampilkan
        return response()->json(['borrows' => $borrows]);
    }

    public function listdendaAdmin(Request $request)
    {
        // Mengambil data dari view menggunakan query builder
        $borrows = DB::table('borrow_view')
                    ->where(function ($query) {
                        $query->where('status', 'Terlambat')
                            ->orWhere('status', 'Telah dibayar');
                    })
                    ->get();
    
        // Mengirim data ke view untuk ditampilkan
        return response()->json(['borrows' => $borrows]);
    }

    public function listPinjam()
    {
        // Mengambil data dari view menggunakan query builder
        $borrows = DB::table('borrow_view')
                    ->where('status', 'Dipinjam')
                    ->get();
    
        // Mengirim data ke view untuk ditampilkan
        return response()->json(['borrows' => $borrows]);
    }
    public function listPermintaanPinjam()
    {
        // Mengambil data dari view menggunakan query builder
        $borrows = DB::table('borrow_view')
                    ->where(function ($query) {
                        $query->where('status', 'Sedang diproses')
                              ->orWhere('status', 'Dipinjam');
                    })    
                    ->get();
    
        // Mengirim data ke view untuk ditampilkan
        return response()->json(['borrows' => $borrows]);
    }

    public function dendaSatuan($borrow_id = null)
    {
        if ($borrow_id === null) {
            return response()->json([
                'success' => false,
                'message' => 'ID pengguna tidak diberikan.'
            ], 400);
        }

        $borrow = DB::table('borrow_view')
                    ->where('borrow_id', $borrow_id)
                    ->get();


        return response()->json(['borrows' => $borrow]);
    }
    

    public function totalBorrow()
    {
        try{
            $data = Borrow::count();
            return response()->json(['success' => true, 'data' => $data], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
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

    public function groupByMonth()
    {
        $result = Borrow::select(DB::raw('DATE_FORMAT(tgl_pinjam, "%M %Y") as month_year'), DB::raw('COUNT(*) as count'))
                ->groupBy('month_year')
                ->orderBy('tgl_pinjam')
                ->get();
    
            return response()->json(['result' => $result]);
    }

    public function showHistory()
    {
        // Fetch data from the user_book_view
        $userBookDetails = DB::table('user_book_view')->get();
        // Return the response as JSON
        return response()->json(['data' => $userBookDetails], 200);
    }

    public function showHistoryById($user_id = null)
    {
        if ($user_id === null) {
            return response()->json([
                'success' => false,
                'message' => 'ID buku tidak terambil.'
            ], 400);
        }
        // Fetch data from the user_book_view
        $detailBukuDipinjam = DB::table('user_book_view')->where('user_id', $user_id)->get();
        // Return the response as JSON
        return response()->json(['data' => $detailBukuDipinjam], 200);
    }
}

