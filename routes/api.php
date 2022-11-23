<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\InvoicesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    //Auth controller
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

//Pelanggan controller
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::post('/tambah-pelanggan', [PelangganController::class, 'store']);
Route::get('/edit-pelanggan/{PelangganId}', [PelangganController::class, 'show']);
Route::put('/edit-pelanggan/{PelangganId}', [PelangganController::class, 'update']);
Route::delete('/delete-pelanggan/{PelangganId}', [PelangganController::class, 'destroy']);

//Kategori controller
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/tambah-kategori', [KategoriController::class, 'store']);
Route::get('/edit-kategori/{KategoriId}', [KategoriController::class, 'show']);
Route::put('/edit-kategori/{KategoriId}', [KategoriController::class, 'update']);
Route::delete('/delete-kategori/{KategoriId}', [KategoriController::class, 'destroy']);

//Produk controller
Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/tambah-produk', [ProdukController::class, 'store']);
Route::get('/edit-produk/{ProdukId}', [ProdukController::class, 'show']);
Route::put('/edit-produk/{ProdukId}', [ProdukController::class, 'update']);
Route::delete('/delete-produk/{ProdukId}', [ProdukController::class, 'destroy']);

//Merek controller
Route::get('/merek', [MerekController::class, 'index']);
Route::post('/tambah-merek', [MerekController::class, 'store']);
Route::get('/edit-merek/{MerekkId}', [MerekController::class, 'show']);
Route::put('/edit-merek/{MerekId}', [MerekController::class, 'update']);
Route::delete('/delete-merek/{MerekId}', [MerekController::class, 'destroy']);

//Quotation controller
Route::get('/quo-draft', [QuotationController::class, 'QuoDraft']);
Route::get('/data-quo', [QuotationController::class, 'QuoData']);
Route::post('/tambah-quo-draft', [QuotationController::class, 'DraftStore']);
Route::post('/tambah-quo-saved', [QuotationController::class, 'SavedStore']);
Route::get('/detail-quo/{QuoId}', [QuotationController::class, 'show']);
Route::put('/edit-quo/{QuoId}', [QuotationController::class, 'update']);
Route::put('/sent-quo/{QuoId}', [QuotationController::class, 'sent']);
Route::delete('/delete-quo/{QuoId}', [QuotationController::class, 'destroy']);

//Inovices controller
Route::get('/inv-draft', [InvoicesController::class, 'InvDraft']);
// Route::get('/data-quo', [QuotationController::class, 'QuoData']);
Route::post('/tambah-inv-draft', [InvoicesController::class, 'DraftStore']);
Route::post('/tambah-inv-saved', [InvoicesController::class, 'SavedStore']);
Route::get('/detail-inv/{InvId}', [InvoicesController::class, 'show']);
Route::put('/edit-inv/{InvId}', [InvoicesController::class, 'update']);
Route::put('/sent-inv/{InvId}', [InvoicesController::class, 'sent']);
Route::put('/payment-inv/{InvId}', [InvoicesController::class, 'payment']);
Route::delete('/delete-inv/{InvId}', [InvoicesController::class, 'destroy']);
