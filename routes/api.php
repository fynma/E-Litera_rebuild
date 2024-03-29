<?php

use App\Http\Controllers\Auth\GoogleAuthController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\transactionController;
use App\Http\Controllers\borrowController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\dendaController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\notifController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BayarController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post ('refresh', [AuthController::class, 'refresh']);
    Route::post ('me', [AuthController::class, 'me']);
    Route::post ('register', [AuthController::class, 'register']);
}); 
    Route::post ('login-mobile', [AuthController::class, 'loginMob']);
    Route::post ('profile-edit', [ProfileController::class, 'editProfile']);
    Route::post ('forgot-password', [ResetController::class, 'resetPassword']);
    Route::post ('reset-password', [ResetController::class, 'updatepassword']);
    Route::post ('newCategory', [CategoryController::class, 'newCategory']);
    Route::post ('deleteCategory', [CategoryController::class, 'deleteCategory']);
    Route::post ('newBook', [BookController::class, 'makeBook']);
    Route::post ('editBook', [BookController::class, 'updateBook']);
    Route::post ('deleteBook', [BookController::class, 'deleteBook']);
    Route::post ('uploadComment', [CommentController::class, 'uploadComment']);
    Route::post ('deleteComment', [CommentController::class, 'deleteComment']); 
    Route::post ('rating', [RatingController::class, 'newRating']);
    Route::post ('borrow', [borrowController::class, 'borrowBook']);
    Route::post ('confirmBorrow', [borrowController::class, 'confirmBorrow']);
    Route::post ('returnBorrow', [borrowController::class, 'returnBorrow']);
    Route::post ('returnBorrowAfterPayment', [borrowController::class, 'returnBorrowAfterPayment']);
    Route::post ('cancelBorrow', [borrowController::class, 'cancelBorrow']);
    Route::post ('denda', [dendaController::class, 'newDenda']);
    Route::post ('bookDetail', [BookController::class, 'Bookdetail']);
    Route::post ('deleteUser', [ProfileController::class, 'deleteUser']);
    Route::post ('transaction', [transactionController::class, 'transaction_midtrans']);
    Route::post ('contact-admin', [contactController::class, 'sendReport']);
    Route::post ('favorite', [BookController::class, 'favorite']);
    Route::post ('sendNotif', [notifController::class, 'notification']);
    Route::post  ('bayarDenda', [BayarController::class, 'bayarDenda']);
    Route::post  ('bayarSukses', [BayarController::class, 'success']);
    // Route::post  ('showcomment', [CommentController::class, 'getComment']);

    Route::get  ('notifadmin', [notifController::class, 'showNotifAdmin']);
    Route::get  ('notifuser', [notifController::class, 'showNotifUser']);
    Route::get  ('HistoryBorrow', [borrowController::class, 'showHistory']);
    Route::get  ('showFavorite', [BookController::class, 'showFavorite']);
    Route::get  ('borrowList', [borrowController::class, 'showBorrow']);
    Route::get  ('returnList', [borrowController::class, 'showReturn']);
    Route::get  ('listDendaUser', [borrowController::class, 'showTelat']);
    Route::get  ('comment', [CommentController::class, 'getComment']);
    Route::get  ('categoryList', [CategoryController::class, 'displayCategory']);
    Route::get  ('bookCover', [BookController::class, 'BookCoverView']);
    Route::get  ('reset-password', [ResetController::class, 'passwordLoad']);
    Route::get  ('profile', [ProfileController::class, 'Profile']);
    Route::get  ('ListUser', [ProfileController::class, 'ListUser']);
    Route::get  ('total-user', [ProfileController::class, 'totalUser']);
    Route::get  ('total-pinjam', [borrowController::class, 'totalBorrow']);
    Route::get  ('ambil-user', [UserController::class, 'ambilUser']);
    Route::get  ('ambil-username', [UserController::class, 'getUsername']);
    Route::get  ('detail-user/{user_id}', [UserController::class, 'userSatuan']);
    Route::get  ('detail-buku/{book_id}', [BookController::class, 'BookopenID']);
    Route::get  ('detail-pinjam/{user_id}', [borrowController::class, 'showHistoryById']);
    Route::get  ('list_denda', [borrowController::class, 'listdenda']);
    Route::get  ('list_dendaAdmin', [borrowController::class, 'listdendaAdmin']);
    Route::get  ('listPinjam', [borrowController::class, 'listPinjam']);
    Route::get  ('listPermintaanPinjam', [borrowController::class, 'listPermintaanPinjam']);
    Route::get  ('showcomment', [CommentController::class, 'getComment']);
    Route::get  ('tampilkanNotif', [notifController::class, 'tampilkanNotif']);
    Route::get  ('dendaSatuan/{borrow_id}', [borrowController::class, 'dendaSatuan']);
    Route::get  ('reset-password', [ResetController::class, 'passwordLoad']);
    Route::get  ('showRating', [RatingController::class, 'averageRating']);
    Route::get  ('showStok', [BookController::class, 'TotalBook']);
    Route::get  ('group_monthly', [borrowController::class, 'groupByMonth']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
