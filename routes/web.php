<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SettingsController;
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
Route::resource('experiences', ExperienceController::class);
Route::resource('services', ServiceController::class);

Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/bookings', [UserController::class, 'bookings'])->name('bookings');
Route::get('/notifications', [UserController::class, 'notifications'])->name('notifications');
Route::get('/settings', [UserController::class, 'settings'])->name('settings');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::view('/help', 'pages.help')->name('help');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');

Route::view('/help', 'pages.help')->name('help');
Route::view('/terms', 'pages.terms')->name('terms');
Route::view('/privacy', 'pages.privacy')->name('privacy');
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');


Route::get('/bookings', [BookingController::class, 'index'])
    ->middleware('auth')
    ->name('bookings');
Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
Route::delete('/bookings/{booking}', [\App\Http\Controllers\BookingController::class, 'destroy'])
    ->middleware('auth')
    ->name('bookings.destroy');



Route::get('/notifications', [NotificationController::class, 'index'])
    ->middleware('auth')
    ->name('notifications');


Route::middleware('auth')->group(function () {
    Route::get('/settings', [ProfileController::class, 'edit'])->name('settings');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('password.update');
});
Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
