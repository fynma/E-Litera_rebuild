<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\book_category;
use App\Models\favorite;
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
        $bookDetails = BookList::all();

        $groupedBooks = [];

        $tempRating = [];
        foreach ($bookDetails as $bookDetail) {
            if (!array_key_exists($bookDetail->book_id, $groupedBooks)) {
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
                    'kategori' => [],
                    'totalRating' => 0,
                    'numRatings' => 0,
                ];
            }

            if (!in_array($bookDetail->kategori, $groupedBooks[$bookDetail->book_id]['kategori'])) {
                $groupedBooks[$bookDetail->book_id]['kategori'][] = $bookDetail->kategori;
            }

            $groupedBooks[$bookDetail->book_id]['totalRating'] += $bookDetail->rating;
            $groupedBooks[$bookDetail->book_id]['numRatings']++;
        }

        foreach ($groupedBooks as &$book) {
            $avgRating = $book['numRatings'] > 0 ? $book['totalRating'] / $book['numRatings'] : 0;
            $book['rating'] = $avgRating;
            unset($book['totalRating']); 
            unset($book['numRatings']); 
        }

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

        $groupedBooks = [];

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

                $groupedBooks[$bookDetail->book_id]['kategori'][] = $bookDetail->kategori;

                $groupedBooks[$bookDetail->book_id]['totalRating'] += $bookDetail->rating;
                $groupedBooks[$bookDetail->book_id]['numRatings']++;
            }
        }

        foreach ($groupedBooks as &$book) {
            $avgRating = $book['numRatings'] > 0 ? $book['totalRating'] / $book['numRatings'] : 0;
            $book['rating'] = $avgRating;
            unset($book['totalRating']);
            unset($book['numRatings']);
        }

        $groupedBooks = array_values($groupedBooks);

        return response()->json(['displaydata' => $groupedBooks], 200);
    }




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


    public function TotalBook()
    {
        $data = Book::all();

        $stokTotal = $data->sum('stok');

        return response()->json(['data' => $stokTotal], 200);
    }

    public function favorite(Request $request)
    {

        $book_id = $request->input('book_id');
        $user_id = $request->input('user_id');

        $favorite = favorite::where('book_id', $book_id)
            ->where('user_id', $user_id)
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['message' => 'buku di hapus dari favorit'], 200);
        } else {
            $favorite = new favorite();
            $favorite->book_id = $book_id;
            $favorite->user_id = $user_id;
            $favorite->save();

            return response()->json(['message' => 'buku di tambahkan ke favorit'], 200);
        }
    }

    public function showFavorite()
    {
        // Fetch data from the favorite_books_view
        $bookDetails = DB::select('SELECT * FROM favorite_books_view');

        // Create an array to store grouped books
        $groupedBooks = [];

        // Iterate through each book detail
        foreach ($bookDetails as $bookDetail) {
            $bookId = $bookDetail->book_id;

            // Check if the book is already in the groupedBooks array
            if (!array_key_exists($bookId, $groupedBooks)) {
                // If not, add the book to the groupedBooks array
                $groupedBooks[$bookId] = [
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
                    'categories' => [], // Initialize categories array
                    'totalRating' => 0,
                    'numRatings' => 0,
                ];
            }

            // Check if the category is not already in the categories array
            if (!in_array($bookDetail->name_category, $groupedBooks[$bookId]['categories'])) {
                // If not, add the category to the categories array
                $groupedBooks[$bookId]['categories'][] = $bookDetail->name_category;
            }

            // Add the rating to totalRating and increment numRatings
            $groupedBooks[$bookId]['totalRating'] += $bookDetail->rating;
            $groupedBooks[$bookId]['numRatings']++;
        }

        // Calculate the average rating for each book
        foreach ($groupedBooks as &$book) {
            $avgRating = $book['numRatings'] > 0 ? $book['totalRating'] / $book['numRatings'] : 0;
            $book['rating'] = $avgRating;
            unset($book['totalRating']); // Remove totalRating from the output
            unset($book['numRatings']); // Remove numRatings from the output
        }

        // Convert the groupedBooks array to numeric array
        $groupedBooks = array_values($groupedBooks);

        // Return the response as JSON
        return response()->json(['data' => $groupedBooks], 200);
    }


}
