<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Halaman Welcome
Route::get('/', [PageController::class, 'welcome'])->name('welcome');

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
    // Halaman Home
    Route::get('/home', [PageController::class, 'home'])->name('home');
    // Logout
    Route::post('/logout', [PageController::class, 'logout'])->name('logout');
});
