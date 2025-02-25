<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController; // Tambahkan controller untuk profile

/*
|---------------------------------------------------------------------- 
| Web Routes 
|---------------------------------------------------------------------- 
| 
| Here is where you can register web routes for your application. These 
| routes are loaded by the RouteServiceProvider and all of them will 
| be assigned to the "web" middleware group. Make something great! 
| 
*/

// Halaman Welcome
Route::get('/', [PageController::class, 'welcome'])->name('welcome');

// Route untuk halaman tentang kami
Route::get('/about', function () {
    return view('about');
})->name('about');

// Routes untuk guest (belum login)
Route::middleware('guest')->group(function () {
    // Halaman Pendaftaran
    Route::get('/register', [PageController::class, 'register'])->name('register');
    Route::post('/register', [PageController::class, 'registerSubmit'])->name('register.submit');

    // Halaman Login
    Route::get('/login', [PageController::class, 'login'])->name('login');
    Route::post('/login', [PageController::class, 'loginSubmit'])->name('login.submit');
});

// Routes untuk user yang sudah login
Route::middleware('auth')->group(function () {
    // Halaman welcome (tidak perlu karena welcome sudah didefinisikan di luar)
    // Route::get('/welcome', [PageController::class, 'welcome'])->name('welcome');

    // Halaman resort
    Route::get('/home', [PageController::class, 'home'])->name('home');

    // Halaman booking
    Route::get('/booking', [App\Http\Controllers\BookingController::class, 'create'])->name('booking');
    Route::post('/booking', [App\Http\Controllers\BookingController::class, 'store'])->name('booking.store');
    Route::get('/booking/success', [App\Http\Controllers\BookingController::class, 'success'])->name('booking.success');

    // Halaman Logout
    Route::post('/logout', [PageController::class, 'logout'])->name('logout');

    // Halaman Profile
    // Profile Routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [PageController::class, 'profile'])->name('profile');
        Route::get('/profile/edit', [PageController::class, 'editProfile'])->name('profile.edit');
        Route::post('/profile/update', [PageController::class, 'updateProfile'])->name('profile.update');
        Route::get('/profile/change-password', [PageController::class, 'changePassword'])->name('password.change');
        Route::post('/profile/update-password', [PageController::class, 'updatePassword'])->name('password.update');
    });

    // Routes untuk Admin
    // Admin routes
    Route::prefix('admin')->group(function () {
        Route::get('/login', [App\Http\Controllers\AdminController::class, 'showLoginForm'])->name('admin.login.form');
        Route::post('/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');

        Route::middleware('auth:admin')->group(function () {
            Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
            Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('admin.logout');
        });
    });
});
