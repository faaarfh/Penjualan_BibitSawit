<?php

use App\Models\Pesanan;
use Illuminate\Support\Facades\Route;

Route::get('/landing', \App\Livewire\Landing::class)->name('landing');
Route::get('/', \App\Livewire\Index::class)->name('index')->middleware('auth');
Route::get('/profile', \App\Livewire\Profile::class)->name('profile')->middleware('auth');
Route::get('/users', \App\Livewire\Table\UserTable::class)->name('table.users')->middleware('auth');

Route::get('/bibit', \App\Livewire\Table\BibitTable::class)->name('table.bibit')->middleware('auth');
Route::get('/katalog-bibit', \App\Livewire\KatalogBibit::class)->name('katalog-bibit')->middleware('auth');

Route::get('/pesanan', \App\Livewire\Table\PesananTable::class)->name('table.pesanan')->middleware('auth');

Route::get('/laporan-penjualan', [\App\Http\Controllers\LaporanController::class, 'laporanPenjualan'])->name('laporan.penjualan')->middleware('auth');

Route::get('/laporan', \App\Livewire\Laporan::class)->name('laporan')->middleware('auth');

Route::get('/dashboard', \App\Livewire\Dashboard::class)->name('dashboard')->middleware('auth');

Route::get('/register', \App\Livewire\Register::class)->name('register');
Route::get('/login', \App\Livewire\Login::class)->name('login');
Route::get('/logout', App\Http\Controllers\LogoutController::class)->name('logout');

Route::get('/pesanan/{pesanan}/bukti', function (Pesanan $pesanan) {
    return view('pesanan.bukti', compact('pesanan'));
})->name('pesanan.bukti');
