<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealerLocationController;
use App\Http\Controllers\DealerSetupController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::post('/login', LoginController::class);
    Route::view('/register', 'auth.register')->name('register');
    Route::post('/register', RegistrationController::class);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/dealer/setup-location', [DealerSetupController::class, 'show'])->name('dealer.setup-location');
    Route::post('/dealer/setup-location', [DealerSetupController::class, 'store'])->name('dealer.setup-location.store');
    Route::resource('dealers', DealerLocationController::class)->except(['show']);
});
