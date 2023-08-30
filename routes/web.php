<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/barang', [BarangController::class, 'index'])->name('barang');
Route::post('/barang/save', [BarangController::class, 'save'])->name('savebarang');
Route::put('/barang/update', [BarangController::class, 'update'])->name('updatebarang');
Route::delete('/barang/delete', [BarangController::class, 'delete'])->name('deletebarang');

Route::get('/pasien', [PasienController::class, 'index'])->name('pasien');
Route::post('/pasien/save', [PasienController::class, 'save'])->name('savepasien');
Route::put('/pasien/update', [PasienController::class, 'update'])->name('updatepasien');
Route::delete('/pasien/delete', [PasienController::class, 'delete'])->name('deletepasien');

Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/transaksi/faktur/{id}', [TransaksiController::class, 'fakturtransaksi'])->name('fakturtransaksi');
Route::get('/transaksi/add', [TransaksiController::class, 'addTransaksi'])->name('addtransaksi');
Route::post('/transaksi/save', [TransaksiController::class, 'save'])->name('savetransaksi');
Route::put('/transaksi/update', [TransaksiController::class, 'update'])->name('updatetransaksi');
Route::delete('/transaksi/delete', [TransaksiController::class, 'delete'])->name('deletetransaksi');
Route::post('/transaksi/detail-show', [TransaksiController::class, 'detailShow'])->name('detailshow');
Route::post('/transaksi/detail-save', [TransaksiController::class, 'detailSave'])->name('detailsave');
Route::post('/transaksi/detail-delete', [TransaksiController::class, 'detailDelete'])->name('detaildelete');
Route::post('/transaksi/detail-count', [TransaksiController::class, 'detailCount'])->name('detailCount');
Route::get('/transaksi/detail-barang/{id}', [TransaksiController::class, 'detailBarang'])->name('detailbarang');