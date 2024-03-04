<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['web'])->group(function () {
    Route::post('/hapussession', [ProfileController::class, 'hapussession'])->name('hapussession');

    Route::get  ('profile', [ProfileController::class, 'profileweb']);


    Route::middleware(['guest'])->group(function () {
        Route::get('/Login', function () {
            return view('Login');
        });

        Route::get  ('/auth/google', [GoogleAuthController::class, 'redirectGoogle']);
        Route::get  ('google/callback', [GoogleAuthController::class, 'GoogleCallback']);

        Route::post('/postlogin', [AuthController::class, 'login'])->name('login.store');

        Route::get('/register', function () {
            return view('Daftar');
        });

        Route::post('register', [AuthController::class, 'register'])->name('register');
    });
    Route::group(['middleware' => ['roleCheck:petugas']], function () {

        Route::get('/petugas/dashboard', function () {
            return view('petugas.index');
        });

        Route::get('totalUser', [ProfileController::class, 'totalUser']);

        Route::get('/petugas/Kategori', function () {
            return view('petugas.Kategori');
        });

        Route::get('/petugas/Tambah-Buku', function () {
            return view('petugas.Tambah-Buku');
        });
        Route::get('/petugas/Data-Buku', function () {
            return view('petugas.Data-Buku');
        });
        Route::get('/petugas/Data-Pengguna', function () {
            return view('petugas.Data-Pengguna');
        });
        Route::get('/petugas/Data-Peminjaman', function () {
            return view('petugas.Data-Peminjaman');
        });
        Route::get('/petugas/Pengembalian', function () {
            return view('petugas.Pengembalian');
        });
        Route::get('/petugas/Denda', function () {
            return view('petugas.DendaAdmin');
        });
        Route::get('/petugas/Komentar', function () {
            return view('petugas.Komentar');
        });
    });
    Route::group(['middleware' => ['roleCheck:administrator']], function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.index');
        });
        Route::get('totalUser', [ProfileController::class, 'totalUser']);

        Route::get('/admin/Kategori', function () {
            return view('admin.Kategori');
        });

        Route::get('/admin/Tambah-Buku', function () {
            return view('admin.Tambah-Buku');
        });
        Route::get('/admin/Data-Buku', function () {
            return view('admin.Data-Buku');
        });
        Route::get('/admin/Data-Pengguna', function () {
            return view('admin.Data-Pengguna');
        });
        Route::get('/admin/Data-Peminjaman', function () {
            return view('admin.Data-Peminjaman');
        });
        Route::get('/admin/Pengembalian', function () {
            return view('admin.Pengembalian');
        });
        Route::get('/admin/Denda', function () {
            return view('admin.DendaAdmin');
        });
        Route::get('/admin/Komentar', function () {
            return view('admin.Komentar');
        });

    });




    Route::group(['middleware' => ['roleCheck:user']], function () {
        Route::get('/user/homepage', function () {
            return view('user.index');
        });

        Route::get('/user/Profile', function () {
            return view('user.Profile');
        });

        Route::get('/user/Denda', function () {
            return view('user.Denda');
        });
        Route::get('/user/Book/{book_id}', function () {
            return view('user.Books-Page');
        });
        Route::get('/user/Kontak', function () {
            return view('user.Kontak');
        });
        Route::get('/user/Favorit', function () {
            return view('user.Favorit');
        });
        Route::get('/user/Riwayat', function () {
            return view('user.Riwayat');
        });
        Route::get('/user/Tentang', function () {
            return view('user.Tentang');
        });
        Route::get('/user/Notifikasi', function () {
            return view('user.Notifikasi');
        });
        Route::get('/user/category/{name_category}', function () {
            return view('user.category');
        });
        Route::get('/user/search/{keyword}', function ($keyword) {
            return view('user.search', ['keyword' => $keyword]);
        });
    });

    Route::get('/', function () {
        return view('index');
    });
});

