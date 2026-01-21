<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserBukuController;
use App\Http\Controllers\BukuController; // Import ini agar lebih rapi
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route untuk ADMIN (Kelola Buku)
Route::resource('buku', BukuController::class)
      ->middleware(['auth', 'checklevel:admin']);

// Route untuk USER (Hanya Lihat Buku)
Route::resource('user', UserBukuController::class)
      ->middleware(['auth', 'checklevel:user']);

require __DIR__.'/auth.php';