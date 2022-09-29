<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TambahKerjasamaController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\JenisMitraController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LingkupKerjaController;
use App\Http\Controllers\MitraController;
use App\Models\TambahKerjasama;

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

// <-- BAGIAN ADMIN -->
Route::get('AdminDashboard', function () {
    return view('AdminDashboard');
});

Route::post('/edit_akun', [AkunController::class, 'store'])->name('inputdataakun');

// <-- BAGIAN TEST -->
Route::get('/AkunTampil', [AkunController::class, 'test']); //untuk testing
Route::get('/Akun', [AkunController::class, 'test2']);


Route::get('Kerjasama', [TambahKerjasamaController::class, 'index']);
Route::get('Kerjasama/edit/{id}', [TambahKerjasamaController::class, 'edit'])->name('edit_kerjasama');
Route::delete('Kerjasama/{id}', [TambahKerjasamaController::class, 'delete'])->name('hapus_kerjasama');
Route::get('TambahKerja', [TambahKerjasamaController::class, 'create']);
Route::post('Tambahkerja', [TambahKerjasamaController::class, 'store'])->name('tambah_kerjasama');

Route::get('JenisMitra', [JenisMitraController::class, 'index']);
Route::post('JenisMitra', [JenisMitraController::class, 'store'])->name('tambah_mitra');
Route::delete('JenisMitra/{id}', [JenisMitraController::class, 'delete'])->name('hapus_mitra');
// Route::post('/JenisMitra/{id}/edit', [JenisMitraController::class, 'edit']);
// Route::match(['put','patch'], '/JenisMitra/{id}/edit', [JenisMitraController::class, 'update']);

Route::get('LingkupKerja', [LingkupKerjaController::class, 'index']);
Route::post('LingkupKerja', [LingkupKerjaController::class, 'store'])->name('tambah_lingkup');
Route::delete('LingkupKerja/{id}', [LingkupKerjaController::class, 'delete'])->name('hapus_lingkup');

Route::get('InformasiMitra', function () {
    return view('InformasiMitra');
});


Route::get('Mitra', [MitraController::class, 'index']);
Route::get('AdminViewMitra', [MitraController::class, 'show']);

Route::get('AdminShowUser', function () {
    return view('AdminShowUser');
});


// <-- BAGIAN USER -->
Route::get('AdminUserMenu', function () {
    return view('AdminUserMenu');
});

Route::get('UserDashboard', function () {
    return view('UserDashboard');
});

Route::get('UserAkun', function () {
    return view('UserAkun');
});

Route::get('UserInfo', function () {
    return view('UserInformation');
});

Route::get('template', function () {
    return view('template');
});

Route::get('D3', function () {
    return view('D3');
});
