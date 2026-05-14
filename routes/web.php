<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\HotelController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HotelController::class, 'index']);

Route::middleware(['auth'])->group(function () {

    Route::post('/booking/{hotel}', [BookingController::class, 'store'])
        ->name('booking.store');

    Route::get('/my-booking', [BookingController::class, 'myBooking'])
        ->name('booking.my');

    Route::get('/dashboard', function () {

        return redirect('/');

    })->name('dashboard');
});


// ================= ADMIN =================

Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', [HotelController::class, 'adminDashboard']);

    Route::resource('hotels', HotelController::class)
        ->except(['index', 'show']);
});

require __DIR__.'/auth.php';