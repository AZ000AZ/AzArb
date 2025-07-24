<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;

// Sadece Welcome Sayfası Herkese Açık (Opsiyonel)
Route::get('/', function () {
    return view('welcome');
});

// Auth Routes (Breeze Auth Routes)
require __DIR__.'/auth.php';

// Giriş Yapmadan Hiçbir Sayfaya Erişilemesin (Dashboard Dahil)
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Ana Sayfa
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Host (Servis Listeleme)
    Route::get('/host', [ServiceController::class, 'index'])->name('host');

    // Hizmet Oluşturma
    Route::get('/host/create', [ServiceController::class, 'create'])->name('services.create');
    Route::post('/host/store', [ServiceController::class, 'store'])->name('services.store');

    // Properties CRUD
    Route::resource('properties', PropertyController::class);

    // Experiences CRUD
    Route::resource('experiences', ExperienceController::class);

    // Profil Yönetimi
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
