<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SellerController;

Route::redirect('/', '/guest');

Route::controller(GuestController::class)
    ->prefix('guest')
    ->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/products', 'index')->name('products');
        Route::get('/gallery', 'index')->name('gallery');
        Route::get('/testimonials', 'index')->name('testimonials');
    });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::controller(AdminController::class)
        ->prefix('admin')
        ->group(function () {
            Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
            Route::get('/sellers', 'sellers')->name('admin.sellers');
            Route::get('/customers', 'customers')->name('admin.customers');
            Route::get('/products', 'products')->name('admin.products');
            Route::get('/orders', 'orders')->name('admin.orders');
            Route::get('/levels', 'levels')->name('admin.levels');
            Route::get('/product-category', 'product_category')->name('admin.product_category');
            Route::get('/bank-account', 'bank_account')->name('admin.bank_account');
        });

    Route::controller(SellerController::class)
        ->prefix('seller')
        ->group(function () {
            Route::get('/dashboard', 'dashboard')->name('seller.dashboard');
            Route::get('/product', 'product')->name('seller.product');
            Route::get('/orders', 'orders')->name('seller.orders');
            Route::get('/bank-account', 'bank_account')->name('seller.bank_account');
        });

    Route::controller(CustomerController::class)
        ->prefix('customer')
        ->group(function () {
            Route::get('/dashboard', 'dashboard')->name('customer.dashboard');
            Route::get('/product-cart', 'product_cart')->name('customer.product_cart');
            Route::get('/orders', 'orders')->name('customer.orders');
            Route::get('/bank-account', 'bank_account')->name('customer.bank_account');
        });
});

require __DIR__ . '/auth.php';
