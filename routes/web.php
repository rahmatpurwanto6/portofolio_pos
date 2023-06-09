<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/kategori', App\Http\Controllers\KategoriController::class);
Route::get('api/kategori', [App\Http\Controllers\KategoriController::class, 'api']);

Route::resource('/pengeluaran', App\Http\Controllers\PengeluaranController::class);
Route::get('api/pengeluaran', [App\Http\Controllers\PengeluaranController::class, 'api']);

Route::resource('/supplier', App\Http\Controllers\SupplierController::class);
Route::get('api/supplier', [App\Http\Controllers\SupplierController::class, 'api']);

Route::resource('/produk', App\Http\Controllers\ProdukController::class);
Route::get('api/produk', [App\Http\Controllers\ProdukController::class, 'api']);
Route::post('produk/select_delete', [App\Http\Controllers\ProdukController::class, 'select_delete'])->name('produk.select_delete');

Route::resource('/member', App\Http\Controllers\MemberController::class);
Route::get('api/member', [App\Http\Controllers\MemberController::class, 'api']);

Route::get('pembelian/data', [App\Http\Controllers\PembelianController::class, 'data'])->name('pembelian.data');
Route::get('pembelian/{id}/create', [App\Http\Controllers\PembelianController::class, 'create'])->name('pembelian.create');
Route::resource('/pembelian', App\Http\Controllers\PembelianController::class)->except('create');

Route::get('/pembelian_detail/{id}/data', [App\Http\Controllers\PembelianDetailController::class, 'data'])->name('pembelian_detail.data');
Route::get('/pembelian_detail/loadform/{diskon}/{total}', [App\Http\Controllers\PembelianDetailController::class, 'loadForm'])->name('pembelian_detail.load_form');
Route::resource('/pembelian_detail', App\Http\Controllers\PembelianDetailController::class)->except('create', 'show', 'edit');

Route::get('/penjualan/data', [App\Http\Controllers\PenjualanController::class, 'data'])->name('penjualan.data');
Route::get('/penjualan', [App\Http\Controllers\PenjualanController::class, 'index'])->name('penjualan.index');
Route::get('/penjualan/{id}', [App\Http\Controllers\PenjualanController::class, 'show'])->name('penjualan.show');
Route::delete('/penjualan/{id}', [App\Http\Controllers\PenjualanController::class, 'destroy'])->name('penjualan.destroy');


Route::get('/laporan', [App\Http\Controllers\LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/data/{awal}/{akhir}', [App\Http\Controllers\LaporanController::class, 'data'])->name('laporan.data');
Route::get('/laporan/pdf/{awal}/{akhir}', [App\Http\Controllers\LaporanController::class, 'exportPDF'])->name('laporan.export_pdf');


Route::get('/transaksi/baru', [App\Http\Controllers\PenjualanController::class, 'create'])->name('transaksi.baru');
Route::post('/transaksi/simpan', [App\Http\Controllers\PenjualanController::class, 'store'])->name('transaksi.simpan');
Route::get('/transaksi/selesai', [App\Http\Controllers\PenjualanController::class, 'selesai'])->name('transaksi.selesai');
Route::get('/transaksi/nota-kecil', [App\Http\Controllers\PenjualanController::class, 'notaKecil'])->name('transaksi.nota_kecil');

Route::resource('/transaksi', App\Http\Controllers\PenjualanDetailController::class)->except('show');
Route::get('/transaksi/{id}/data', [App\Http\Controllers\PenjualanDetailController::class, 'data'])->name('transaksi.data');
Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [App\Http\Controllers\PenjualanDetailController::class, 'loadForm'])->name('transaksi.load_form');


Route::get('/kasir', [App\Http\Controllers\KasirController::class, 'index'])->name('kasir');

Route::get('/transaksi/baru', [App\Http\Controllers\PenjualanController::class, 'create'])->name('transaksi.baru');
Route::post('/transaksi/simpan', [App\Http\Controllers\PenjualanController::class, 'store'])->name('transaksi.simpan');
Route::get('/transaksi/selesai', [App\Http\Controllers\PenjualanController::class, 'selesai'])->name('transaksi.selesai');
Route::get('/transaksi/nota-kecil', [App\Http\Controllers\PenjualanController::class, 'notaKecil'])->name('transaksi.nota_kecil');

Route::resource('/transaksi', App\Http\Controllers\PenjualanDetailController::class)->except('show');
Route::get('/transaksi/{id}/data', [App\Http\Controllers\PenjualanDetailController::class, 'data'])->name('transaksi.data');
Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [App\Http\Controllers\PenjualanDetailController::class, 'loadForm'])->name('transaksi.load_form');
