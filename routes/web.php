<?php

// use App\Http\Controllers\ProfileController;
// use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Http\Request;
// use App\Http\Controllers\AdminUserController;

// Route::get('/', function () {
//     return view('welcome');
// });

// // Route::get('/dashboard', function () {
// //     return view('dashboard');
// // })->middleware(['auth', 'verified'])->name('dashboard');

// // dashboard pengguna
// Route::get('/dashboard', function () {
//     if (Auth::user()->role !== 'pengguna') {
//         abort(403, 'Anda tidak memiliki akses.');
//     }
//     return view('pengguna.dashboard');
// })->middleware(['auth', 'verified'])->name('pengguna.dashboard');


// // dashboard teknisi
// Route::get('/dashboard-teknisi', function () {
//     if (Auth::user()->role !== 'teknisi') {
//         abort(403, 'Anda tidak memiliki akses.');
//     }
//     return view('teknisi.dashboard');
// })->middleware(['auth', 'verified'])->name('teknisi.dashboard');

// // dashboard admin
// Route::get('/dashboard-admin', function () {
//     if (Auth::user()->role !== 'admin') {
//         abort(403, 'Anda tidak memiliki akses.');
//     }
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('admin.dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// // form tambah teknisi
// Route::get('/admin/create-teknisi', function () {
//     if (Auth::user()->role !== 'admin') {
//         abort(403, 'Anda tidak memiliki akses.');
//     }

//     return app(\App\Http\Controllers\AdminUserController::class)->createForm();
// })->middleware(['auth', 'verified'])->name('admin.createTeknisi');

// // proses tambah teknisi
// Route::post('/admin/create-teknisi', function (Request $request) {
//     if (Auth::user()->role !== 'admin') {
//         abort(403, 'Anda tidak memiliki akses.');
//     }

//     return app(AdminUserController::class)->create($request);
// })->middleware(['auth', 'verified'])->name('admin.storeTeknisi');

// require __DIR__.'/auth.php';


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminUserController;
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
        return view('admin.dashboard'); // resources/views/admin/dashboard.blade.php
    })->name('admin.dashboard');

    // Dashboard Teknisi
    Route::get('/dashboard-teknisi', function () {
        if (Auth::user()->role !== 'teknisi') {
            abort(403, 'Anda tidak memiliki akses.');
        }
        return view('teknisi.dashboard'); // resources/views/teknisi/dashboard.blade.php
    })->name('teknisi.dashboard');

    // Dashboard Pengguna
    Route::get('/dashboard', function () {
        if (Auth::user()->role !== 'pengguna') {
            abort(403, 'Anda tidak memiliki akses.');
        }
        return view('pengguna.dashboard'); // resources/views/pengguna/dashboard.blade.php
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
});

/*
|--------------------------------------------------------------------------
| Breeze Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
