<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TambahKerjasamaController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\JenisMitraController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LingkupKerjaController;
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
    return view('Dashboard');
});

Route::get('/Akun', function () {
    return view('Akun');
});

Route::get('/Mitra', function () {
    return view('Mitra');
});

Route::get('/InformasiMitra', function () {
    return view('InformasiMitra');
});



Route::get('/TambahKerja', [TambahKerjasamaController::class, 'create']);
Route::post('/tambah_kerjasama', [TambahKerjasamaController::class, 'store'])->name('berlin');

Route::get('/JenisMitra', [JenisMitraController::class, 'index']);
Route::post('/JenisMitra/tambah', [JenisMitraController::class, 'store']);
Route::delete('/JenisMitra/hapus/{jenismitra}', [JenisMitraController::class, 'delete']);

Route::get('/EditKerja', [TambahKerjasamaController::class, 'edit']);

Route::get('/Kerjasama', [TambahKerjasamaController::class, 'index']);

Route::get('/LingkupKerja', [LingkupKerjaController::class, 'index']);
Route::post('/LingkupKerja/tambah', [LingkupKerjaController::class, 'store']);
Route::delete('/LingkupKerja/hapus/{lingkupkerja}', [LingkupKerjaController::class, 'delete']);
