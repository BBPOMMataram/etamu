<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PresensiController::class, 'form'])->name('presensi.form');
Route::post('/', [PresensiController::class, 'store'])->name('presensi.store');

Route::middleware(['auth', 'verified'])->prefix('security')->group(function(){
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('guest', GuestController::class);
});

require __DIR__.'/auth.php';
