<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');

Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/city/{slug}', [CityController::class, 'show'])->name('city.show');

Route::get('/find-boarding-house', [BoardingHouseController::class, 'find'])->name('find-boarding-house');
Route::get('/find-boarding-house-results', [BoardingHouseController::class, 'findResults'])->name('find-boarding-house.results');

Route::get('/boarding-house/{slug}', [BoardingHouseController::class, 'show'])->name('boarding-house.show');
Route::get('/boarding-house/{slug}/rooms', [BoardingHouseController::class, 'showRooms'])->name('boarding-house-rooms.show');

Route::get('/boarding-house/booking/{slug}', [BookingController::class, 'booking'])->name('booking');
Route::get('/boarding-house/booking/{slug}/information', [BookingController::class, 'information'])->name('booking.information');
Route::post('/boarding-house/booking/{slug}/information/save', [BookingController::class, 'saveInformation'])->name('booking.information.save');