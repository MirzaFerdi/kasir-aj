<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DetailTransaksiController;
use App\Http\Controllers\ProdukThumbnailController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::middleware('auth:api', 'role:owner')->group(function () {
    Route::get('/produk', [ProdukController::class, 'index']);
    Route::post('/produk', [ProdukController::class, 'store']);
    Route::get('/produk/{produk}', [ProdukController::class, 'show']);
    Route::put('/produk/{produk}', [ProdukController::class, 'update']);
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy']);
    Route::get('/transaksi', [TransaksiController::class, 'index']);
    Route::post('/transaksi', [TransaksiController::class, 'store']);
    Route::get('/transaksi/{transaksi}', [TransaksiController::class, 'show']);
    Route::put('/transaksi/{transaksi}', [TransaksiController::class, 'update']);
    Route::delete('/transaksi/{transaksi}', [TransaksiController::class, 'destroy']);
    Route::get('/detail-transaksi', [DetailTransaksiController::class, 'index']);
    Route::post('/detail-transaksi', [DetailTransaksiController::class, 'store']);
    Route::get('/detail-transaksi/{detailTransaksi}', [DetailTransaksiController::class, 'show']);
    Route::put('/detail-transaksi/{detailTransaksi}', [DetailTransaksiController::class, 'update']);
    Route::delete('/detail-transaksi/{detailTransaksi}', [DetailTransaksiController::class, 'destroy']);
    Route::get('/produk-thumbnail', [ProdukThumbnailController::class, 'index']);
    Route::post('/produk-thumbnail', [ProdukThumbnailController::class, 'store']);
    Route::get('/produk-thumbnail/{produkThumbnail}', [ProdukThumbnailController::class, 'show']);
    Route::put('/produk-thumbnail/{produkThumbnail}', [ProdukThumbnailController::class, 'update']);
    Route::delete('/produk-thumbnail/{produkThumbnail}', [ProdukThumbnailController::class, 'destroy']);
    Route::get('/role', [RoleController::class, 'index']);
    Route::post('/role', [RoleController::class, 'store']);
    Route::get('/role/{role}', [RoleController::class, 'show']);
    Route::put('/role/{role}', [RoleController::class, 'update']);
    Route::delete('/role/{role}', [RoleController::class, 'destroy']);
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user', [UserController::class, 'store']);
    Route::get('/user/{user}', [UserController::class, 'show']);
    Route::put('/user/{user}', [UserController::class, 'update']);
    Route::delete('/user/{user}', [UserController::class, 'destroy']);
    Route::get('/user/{user}/transaksi', [UserController::class, 'transaksi']);
    Route::get('/user/{user}/detail-transaksi', [UserController::class, 'detailTransaksi']);
    Route::get('/user/{user}/role', [UserController::class, 'role']);
    Route::get('/produk/{produk}/thumbnail', [ProdukController::class, 'thumbnail']);
    Route::get('/produk/{produk}/detail-transaksi', [ProdukController::class, 'detailTransaksi']);
    Route::get('/transaksi/{transaksi}/detail-transaksi', [TransaksiController::class, 'detailTransaksi']);
    Route::get('/detail-transaksi/{detailTransaksi}/produk', [DetailTransaksiController::class, 'produk']);
});
