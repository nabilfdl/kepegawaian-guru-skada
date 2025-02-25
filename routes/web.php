<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BirthdayController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\EditDataDiriController;
use App\Http\Controllers\UserEditVerificationController;

Route::post('/upload-cropped-image', [ImageUploadController::class, 'uploadCroppedImage'])->name('upload.cropped.image');
Route::post('/delete-image', [ImageUploadController::class, 'deleteImage'])->name('delete.image');

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
    
    Route::post('/verifikasi_data/{verification}', [UserEditVerificationController::class, 'store_denied'])->name('verifikasi_data.store_denied');
    Route::put('/verifikasi_data/{verification}', [UserEditVerificationController::class, 'store_accepted'])->name('verifikasi_data.store_accepted');
    Route::get('/verifikasi_data', [UserEditVerificationController::class, 'index'])->name('verifikasi_data');
    Route::get('/verifikasi_data/{verification}', [UserEditVerificationController::class, 'show'])->name('verifikasi_data.show');
});


Route::get('/Beranda', function () {
    return view('Beranda');
});


Route::get('/ganti-password', function () {
    return view('ganti_password'); 
})->name('ganti-password');


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
