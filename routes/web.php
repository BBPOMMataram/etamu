<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProfileController;
use App\Models\Guest;
use Illuminate\Support\Facades\Route;

Route::get('/', [PresensiController::class, 'form'])->name('presensi.form');
Route::post('/', [PresensiController::class, 'store'])->name('presensi.store');

Route::get('/dashboard', DashboardController::class)->name('dashboard');

Route::middleware('auth')->prefix('security')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('guest', GuestController::class);
    Route::get('guest-download', [DashboardController::class, 'Guest_download'])->name('guest.download');
});

require __DIR__ . '/auth.php';
