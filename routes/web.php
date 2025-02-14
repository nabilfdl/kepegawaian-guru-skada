<?php

use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\EditDataDiriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProvinceController;

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/ulang-tahun', [BirthdayController::class, 'birthday'])->name('ulang-tahun');
    
    Route::get('/edit_data_diri', [EditDataDiriController::class, 'index'])->name('edit_data_diri.index');
    Route::get('/edit_data_diri/{verification}', [EditDataDiriController::class, 'show'])->name('edit_data_diri.show');
    
    Route::post('/edit_data_diri/store_edit', [EditDataDiriController::class, 'store_edit'])->name('edit_data_diri.store_edit');
    
    Route::get('/Ganti-Password', function () {
        return view('Ganti-Password');
    })->name('ganti-password');

    Route::resource('/data_pegawai', UserController::class)->parameters([
        'data_pegawai' => 'user'
    ]);
    
    Route::get('/statistik_pegawai', [UserController::class, 'statistik'])->name('statistik_pegawai');
    Route::get('/verifikasi_data', function () {
        return view('verifikasi_data');
    })->name('verifikasi_data');
});


Route::get('/Beranda', function () {
    return view('Beranda');
});


Route::get('/location', [LocationController::class, 'getProvinces'])->name('location');
Route::post('/location', [LocationController::class, 'getCities'])->name('get.cities');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// New routes

Route::get('/ganti_posisi', function () {
    return view('ganti_posisi');
})->name('ganti_posisi');


Route::get('/view_data', function () {
    return view('view_data');
})->name('view_data');

require __DIR__.'/auth.php';
