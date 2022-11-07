<?php

use App\Http\Controllers\AlamatController;
use App\Http\Controllers\AntrianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MesinController;
use App\Http\Controllers\BiayaMesinController;
use App\Http\Controllers\HasilDesainController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KainController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\MotifController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\RajaOngkirController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\StatusMesinController;
use App\Http\Controllers\StatusTransaksiController;
use App\Http\Controllers\WarnaController;
use App\Http\Controllers\TeknikController;
use App\Http\Controllers\TransaksiController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['checkRole:super_admin,pengelola,pelanggan']);
Route::resource('mesin', MesinController::class)->middleware(['checkRole:super_admin']);
Route::resource('biaya_mesin', BiayaMesinController::class)->middleware(['checkRole:super_admin,pengelola']);
Route::resource('warna', WarnaController::class)->middleware(['checkRole:super_admin']);
Route::resource('teknik', TeknikController::class)->middleware(['checkRole:super_admin']);
Route::resource('kain', KainController::class)->middleware(['checkRole:super_admin']);
Route::resource('pengelola', PengelolaController::class)->middleware(['checkRole:super_admin,pengelola']);
Route::resource('pelanggan', PelangganController::class)->middleware(['checkRole:super_admin,pelanggan']);
Route::resource('proses', ProsesController::class)->middleware(['checkRole:super_admin']);
Route::resource('status_mesin', StatusMesinController::class)->middleware(['checkRole:super_admin,pengelola']);
Route::resource('validasi', ValidasiController::class)->middleware(['checkRole:super_admin,pengelola']);
Route::resource('antrian', AntrianController::class)->middleware(['checkRole:super_admin,pengelola']);
Route::resource('produksi', ProduksiController::class)->middleware(['checkRole:super_admin,pengelola']);
Route::resource('status_transaksi', StatusTransaksiController::class)->middleware(['checkRole:super_admin,pengelola']);

Route::resource('panduan', PanduanController::class)->middleware(['checkRole:pelanggan']);
Route::resource('motif', MotifController::class)->middleware(['checkRole:pelanggan']);
Route::resource('hasil_desain', HasilDesainController::class)->middleware(['checkRole:pelanggan']);
Route::resource('alamat', AlamatController::class)->middleware(['checkRole:pelanggan']);
Route::resource('keranjang', KeranjangController::class)->middleware(['checkRole:pelanggan']);
Route::resource('transaksi', TransaksiController::class)->middleware(['checkRole:pelanggan']);
Route::resource('review', ReviewController::class)->middleware(['checkRole:pelanggan']);

Route::get('get_prov', [RajaOngkirController::class, 'get_prov']);
Route::get('get_kab', [RajaOngkirController::class, 'get_kab']);
Route::get('get_kec', [RajaOngkirController::class, 'get_kec']);
Route::get('get_price', [RajaOngkirController::class, 'get_price']);
Route::get('get_lacak', [RajaOngkirController::class, 'get_lacak']);

Route::post('bayar_pesanan', [MidtransController::class, 'bayar_pesanan']);
Route::post('batal_pesanan', [MidtransController::class, 'batal_pesanan']);
Route::post('sudah_bayar', [MidtransController::class, 'sudah_bayar']);
