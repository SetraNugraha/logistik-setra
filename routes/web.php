<?php

use App\Models\Barang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BrgMasukController;
use App\Http\Controllers\BrgKeluarController;

// Gudang
Route::get("/", [BarangController::class, 'index'])->name("gudang");
Route::get("/barang/{kode_brg}", [BarangController::class, 'getBarangByKodeBrg']);

// Barang Masuk
Route::get("/brg-masuk", [BrgMasukController::class, 'index'])->name('brg-masuk-index');
Route::get("/brg-masuk/create", [BrgMasukController::class, 'create'])->name("brg-masuk-create");
Route::post('/brg-masuk/store', [BrgMasukController::class, 'store'])->name("brg-masuk-store");

// Barang Keluar
Route::get("/brg-keluar", [BrgKeluarController::class, "index"])->name("brg-keluar-index");
Route::get("/brg-keluar/create", [BrgKeluarController::class, 'create'])->name("brg-keluar-create");
Route::post('/brg-keluar/store', [BrgKeluarController::class, 'store'])->name("brg-keluar-store");
