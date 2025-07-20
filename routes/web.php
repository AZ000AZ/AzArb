<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HostController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Sadece iki host rotası olsun:
Route::get('/host', [HostController::class, 'create'])->name('host');
Route::post('/host', [HostController::class, 'store'])->name('host.store');

// Diğer kaynaklar:
Route::resource('properties', PropertyController::class);
Route::resource('experiences', ExperienceController::class);
Route::get('/experiences/category/{category}', [ExperienceController::class, 'category'])
    ->name('experiences.category');
Route::get('/experiences/create', [ExperienceController::class, 'create'])->name('experiences.create');
Route::post('/experiences', [ExperienceController::class, 'store'])->name('experiences.store');
Route::resource('experiences', ExperienceController::class);

// API ve dil değişim rotaları burada...
Route::prefix('api')->group(function () {
    Route::get('/status', function () { return response()->json(['status' => 'online']); });
    Route::post('/favorites/toggle', function () { return response()->json(['success' => true]); });
    Route::post('/language/change', function () { return response()->json(['success' => true]); });
});
Route::get('/lang/{locale}', function ($locale) {
    if (!in_array($locale, ['ar','tr','en'])) abort(400);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('lang.switch');
Route::view('/host', 'host.index')->name('host');

