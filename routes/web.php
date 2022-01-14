<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\RekapitulasiController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MenuAccessController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubMenuAccessController;
use App\Http\Controllers\SubMenuController;
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

## Group
Route::get('/group', [GroupController::class, 'index']);
Route::get('/group/search', [GroupController::class, 'search']);
Route::get('/group/create', [GroupController::class, 'create']);
Route::post('/group', [GroupController::class, 'store']);
Route::get('/group/edit/{group}', [GroupController::class, 'edit']);
Route::put('/group/edit/{group}', [GroupController::class, 'update']);
Route::get('/group/hapus/{group}',[GroupController::class, 'delete']);

## Menu Akses
Route::get('/menu_akses/{group}', [MenuAccessController::class, 'index']);
Route::get('/menu_akses/search/{group}', [MenuAccessController::class, 'search']);
Route::get('/menu_akses/create/{group}', [MenuAccessController::class, 'create']);
Route::post('/menu_akses/{group}', [MenuAccessController::class, 'store']);
Route::get('/menu_akses/edit/{group}/{menu_access}', [MenuAccessController::class, 'edit']);
Route::put('/menu_akses/edit/{group}/{menu_access}', [MenuAccessController::class, 'update']);
Route::get('/menu_akses/hapus/{group}/{menu_access}',[MenuAccessController::class, 'delete']);

## Menu
Route::get('/menu/', [MenuController::class, 'index']);
Route::get('/menu/search', [MenuController::class, 'search']);
Route::get('/menu/create', [MenuController::class, 'create']);
Route::post('/menu', [MenuController::class, 'store']);
Route::get('/menu/edit/{menu}', [MenuController::class, 'edit']);
Route::put('/menu/edit/{menu}', [MenuController::class, 'update']);
Route::get('/menu/hapus/{menu}',[MenuController::class, 'delete']);

## Sub Menu Akses
Route::get('/sub_menu_akses/{group}/{menu}', [SubMenuAccessController::class, 'index']);
Route::get('/sub_menu_akses/search/{group}/{menu}', [SubMenuAccessController::class, 'search']);
Route::get('/sub_menu_akses/create/{group}/{menu}', [SubMenuAccessController::class, 'create']);
Route::post('/sub_menu_akses/{group}/{menu}', [SubMenuAccessController::class, 'store']);
Route::get('/sub_menu_akses/edit/{group}/{menu}/{sub_menu_access}', [SubMenuAccessController::class, 'edit']);
Route::put('/sub_menu_akses/edit/{group}/{menu}/{sub_menu_access}', [SubMenuAccessController::class, 'update']);
Route::get('/sub_menu_akses/hapus/{group}/{menu}/{sub_menu_access}',[SubMenuAccessController::class, 'delete']);

## Sub Menu
Route::get('/submenu/{id}', [SubMenuController::class, 'index']);
Route::get('/submenu/search/{id}', [SubMenuController::class, 'search']);
Route::get('/submenu/create/{id}', [SubMenuController::class, 'create']);
Route::post('/submenu/{id}', [SubMenuController::class, 'store']);
Route::get('/submenu/edit/{id}/{submenu}', [SubMenuController::class, 'edit']);
Route::put('/submenu/edit/{id}/{submenu}', [SubMenuController::class, 'update']);
Route::get('/submenu/hapus/{id}/{submenu}',[SubMenuController::class, 'delete']);

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
