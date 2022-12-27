<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\PublicApiController;
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

// Client front controller
Route::group(['middleware' => 'api-key'], function(){
    Route::get('/client/customer', [PublicApiController::class, 'index']);
    Route::get('/client/customer/mypath', [PublicApiController::class, 'show']);
    Route::post('/client/customer/wishes', [PublicApiController::class, 'store']);
    Route::get('/client/customer/wishes', [PublicApiController::class, 'showWishbyCus']);
}); 


//Customer controller
Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/add-customer', [CustomerController::class, 'store']);
Route::get('/edit-customer/{CustomerId}', [CustomerController::class, 'show']);
Route::put('/edit-customer/{CustomerId}', [CustomerController::class, 'update']);
Route::delete('/delete-customer/{CustomerId}', [CustomerController::class, 'destroy']);

//Theme controller
Route::get('/theme', [ThemeController::class, 'index']);
Route::post('/add-theme', [ThemeController::class, 'store']);
Route::get('/show-theme/{ThemeId}', [ThemeController::class, 'show']);
Route::put('/edit-theme/{ThemeId}', [ThemeController::class, 'update']);
Route::delete('/delete-theme/{ThemeId}', [ThemeController::class, 'destroy']);

