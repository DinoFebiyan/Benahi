<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\Auth\PenggunaAuthController;
use App\Http\Controllers\TeknisiDashboardController;
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
    return view('welcome');
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

    // ROUTE SPESIFIK harus DULUAN
    Route::get('/teknisi/data-diri', [TeknisiController::class, 'editDataDiri'])
        ->name('teknisi.dataDiri')
        ->middleware('auth');

    Route::put('/teknisi/data-diri', [TeknisiController::class, 'updateDataDiri'])
        ->name('teknisi.updateDataDiri')
        ->middleware('auth');

    // Baru route dengan parameter
    Route::get('/teknisi/{id}', [TeknisiController::class, 'detail'])->name('user.teknisiDetail');

    // Pencarian teknisi
    Route::get('/search', [TeknisiController::class, 'search'])->name('user.searchTeknisi');

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
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard-teknisi', [TeknisiDashboardController::class, 'dashboard'])->name('teknisi.dashboard');
        Route::get('/teknisi/order/{id}', [TeknisiController::class, 'show'])->name('teknisi.order.show');
        Route::get('/teknisi/tanggal/{id}', [TeknisiDashboardController::class, 'show'])->name('teknisi.order.showDetailTanggal');
        Route::put('/teknisi/order/{id}', [TeknisiController::class, 'updateOrder'])->name('teknisi.updateOrder');
        Route::get('/orders/{id}', [OrderController::class, 'show'])->name('user.orderDetail');

    });

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
        Route::get('/create-teknisi', function () {
            if (Auth::user()->role !== 'admin') {
                abort(403, 'Anda tidak memiliki akses.');
            }
            return app(AdminController::class)->createForm();
        })->name('admin.createTeknisi');

        Route::post('/create-teknisi', function (Request $request) {
            if (Auth::user()->role !== 'admin') {
                abort(403, 'Anda tidak memiliki akses.');
            }
            return app(AdminController::class)->create($request);
        })->name('admin.storeTeknisi');
    });

    /*
    |--------------------------------------------------------------------------
    | Payment Routes
    |--------------------------------------------------------------------------
    */
    Route::prefix('payments')->group(function () {
        Route::get('order/{order}/payment', [PaymentController::class, 'create'])
            ->name('payments.create');

        Route::post('order/{order}/payment', [PaymentController::class, 'store'])
            ->name('payments.store');

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