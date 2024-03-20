<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UserController;

Route::get('/')->name('root');
Route::get('/guest')->name('home');

Route::redirect('/', '/guest');
Route::redirect('/admin', '/admin/dashboard');
Route::redirect('/seller', '/seller/dashboard');
Route::redirect('/customer', '/customer/dashboard');

Route::controller(GuestController::class)
  ->prefix('guest')
  ->group(function () {
    Route::get('/', 'index')->name('guest.home');   
    Route::get('/products', 'products')->name('guest.products');
    Route::get('/product/{product}/detail', 'product')->name('guest.detail.product');
    Route::get('/gallery', 'index')->name('guest.gallery');
    Route::get('/testimonials', 'index')->name('guest.testimonials');
  });

Route::middleware(['auth', 'checkRole:Admin'])->group(function () {
  Route::controller(AdminController::class)
    ->prefix('admin')
    ->group(function () {
      Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
      Route::get('/sellers', 'sellers')->name('admin.sellers');
      Route::get('/customers', 'customers')->name('admin.customers');
      Route::get('/users', 'users')->name('admin.users');
      Route::get('/products', 'products')->name('admin.products');
      Route::get('/orders', 'orders')->name('admin.orders');
      Route::get('/roles', 'roles')->name('admin.roles');
      Route::get('/product-category', 'product_category')->name('admin.product_category');
      Route::get('/bank-accounts', 'bank_account')->name('admin.bank_accounts');
      Route::get('/settings', 'settings')->name('admin.settings');
    });

  Route::controller(AdminProductController::class)
    ->prefix('admin')
    ->group(function () {
      Route::get('/product/create', 'create')->name('admin.create.product');
      Route::post('product/store', 'store')->name('admin.store.product');
      Route::get('/product/{product}/edit', 'edit')->name('admin.edit.product');
      Route::get('/product/{product}/detail', 'show')->name('admin.detail.product');
      Route::put('/product/{product}/update', 'update')->name('admin.update.product');
      Route::delete('/product/{product}/destroy', 'destroy')->name('admin.destroy.product');
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

  Route::controller(BankAccountController::class)
    ->prefix('admin')
    ->group(function () {
      Route::get('/bank/create', 'create')->name('admin.create.bank');
      Route::post('bank/store', 'store')->name('admin.store.bank');
      Route::get('/bank/{bank}/edit', 'edit')->name('admin.edit.bank');
      Route::get('/bank/{bank}/detail', 'show')->name('admin.detail.bank');
      Route::put('/bank/{bank}/update', 'update')->name('admin.update.bank');
      Route::delete('/bank/{bank}/destroy', 'destroy')->name('admin.destroy.bank');
    });

  Route::controller(UserController::class)
    ->prefix('admin')
    ->group(function () {
      // userSeller
      Route::get('/create-seller', 'createSeller')->name('admin.create.seller');
      Route::post('/store-seller', 'storeSeller')->name('admin.store.seller');
      Route::get('/{seller}/edit-seller', 'editSeller')->name('admin.edit.seller');
      Route::get('/{seller}/detail-seller', 'showSeller')->name('admin.detail.seller');
      Route::put('/{seller}/update-seller', 'updateSeller')->name('admin.update.seller');
      Route::delete('/{seller}/destroy-seller', 'destroySeller')->name('admin.destroy.seller');

      // userCustomer
      Route::get('/create-customer', 'createCustomer')->name('admin.create.customer');
      Route::post('store-customer', 'storeCustomer')->name('admin.store.customer');
      Route::get('/{customer}/edit-customer', 'editCustomer')->name('admin.edit.customer');
      Route::get('/{customer}/detail-customer', 'showCustomer')->name('admin.detail.customer');
      Route::put('/{customer}/update-customer', 'updateCustomer')->name('admin.update.customer');
      Route::delete('/{customer}/destroy-customer', 'destroyCustomer')->name('admin.destroy.customer');

      // user
      Route::get('/create-user', 'createUser')->name('admin.create.user');
      Route::post('store-user', 'storeUser')->name('admin.store.user');
      Route::get('/{user}/edit-user', 'editUser')->name('admin.edit.user');
      Route::get('/{user}/detail-user', 'showUser')->name('admin.detail.user');
      Route::put('/{user}/update-user', 'updateUser')->name('admin.update.user');
      Route::delete('/{user}/destroy-user', 'destroyUser')->name('admin.destroy.user');
    });
});

Route::middleware('auth', 'checkRole:Seller')->group(function () {
  Route::controller(SellerController::class)
    ->prefix('seller')
    ->group(function () {
      Route::get('/dashboard', 'dashboard')->name('seller.dashboard');
      Route::get('/settings', 'settings')->name('seller.settings');
    });
  Route::controller(OrderController::class)
    ->prefix('seller')
    ->group(function () {
      Route::get('/orders', 'index')->name('seller.orders');
      Route::get('/order/create', 'create')->name('seller.create.order');
      Route::post('order/store', 'store')->name('seller.store.order');
      Route::get('/order/{order}/edit', 'edit')->name('seller.edit.order');
      Route::get('/order/{order}/detail', 'show')->name('seller.detail.order');
      Route::put('/order/{order}/update', 'update')->name('seller.update.order');
      Route::delete('/order/{order}/destroy', 'destroy')->name('seller.destroy.order');
    });
  Route::middleware('checkBiodata')->group(function () {
    Route::controller(ProductsController::class)
      ->prefix('seller')
      ->group(function () {
        Route::get('/products', 'index')->name('seller.products');
        Route::get('/product/create', 'create')->name('seller.create.product');
        Route::post('product/store', 'store')->name('seller.store.product');
        Route::get('/product/{product}/edit', 'edit')->name('seller.edit.product');
        Route::get('/product/{product}/detail', 'show')->name('seller.detail.product');
        Route::put('/product/{product}/update', 'update')->name('seller.update.product');
        Route::delete('/product/{product}/destroy', 'destroy')->name('seller.destroy.product');
      });
  });
});

Route::middleware('auth', 'checkRole:Seller')->group(function () {
  Route::controller(BiodataController::class)
    ->prefix('seller')
    ->group(function () {
      Route::get('/biodata', 'index')->name('seller.biodata');
      // Route::get('/biodata/create', 'create')->name('seller.create.biodata');
      Route::post('biodata/store', 'store')->name('seller.store.biodata');
      Route::get('/biodata/{biodata}/edit', 'edit')->name('seller.edit.biodata');
      Route::get('/biodata/{biodata}/detail', 'show')->name('seller.detail.biodata');
      Route::put('/biodata/{biodata}/update', 'update')->name('seller.update.biodata');
    });
});

Route::middleware('auth', 'checkRole:Customer')->group(function () {
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
