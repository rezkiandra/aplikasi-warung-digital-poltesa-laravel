<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('auth')->group(function () {
  Route::get('/login', 'login')->name('login');
  Route::get('/register', 'signin')->name('register');

  Route::post('/login', 'register')->name('signin');
  Route::post('/register', 'signup')->name('signup');
  Route::post('/logout', 'logout')->name('logout');
});
