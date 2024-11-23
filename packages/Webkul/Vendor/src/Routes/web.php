<?php

use Illuminate\Support\Facades\Route;
use Webkul\Vendor\Http\Controllers\AuthController;
use Webkul\Vendor\Http\Middleware\VendorMiddleware;

Route::group(['middleware' => ['web'], 'prefix' => 'vendor'], function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('vendor.login');
    Route::post('login', [AuthController::class, 'login'])->name('vendor.login.submit');
    Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('vendor.register');
    Route::post('register', [AuthController::class, 'register'])->name('vendor.register.submit');
    
    Route::group(['middleware' => ['vendor']], function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('vendor.logout');
        Route::get('dashboard', function () {
            return view('vendor::dashboard');
        })->name('vendor.dashboard');
    });
});