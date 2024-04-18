<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::controller(AuthController::class)
  ->prefix('auth')
  ->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::get('/logout', 'logout')->name('logout');

    Route::post('/login', 'signin')->name('signin');
    Route::post('/register', 'signup')->name('signup');
  });
