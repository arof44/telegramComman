<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Auth\LoginController;
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
     return redirect('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard.home');
// });


Auth::routes();
Route::post('/daftar', [LoginController::class, 'daftarNasabah']);
Route::post('/masuk', [LoginController::class, 'loginNasabah']);
//dasboard
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
//pengguna
Route::get('/pengguna', [PenggunaController::class, 'index']);
Route::get('/pengguna_delete/{id}', [PenggunaController::class, 'delete']);
Route::post('/pengguna_insert', [PenggunaController::class, 'create']);
Route::post('/pengguna_update/{id}', [PenggunaController::class, 'update']);
//pemasok
Route::get('/pemasok', [PemasokController::class, 'index']);
Route::get('/pemasok_delete/{id}', [PemasokController::class, 'delete']);
Route::post('/pemasok_insert', [PemasokController::class, 'create']);
Route::post('/pemasok_update/{id}', [PemasokController::class, 'update']);
//pelanggan
Route::get('/pelanggan', [PelangganController::class, 'index']);
Route::get('/pelanggan_delete/{id}', [PelangganController::class, 'delete']);
Route::post('/pelanggan_insert', [PelangganController::class, 'create']);
Route::post('/pelanggan_update/{id}', [PelangganController::class, 'update']);
//kategori
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori_delete/{id}', [KategoriController::class, 'delete']);
Route::post('/kategori_insert', [KategoriController::class, 'create']);
Route::post('/kategori_update/{id}', [KategoriController::class, 'update']);
//barang
Route::get('/barang', [BarangController::class, 'index']);
Route::get('/barang_delete/{id}', [KategoriController::class, 'delete']);
Route::post('/barang_insert', [KategoriController::class, 'create']);
Route::post('/barang_update/{id}', [KategoriController::class, 'update']);
//transaksi
Route::get('/transaksi', [LaporanController::class, 'index']);
//laporan
Route::get('/laporan', [LaporanController::class, 'index']);
