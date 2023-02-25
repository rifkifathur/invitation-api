<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CustomerWebController;
use App\Http\Controllers\BankWebController;
use App\Http\Controllers\ThemeWebController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::prefix('admin')->group(function(){
    Auth::routes();

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    
    Route::get('/customer', [CustomerWebController::class, 'index'])->name('customer');
    Route::get('/customer/add-customer', [CustomerWebController::class, 'create'])->name('create-customer');
    Route::post('/customer', [CustomerWebController::class, 'store'])->name('store-customer');
    Route::get('/customer/edit-customer/{customerId}', [CustomerWebController::class, 'edit'])->name('edit-customer');
    Route::put('/customer/{customerId}', [CustomerWebController::class, 'update'])->name('update-customer');
    Route::delete('/customer/{customerId}', [CustomerWebController::class, 'destroy'])->name('destroy-customer');

    Route::post('/customer/story', [CustomerWebController::class, 'deleteStory'])->name('delete-story');

    //bank master
    Route::get('/bank', [BankWebController::class, 'index'])->name('bank');
    Route::get('/bank/add-bank', [BankWebController::class, 'create'])->name('create-bank');
    Route::post('/bank', [BankWebController::class, 'store'])->name('store-bank');
    Route::get('/bank/edit-bank/{bankId}', [BankWebController::class, 'edit'])->name('edit-bank');
    Route::put('/bank/{bankId}', [BankWebController::class, 'update'])->name('update-bank');
    Route::delete('/bank/{bankId}', [BankWebController::class, 'destroy'])->name('destroy-bank');
    
    //theme master
    Route::get('/theme', [ThemeWebController::class, 'index'])->name('theme');
    Route::get('/theme/add-theme', [ThemeWebController::class, 'create'])->name('create-theme');
    Route::post('/theme', [ThemeWebController::class, 'store'])->name('store-theme');
    Route::get('/theme/edit-theme/{themeId}', [ThemeWebController::class, 'edit'])->name('edit-theme');
    Route::put('/theme/{themeId}', [ThemeWebController::class, 'update'])->name('update-theme');
    Route::delete('/theme/{themeId}', [ThemeWebController::class, 'destroy'])->name('destroy-theme');
    
});

