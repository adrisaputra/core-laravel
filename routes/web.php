<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RekapitulasiController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\UserController;

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

Route::get('/buat_storage', function () {
    Artisan::call('storage:link');
    dd("Storage Berhasil Di Buat");
});

Route::get('/clear-cache-all', function() {
    Artisan::call('cache:clear');
    dd("Cache Clear All");
});

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/login_w', [LoginController::class, 'authenticate']);
Route::post('/logout-sistem', [LoginController::class, 'logout']);

Route::get('/dashboard', [HomeController::class, 'index']);

## Pegawai
Route::get('/pegawai', [PegawaiController::class, 'index']);
Route::get('/pegawai/search', [PegawaiController::class, 'search']);
Route::get('/pegawai/create', [PegawaiController::class, 'create']);
Route::post('/pegawai', [PegawaiController::class, 'store']);
Route::get('/pegawai/edit/{pegawai}', [PegawaiController::class, 'edit']);
Route::put('/pegawai/edit/{pegawai}', [PegawaiController::class, 'update']);
Route::get('/pegawai/hapus/{pegawai}',[PegawaiController::class, 'delete']);

## Rekapitulasi
Route::get('/rekapitulasi_jumlah_pegawai', [RekapitulasiController::class, 'rekapitulasi_jumlah_pegawai']);

## User
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/search', [UserController::class, 'search']);
Route::get('/user/create', [UserController::class, 'create']);
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/edit/{user}', [UserController::class, 'edit']);
Route::put('/user/edit/{user}', [UserController::class, 'update']);
Route::get('/user/edit_profil/{user}', [UserController::class, 'edit_profil']);
Route::put('/user/edit_profil/{user}', [UserController::class, 'update_profil']);
Route::get('/user/hapus/{user}',[UserController::class, 'delete']);

## Log Activity
Route::get('/log', [LogController::class, 'index']);
Route::get('/log/search', [LogController::class, 'search']);

## Pengaturan
Route::get('/pengaturan', [PengaturanController::class, 'index']);
Route::put('/pengaturan/edit/{pengaturan}', [PengaturanController::class, 'update']);
