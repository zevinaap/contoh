<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AuthController;

/*
| LANDING
*/
Route::get('/', function () {
    return view('landing');
});
/*
| LOGIN
*/
Route::get('/login', [AuthController::class, 'loginForm']);

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout']);
/*
| ADMIN
*/
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {

        if(session('role') != 'admin'){
            return redirect('/login');
        }

        return app(App\Http\Controllers\DashboardController::class)->index();

    });

    Route::resource('/kategori', App\Http\Controllers\KategoriController::class);

    Route::resource('/produk', App\Http\Controllers\ProdukController::class);

});


/*
| KASIR
*/
Route::prefix('kasir')->group(function () {

    Route::get('/transaksi', function () {

        if(session('role') != 'kasir'){
            return redirect('/login');
        }

        return app(App\Http\Controllers\TransaksiController::class)->index();

    });

    Route::post('/cart/add', [App\Http\Controllers\TransaksiController::class, 'addToCart']);

    Route::post('/cart/update', [App\Http\Controllers\TransaksiController::class, 'updateCart']);

    Route::post('/cart/delete', [App\Http\Controllers\TransaksiController::class, 'deleteCart']);

    Route::post('/checkout', [App\Http\Controllers\TransaksiController::class, 'checkout']);

});