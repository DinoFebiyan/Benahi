<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\PaymentController; // <-- Tambahkan ini
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome'); // resources/views/landing.blade.php
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Dashboard Multi-Role
|--------------------------------------------------------------------------
|
| Sesuai role user, redirect ke dashboard masing-masing.
| Gunakan middleware 'auth' dan 'verified'.
|
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard Admin
    Route::get('/dashboard-admin', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    // Dashboard Teknisi
    Route::get('/dashboard-teknisi', function () {
        if (Auth::user()->role !== 'teknisi') {
            abort(403, 'Anda tidak memiliki akses.');
        }
        return view('teknisi.dashboard');
    })->name('teknisi.dashboard');

    // Dashboard Pengguna
    Route::get('/dashboard', function () {
        if (Auth::user()->role !== 'pengguna') {
            abort(403, 'Anda tidak memiliki akses.');
        }
        return view('pengguna.dashboard');
    })->name('pengguna.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile Routes
    |--------------------------------------------------------------------------
    */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes: Tambah Teknisi
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->group(function () {
        // Form tambah teknisi
        Route::get('/create-teknisi', function () {
            if (Auth::user()->role !== 'admin') {
                abort(403, 'Anda tidak memiliki akses.');
            }
            return app(AdminUserController::class)->createForm();
        })->name('admin.createTeknisi');

        // Proses tambah teknisi
        Route::post('/create-teknisi', function (Request $request) {
            if (Auth::user()->role !== 'admin') {
                abort(403, 'Anda tidak memiliki akses.');
            }
            return app(AdminUserController::class)->create($request);
        })->name('admin.storeTeknisi');
    });

    /*
    |--------------------------------------------------------------------------
    | Payment Routes
    |--------------------------------------------------------------------------
    | Hanya pengguna yang bisa mengakses pembayaran order
    */
    Route::prefix('payments')->group(function () {
        // Form pembayaran
        Route::get('order/{order}/payment', [PaymentController::class, 'create'])
            ->name('payments.create');

        // Proses simpan pembayaran
        Route::post('order/{order}/payment', [PaymentController::class, 'store'])
            ->name('payments.store');

        // Menampilkan status pembayaran
        Route::get('payment/{payment}', [PaymentController::class, 'show'])
            ->name('payments.show');
    });

});

/*
|--------------------------------------------------------------------------
| Breeze Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
