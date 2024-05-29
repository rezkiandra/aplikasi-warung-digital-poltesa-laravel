<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)
  ->prefix('auth')
  ->group(function () {
    Route::middleware('guest')->group(function () {
      Route::get('/login', 'login')->name('login');
      Route::post('/login', 'signin')->name('signin');
      Route::get('/register', 'register')->name('register');
      Route::post('/register', 'signup')->name('signup');
    });

    Route::get('/logout', 'logout')->name('logout')->middleware('auth');
  });
