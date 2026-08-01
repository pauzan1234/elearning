<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard menampilkan daftar user dan hanya dapat diakses
// oleh pengguna yang telah login serta memverifikasi email.
Route::get('/dashboard', [UserController::class, 'index'])
    ->middleware(['auth', 'verified'])
    //Memberi nama pada route tersebut.
    //Nama route memudahkan pemanggilan tanpa menuliskan URL secara langsung.
    //<a href="{{ route('dashboard') }}">
    //  Dashboard
    //</a>
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/users', [UserController::class, 'store'])
    ->name('users.store');

///users/{id}: Ini adalah URL yang akan diakses.
//name('users.update'): memberi nama pada route.
Route::put('/users/{id}', [UserController::class, 'update'])
    ->name('users.update');
require __DIR__.'/auth.php';
