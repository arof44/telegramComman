<?php

use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SatuanController;
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
     return view('open');
});

// Route::get('/', function () {
//      return redirect('welcome');
// });

Route::get('/testbot', function () {
     return view('welcome');
});

Route::get('/welcome', [WelcomeController::class, 'index']);


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
Route::get('/barang_delete/{id}', [BarangController::class, 'delete']);
Route::post('/barang_insert', [BarangController::class, 'create']);
Route::post('/barang_update/{id}', [BarangController::class, 'update']);
//satuan
Route::post('/satuan_insert', [SatuanController::class, 'create']);

//transaksi
Route::get('/transaksi', [TransaksiController::class, 'index']);
Route::post('/add_trs_by_type', [TransaksiController::class, 'tangkapType']);

Route::get('/add_transaksi_masuk/{banyak}', [TransaksiController::class, 'createMasuk']);
Route::get('/add_transaksi_keluar/{banyak}', [TransaksiController::class, 'createKeluar']);

Route::get('/update_transaksi_masuk/{id}', [TransaksiController::class, 'updateMasuk']);
Route::get('/update_transaksi_keluar/{id}', [TransaksiController::class, 'updateKeluar']);

Route::post('/post_create_masuk', [TransaksiController::class, 'createTranskasiMasuk']);
Route::post('/update_create_masuk/{id}', [TransaksiController::class, 'updateTranskasiMasuk']);

Route::post('/post_create_keluar', [TransaksiController::class, 'createBarangKeluar']);
Route::post('/update_create_keluar/{id}', [TransaksiController::class, 'updateTranskasiKeluar']);

//laporan
Route::get('/laporan', [TransaksiController::class, 'report']);
Route::post('/laporan_report/{type}', [TransaksiController::class, 'getReport']);

//botman
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);
