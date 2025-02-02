<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProvinceController;

Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');
Route::get('/Beranda', function () {
    return view('Beranda');
});
Route::get('/Ganti-Data', function () {
    return view('Ganti-Data');
});
Route::get('/UlangTahun', function () {
    return view('Ulang-Tahun');
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
Route::resource('/data_guru', UserController::class);

Route::get('/statistik_guru', [UserController::class, 'statistik'])->name('statistik_guru');

Route::get('/ganti_posisi', function () {
    return view('ganti_posisi');
})->name('ganti_posisi');

Route::get('/verifikasi_data', function () {
    return view('verifikasi_data');
})->name('verifikasi_data');

require __DIR__.'/auth.php';
