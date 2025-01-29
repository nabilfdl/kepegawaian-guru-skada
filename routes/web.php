<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProvinceController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/location', [LocationController::class, 'getProvinces'])->name('location');
Route::post('/location', [LocationController::class, 'getCities'])->name('get.cities');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// New routes
Route::get('/data_guru', function () {
    return view('data_guru');
})->name('data_guru');

Route::get('/statistik_guru', function () {
    return view('statistik_guru');
})->name('statistik_guru');

Route::get('/ganti_posisi', function () {
    return view('ganti_posisi');
})->name('ganti_posisi');

Route::get('/verifikasi_data', function () {
    return view('verifikasi_data');
})->name('verifikasi_data');

Route::get('/tambah_akun', function () {
    return view('tambah_akun');
})->name('tambah_akun');


require __DIR__.'/auth.php';
