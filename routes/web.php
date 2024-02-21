<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductCategoryController;

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
			Route::get('/roles', 'roles')->name('admin.roles');
			Route::get('/product-category', 'product_category')->name('admin.product_category');
			Route::get('/bank-accounts', 'bank_account')->name('admin.bank_accounts');
			Route::get('/settings', 'settings')->name('admin.settings');
		});

	Route::controller(RoleController::class)
		->prefix('admin')
		->group(function () {
			Route::get('/role/create', 'create')->name('admin.create.role');
			Route::post('role/store', 'store')->name('admin.store.role');
			Route::get('/role/{role}/edit', 'edit')->name('admin.edit.role');
			Route::get('/role/{role}/detail', 'show')->name('admin.detail.role');
			Route::put('/role/{role}/update', 'update')->name('admin.update.role');
			Route::delete('/role/{role}/destroy', 'destroy')->name('admin.destroy.role');
		});

	Route::controller(ProductCategoryController::class)
		->prefix('admin')
		->group(function () {
			Route::get('/category/create', 'create')->name('admin.create.category');
			Route::post('category/store', 'store')->name('admin.store.category');
			Route::get('/category/{category}/edit', 'edit')->name('admin.edit.category');
			Route::get('/category/{category}/detail', 'show')->name('admin.detail.category');
			Route::put('/category/{category}/update', 'update')->name('admin.update.category');
			Route::delete('/category/{category}/destroy', 'destroy')->name('admin.destroy.category');
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
