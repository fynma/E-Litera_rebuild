<?php

use App\Http\Controllers\Auth\AuthController;
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

    Route::middleware(['guest'])->group(function () {
        Route::get('/Login', function () {
            return view('Login');
        });

        Route::post('/postlogin', [AuthController::class, 'login'])->name('login.store');

        Route::get('/register', function(){
            return view('Daftar');
        });

        Route::post ('register', [AuthController::class, 'register'])->name('register');
    });
    Route::group(['middleware' => ['roleCheck:petugas']], function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard.index');
        });

    });
    Route::group(['middleware' => ['roleCheck:administrator']], function () {
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard.index');
        });

    });
    Route::group(['middleware' => ['roleCheck:user']], function () {
        Route::get('/user', function () {
            return view('user.index');
        });

    });
    Route::get('/', function () {
        return view('index');
    });
});