<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoardingHouseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Routes that need to be protected from admin/owner access
Route::middleware(['auth', \App\Http\Middleware\PreventAdminOwnerAccess::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/check-email', function (Request $request) {
    $email = $request->query('email');
    $exists = \App\Models\User::where('email', $email)->exists();
    return response()->json(['exists' => $exists]);
})->name('check-email');

Route::get('/boarding-houses', [BoardingHouseController::class, 'index'])->name('boarding-house.index');
Route::get('/boarding-houses/search', [BoardingHouseController::class, 'search'])->name('boarding-house.search');
Route::get('/boarding-houses/{boardingHouse:slug}', [BoardingHouseController::class, 'detail'])->name('boarding-house.detail');

require __DIR__ . '/auth.php';
