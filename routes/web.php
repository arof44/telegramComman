<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard.home');
// });


Auth::routes();
Route::post('/daftar', [LoginController::class, 'daftarNasabah']);
Route::post('/masuk', [LoginController::class, 'loginNasabah']);
//dasboard
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
