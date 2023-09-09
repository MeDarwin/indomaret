<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\StokController;
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
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/auth/login',[AuthController::class,'login']);
Route::get('/auth/logout',[AuthController::class,'logout']);

Route::prefix('/dashboard')->middleware(['auth'])->group(
    function () {
        // Perusahaan
        Route::get('/perusahaan', [PerusahaanController::class, 'index']);
        Route::get('/perusahaan/edit', [PerusahaanController::class, 'edit']);

        Route::post('/perusahaan/update', [PerusahaanController::class, 'update']);
        // Cabang
        Route::get('/cabang', [CabangController::class, 'index']);
        Route::get('/cabang/insert', [CabangController::class, 'insert']);
        Route::get('/cabang/detail/{id}', [CabangController::class, 'detail']);
        Route::get('/cabang/edit/{id}', [CabangController::class, 'edit']);

        Route::post('/cabang/add', [CabangController::class, 'add']);
        Route::delete('/cabang/delete/{id}', [CabangController::class, 'delete']);
        // Barang
        Route::get('/barang', [BarangController::class, 'index']);
        Route::get('/barang/edit/{id}', [BarangController::class, 'edit']);
        Route::get('/barang/insert', [BarangController::class, 'insert']);

        Route::post('/barang/add', [BarangController::class, 'add']);
        Route::delete('/barang/delete/{id}', [BarangController::class, 'delete']);
        // Stok
        Route::post('/stok/add/to/{id}/barang/{id_barang}', [StokController::class, 'add']);
        Route::delete('/stok/delete/from/{id}/barang/{id_barang}', [StokController::class, 'destroy']);
    }
);