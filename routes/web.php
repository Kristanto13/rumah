<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RumahController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\CustomerController;
Route::redirect('/', 'office/auth');
Route::prefix('office')->name('office.')->group(function(){
    Route::prefix('auth')->name('auth.')->group(function(){
        Route::get('',[AuthController::class, 'index'])->name('index');
        Route::post('login',[AuthController::class, 'do_login'])->name('login');
        Route::post('register',[AuthController::class, 'do_register'])->name('register');
    });
    Route::middleware(['auth:web'])->group(function(){
        Route::get('logout',[AuthController::class, 'do_logout'])->name('auth.logout');
        Route::get('laporan',[MainController::class, 'laporan'])->name('laporan');
        Route::get('lbooking',[MainController::class, 'booking'])->name('lbooking');
        Route::resource('booking', BookingController::class);
        Route::resource('customer', CustomerController::class);
        Route::resource('order', OrderController::class);
        Route::resource('promosi', PromosiController::class);
        Route::resource('rumah', RumahController::class);
    });
});