<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\book_category;
use App\Models\bookList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function makeBook(Request $request)
    {
        
        $validation = $request->validate([
            'gambar' => 'file|mimes:jpeg,png,jpg,gif',
            'judul' => 'required|string|max:255',
            'kode_buku' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|string|max:255',
            'total_buku' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $photo = $request->file('gambar');
        $encodedphoto = base64_encode(file_get_contents($photo));

        $newBook = new Book([
            'judul' => $validation['judul'],
            'kode_buku' => $validation['kode_buku'],
            'penulis' => $validation['penulis'],
            'penerbit' => $validation['penerbit'],
            'tahun_terbit' => $validation['tahun_terbit'],
            'total_buku' => $validation['total_buku'],
            'deskripsi' => $validation['deskripsi'],
            'gambar' => $encodedphoto
        ]);
        $stokvalue = $request['total_buku'];
        $newBook->stok = $stokvalue;

        $newBook->save();

        $id = $newBook->book_id;

        $check = $request->post();
        $kategori = $check['category'];
        $kategoriArray = explode(',', $kategori);
        foreach ($kategoriArray as $key => $value) {
            $data['book_id'] = $id;
            $data['category_id'] = $value;
            DB::table('book_category')->insert($data);
        }

        if ($data) {
            return response()->json(['data' => $newBook], 200);

        } else {
            return response()->json(['message' => 'buku gagal ditambahkan'], 500);
        }
    }



    public function BookCoverView()
    {
        // Ambil data dari view SQL
        $bookDetails = BookList::all();

        // Buat array kosong untuk menampung hasil pengelompokan
        $groupedBooks = [];

        // Buat array sementara untuk menyimpan total rating dan jumlah rating
        $tempRating = [];

        // Lakukan iterasi pada setiap detail buku
        foreach ($bookDetails as $bookDetail) {
            // Cek apakah buku sudah ada dalam hasil pengelompokan
            if (!array_key_exists($bookDetail->book_id, $groupedBooks)) {
                // Jika belum ada, tambahkan buku ke hasil pengelompokan
                $groupedBooks[$bookDetail->book_id] = [
                    'book_id' => $bookDetail->book_id,
                    'judul' => $bookDetail->judul,
                    'gambar' => $bookDetail->gambar,
                    'kode_buku' => $bookDetail->kode_buku,
                    'penulis' => $bookDetail->penulis,
                    'penerbit' => $bookDetail->penerbit,
                    'tahun_terbit' => $bookDetail->tahun_terbit,
                    'deskripsi' => $bookDetail->deskripsi,
                    'total_buku' => $bookDetail->total_buku,
                    'stok' => $bookDetail->stok,
                    // Inisialisasi kategori sebagai array kosong
                    'kategori' => [],
                ];
                // Inisialisasi total rating dan jumlah rating
                $tempRating[$bookDetail->book_id] = ['totalRating' => 0, 'numRatings' => 0];
            }

            // Tambahkan kategori ke buku yang sesuai
            $groupedBooks[$bookDetail->book_id]['kategori'][] = $bookDetail->kategori;

            // Tambahkan rating ke total rating
            $tempRating[$bookDetail->book_id]['totalRating'] += $bookDetail->rating;
            // Tambahkan jumlah rating
            $tempRating[$bookDetail->book_id]['numRatings']++;
        }

        // Hitung rata-rata rating dan tambahkan ke hasil pengelompokan
        foreach ($groupedBooks as $key => $book) {
            $avgRating = $tempRating[$book['book_id']]['numRatings'] > 0 ?
                $tempRating[$book['book_id']]['totalRating'] / $tempRating[$book['book_id']]['numRatings'] : 0;
            $groupedBooks[$key]['rating'] = $avgRating;
        }

        // Ubah hasil pengelompokan menjadi array numerik
        $groupedBooks = array_values($groupedBooks);

        return response()->json(['data' => $groupedBooks], 200);
    }

    public function BookopenID($book_id = null)
    {
        if ($book_id === null) {
            return response()->json([
                'success' => false,
                'message' => 'ID buku tidak terambil.'
            ], 400);
        }
    
        // Ambil data buku berdasarkan book_id
        $bookDetails = BookList::where('book_id', $book_id)->get();
    
        // Inisialisasi array untuk menampung hasil pengelompokan
        $groupedBooks = [];
    
        // Inisialisasi array sementara untuk menyimpan total rating dan jumlah rating
        $tempRating = [];
    
        // Lakukan iterasi pada setiap detail buku
        foreach ($bookDetails as $bookDetail) {
            // Memeriksa apakah $bookDetail adalah objek yang valid
            if ($bookDetail !== null) {
                // Jika buku belum ada dalam hasil pengelompokan, tambahkan
                if (!array_key_exists($bookDetail->book_id, $groupedBooks)) {
                    // Inisialisasi data buku
                    $groupedBooks[$bookDetail->book_id] = [
                        'book_id' => $bookDetail->book_id,
                        'judul' => $bookDetail->judul,
                        'gambar' => $bookDetail->gambar,
                        'kode_buku' => $bookDetail->kode_buku,
                        'penulis' => $bookDetail->penulis,
                        'penerbit' => $bookDetail->penerbit,
                        'tahun_terbit' => $bookDetail->tahun_terbit,
                        'deskripsi' => $bookDetail->deskripsi,
                        'total_buku' => $bookDetail->total_buku,
                        'stok' => $bookDetail->stok,
                        // Inisialisasi kategori sebagai array kosong
                        'kategori' => [],
                        // Inisialisasi total rating dan jumlah rating
                        'totalRating' => 0,
                        'numRatings' => 0,
                    ];
                }
        
                // Tambahkan kategori ke buku yang sesuai
                $groupedBooks[$bookDetail->book_id]['kategori'][] = $bookDetail->kategori;
        
                // Tambahkan rating ke total rating dan jumlah rating
                $groupedBooks[$bookDetail->book_id]['totalRating'] += $bookDetail->rating;
                $groupedBooks[$bookDetail->book_id]['numRatings']++;
            }
        }
    
        // Hitung rata-rata rating dan tambahkan ke hasil pengelompokan
        foreach ($groupedBooks as &$book) {
            $avgRating = $book['numRatings'] > 0 ? $book['totalRating'] / $book['numRatings'] : 0;
            $book['rating'] = $avgRating;
            // Hapus totalRating dan numRatings karena sudah tidak diperlukan lagi
            unset($book['totalRating']);
            unset($book['numRatings']);
        }
    
        // Ubah hasil pengelompokan menjadi array numerik
        $groupedBooks = array_values($groupedBooks);
    
        // Kembalikan respons dengan data buku yang ditemukan
        return response()->json(['displaydata' => $groupedBooks], 200);
    }
    


    // public function BookCoverView()
    // {
    //     // Ambil data dari view SQL
    //     $bookDetails = BookList::all();

    //     // Buat array kosong untuk menampung hasil pengelompokan
    //     $groupedBooks = [];

    //     // Lakukan iterasi pada setiap detail buku
    //     foreach ($bookDetails as $bookDetail) {
    //         // Cek apakah buku sudah ada dalam hasil pengelompokan
    //         if (!array_key_exists($bookDetail->book_id, $groupedBooks)) {
    //             // Jika belum ada, tambahkan buku ke hasil pengelompokan
    //             $groupedBooks[$bookDetail->book_id] = [
    //                 'book_id' => $bookDetail->book_id,
    //                 'judul' => $bookDetail->judul,
    //                 'gambar' => $bookDetail->gambar,
    //                 'kode_buku' => $bookDetail->kode_buku,
    //                 'penulis' => $bookDetail->penulis,
    //                 'penerbit' => $bookDetail->penerbit,
    //                 'tahun_terbit' => $bookDetail->tahun_terbit,
    //                 'deskripsi' => $bookDetail->deskripsi,
    //                 'total_buku' => $bookDetail->total_buku,
    //                 'stok' => $bookDetail->stok,
    //                 'rating' => $bookDetail->rating,
    //                 // Inisialisasi kategori sebagai array kosong
    //                 'kategori' => [],
    //             ];
    //         }

    //         // Tambahkan kategori ke buku yang sesuai
    //         $groupedBooks[$bookDetail->book_id]['kategori'][] = $bookDetail->kategori;
    //     }

    //     // Ubah hasil pengelompokan menjadi array numerik
    //     $groupedBooks = array_values($groupedBooks);

    //     return response()->json(['data' => $groupedBooks], 200);
    // }

    public function Bookdetail(Request $request)
    {
        $book_id = $request->input('book_id');

        $book = DB::table('book')
            ->select(
                'book.book_id',
                'book.judul',
                'book.gambar',
                'book.kode_buku',
                'book.penulis',
                'book.penerbit',
                'book.tahun_terbit',
                'book.total_buku',
                'book.stok',
                'book.deskripsi',
                'book.created_at',
                'book.updated_at',
                'category.name_category as category_name'
            )
            ->join('book_category', 'book.book_id', '=', 'book_category.book_id')
            ->join('category', 'book_category.category_id', '=', 'category.category_id')
            ->where('book.book_id', $book_id)
            ->get();

        // Transform the result to group books by book_id
        $groupedBooks = collect($book)->groupBy('book_id');

        // Create a new array structure with book information and categories
        $booksWithCategories = $groupedBooks->map(function ($group) {
            return [
                'book_id' => $group[0]->book_id,
                'judul' => $group[0]->judul,
                'gambar' => $group[0]->gambar,
                'kode_buku' => $group[0]->kode_buku,
                'penulis' => $group[0]->penulis,
                'penerbit' => $group[0]->penerbit,
                'tahun_terbit' => $group[0]->tahun_terbit,
                'total_buku' => $group[0]->total_buku,
                'stok' => $group[0]->stok,
                'deskripsi' => $group[0]->deskripsi,
                'created_at' => $group[0]->created_at,
                'updated_at' => $group[0]->updated_at,


                'categories' => $group->pluck('category_name')->toArray(),
            ];
        })->values();

        dd($booksWithCategories);
    }


    public function updateBook(Request $request)
    {
        $dataBook = $request->post();
        // dd($dataBook);
        try {
            $id = $dataBook['book_id'];
            $book = Book::find($id);
            $dataBook['stok'] = $dataBook['total_buku'];
            $book->update($dataBook);
            return response()->json(['data' => $book], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'buku gagal di update'], 500);
        }
    }

    public function deleteBook()
    {
        $dataBook = request()->all();
        $id = $dataBook['book_id'];

        $book = Book::find($id)->delete();

        // dd($book);
        if ($book) {
            return response()->json(['message' => 'buku berhasil di hapus'], 200);
        } else {
            return response()->json(['message' => 'buku gagal di hapus'], 500);
        }
    }
}
