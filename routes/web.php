<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::redirect('/', '/guest');

Route::controller(GuestController::class)->prefix('guest')->group(function () {
  Route::get('/', 'index')->name('home');
  Route::get('/products', 'index')->name('products');
  Route::get('/gallery', 'index')->name('gallery');
  Route::get('/testimonials', 'index')->name('testimonials');
});

require __DIR__ . '/auth.php';
