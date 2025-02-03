<?php

use App\Http\Controllers\Admin\PertanyaanController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\PemberkasanController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(['prefix' => 'admin'], function () {
    Route::resource('pertanyaan', PertanyaanController::class);
    Route::resource('status', StatusController::class);
    Route::resource('siswa', SiswaController::class);
    Route::post('bulk/update/siswa', [SiswaController::class, 'bulkUpdateStatus'])->name('siswa.bulkUpdateStatus');

});


Route::group(['prefix' => 'user'], function () {
    Route::resource('profile', ProfileController::class);
    Route::post('profile/update', [ProfileController::class, 'update2'])->name('profile.update2');
    Route::resource('pemberkasan', PemberkasanController::class);
    Route::resource('pengumuman', PengumumanController::class);
});


