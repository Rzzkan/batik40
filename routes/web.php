<?php

use App\Http\Controllers\AntrianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\BiayaMesinController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KainController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\StatusMesinController;
use App\Http\Controllers\WarnaController;
use App\Http\Controllers\TeknikController;
use App\Http\Controllers\ValidasiController;

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
    return view('customer.landing');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['checkRole:super_admin,pengelola']);
Route::resource('mesin', MesinController::class)->middleware(['checkRole:super_admin']);
Route::resource('biaya_mesin', BiayaMesinController::class)->middleware(['checkRole:super_admin,pengelola']);
Route::resource('warna', WarnaController::class)->middleware(['checkRole:super_admin']);
Route::resource('teknik', TeknikController::class)->middleware(['checkRole:super_admin']);
Route::resource('kain', KainController::class)->middleware(['checkRole:super_admin']);
Route::resource('pengelola', PengelolaController::class)->middleware(['checkRole:super_admin']);
Route::resource('pelanggan', PelangganController::class)->middleware(['checkRole:super_admin']);
Route::resource('proses', ProsesController::class)->middleware(['checkRole:super_admin']);
Route::resource('status_mesin', StatusMesinController::class)->middleware(['checkRole:super_admin,pengelola']);
Route::resource('validasi', ValidasiController::class)->middleware(['checkRole:super_admin,pengelola']);
Route::resource('antrian', AntrianController::class)->middleware(['checkRole:super_admin,pengelola']);
Route::resource('produksi', ProduksiController::class)->middleware(['checkRole:super_admin,pengelola']);
