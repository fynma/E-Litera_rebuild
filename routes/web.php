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
        Route::get('/admin/home', function () {
            return view('admin.index');
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

    });



    Route::group(['middleware' => ['roleCheck:user']], function () {
        Route::get('/user/homepage', function () {
            return view('user.index');
        });

    });


    Route::group(['middleware' => ['roleCheck:user']], function () {
        Route::get('/user/homepage', function () {
            return view('user.index');
        });

        Route::get('/user/profile', function () {
            return view('user.profile');
        });
    });

    Route::get('/', function () {
        return view('index');
    });
});


