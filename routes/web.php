<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TeknisiUController;
use App\Http\Controllers\Auth\PenggunaAuthController;
use App\Http\Controllers\PaymentController;
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
*/
Route::middleware(['auth'])->group(function () {

    // Dashboard Pengguna
    Route::get('/dashboard', function () {
        if (Auth::user()->role !== 'pengguna') {
            abort(403, 'Anda tidak memiliki akses.');
        }
        return app(UserDashboardController::class)->index();
    })->name('pengguna.dashboard');

    // Login pengguna
    Route::get('/login-pengguna', [PenggunaAuthController::class, 'showLoginForm'])
        ->name('pengguna.login');

    Route::post('/login-pengguna', [PenggunaAuthController::class, 'login'])
        ->name('pengguna.login.submit');

    // Register pengguna
    Route::get('/register-pengguna', [PenggunaAuthController::class, 'showRegisterForm'])
        ->name('pengguna.register');

    Route::post('/register-pengguna', [PenggunaAuthController::class, 'register'])
        ->name('pengguna.register.submit');

    // Detail teknisi
    Route::get('/teknisi/{id}', [TeknisiUController::class, 'detail'])->name('user.teknisiDetail');

    // Pencarian teknisi
    Route::get('/search', [TeknisiUController::class, 'search'])->name('user.searchTeknisi');

    // Order teknisi
    Route::post('/order/{teknisiId}', [OrderController::class, 'store'])->name('user.orderTeknisi');

    // Daftar pesanan user
    Route::get('/orders', [OrderController::class, 'index'])->name('user.orders');

    /*
    |--------------------------------------------------------------------------
    | Dashboard Admin
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard-admin', function () {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Dashboard Teknisi
    |--------------------------------------------------------------------------
    */
    Route::get('/dashboard-teknisi', function () {
        if (Auth::user()->role !== 'teknisi') {
            abort(403, 'Anda tidak memiliki akses.');
        }
        return view('teknisi.dashboard');
    })->name('teknisi.dashboard');

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
