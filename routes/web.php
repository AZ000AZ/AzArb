<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController; // EKLEMEN GEREK!
use App\Http\Controllers\ExperienceController;

Route::get('/', function () {
return view('home');
});

Route::view('/host', 'host')->name('host');
Route::resource('properties', PropertyController::class);
Route::get('/experiences', [ExperienceController::class, 'index'])->name('experiences');



