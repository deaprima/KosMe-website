<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\MidtransController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Routes protected from admin/owner access
Route::middleware(['auth', \App\Http\Middleware\PreventAdminOwnerAccess::class])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/check-email', function (Request $request) {
    $email = $request->query('email');
    $exists = \App\Models\User::where('email', $email)->exists();
    return response()->json(['exists' => $exists]);
})->name('check-email');

// Public routes protected from admin/owner access
Route::middleware([\App\Http\Middleware\PreventAdminOwnerAccess::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/boarding-houses/search', [BoardingHouseController::class, 'search'])->name('boarding-house.search');
    Route::get('/boarding-houses/{boardingHouse:slug}', [BoardingHouseController::class, 'detail'])->name('boarding-house.detail');
    Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
});

Route::middleware(['auth', \App\Http\Middleware\PreventAdminOwnerAccess::class])->group(function () {
    Route::get('/boarding-houses/{boardingHouse:slug}/booking/{room}', [BoardingHouseController::class, 'payment'])->name('booking.payment');
    Route::post('/boarding-houses/{boardingHouse:slug}/booking/{room}/process', [BoardingHouseController::class, 'processPayment'])->name('booking.process');
    Route::get('/booking/{transaction}/success', [BoardingHouseController::class, 'success'])->name('booking.success');
    Route::post('/boarding-houses/{boardingHouse}/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');
    Route::get('/transactions/history', [App\Http\Controllers\TransactionController::class, 'history'])->name('transactions.history');
});

// Midtrans callback route (no auth required)
Route::post('/midtrans/notification', [MidtransController::class, 'notification'])->name('midtrans.notification');

require __DIR__ . '/auth.php';
