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
use App\Http\Controllers\ProductsCartController;
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

Route::middleware('auth', 'mustLogin')->group(function () {
  Route::controller(ProductsCartController::class)
    ->prefix('customer')
    ->group(function () {
      Route::get('/cart', 'index')->name('cart');
      Route::post('/cart', 'store')->name('cart.store');
      Route::put('/cart', 'update')->name('cart.update');
      Route::delete('/cart/{cart}', 'destroy')->name('cart.destroy');
    });
});

Route::middleware('auth', 'mustLogin')->group(function () {
  Route::controller(OrderController::class)
    ->prefix('customer')
    ->group(function () {
      Route::get('/order', 'index')->name('order');
      Route::post('/add-order', 'store')->name('order.store');
      Route::get('/order/{order}/detail', 'show')->name('order.detail');
      Route::put('/order/{order}/checkout', 'update')->name('order.update');
      Route::delete('/cancel-order/{order}', 'destroy')->name('order.destroy');
    });
});


Route::middleware(['auth', 'checkRole:Admin'])->group(function () {
  Route::controller(AdminController::class)
    ->prefix('admin/dashboard')
    ->group(function () {
      Route::get('/', 'dashboard')->name('admin.dashboard');
      Route::get('/list-sellers', 'sellers')->name('admin.sellers');
      Route::get('/list-customers', 'customers')->name('admin.customers');
      Route::get('/list-users', 'users')->name('admin.users');
      Route::get('/list-products', 'products')->name('admin.products');
      Route::get('/list-orders', 'orders')->name('admin.orders');
      Route::get('/list-roles', 'roles')->name('admin.roles');
      Route::get('/list-product-category', 'product_category')->name('admin.product_category');
      Route::get('/list-bank-accounts', 'bank_account')->name('admin.bank_accounts');
      Route::get('/settings', 'settings')->name('admin.settings');
    });

  Route::controller(AdminProductController::class)
    ->prefix('admin/dashboard')
    ->group(function () {
      Route::get('/product/create', 'create')->name('admin.create.product');
      Route::post('product/store', 'store')->name('admin.store.product');
      Route::get('/product/{product}/edit', 'edit')->name('admin.edit.product');
      Route::get('/product/{product}/detail', 'show')->name('admin.detail.product');
      Route::put('/product/{product}/update', 'update')->name('admin.update.product');
      Route::delete('/product/{product}/destroy', 'destroy')->name('admin.destroy.product');
    });

  Route::controller(RoleController::class)
    ->prefix('admin/dashboard')
    ->group(function () {
      Route::get('/role/create', 'create')->name('admin.create.role');
      Route::post('role/store', 'store')->name('admin.store.role');
      Route::get('/role/{role}/edit', 'edit')->name('admin.edit.role');
      Route::get('/role/{role}/detail', 'show')->name('admin.detail.role');
      Route::put('/role/{role}/update', 'update')->name('admin.update.role');
      Route::delete('/role/{role}/destroy', 'destroy')->name('admin.destroy.role');
    });

  Route::controller(ProductCategoryController::class)
    ->prefix('admin/dashboard')
    ->group(function () {
      Route::get('/product-category/create', 'create')->name('admin.create.category');
      Route::post('category/store', 'store')->name('admin.store.category');
      Route::get('/product-category/{category}/edit', 'edit')->name('admin.edit.category');
      Route::get('/product-category/{category}/detail', 'show')->name('admin.detail.category');
      Route::put('/product-category/{category}/update', 'update')->name('admin.update.category');
      Route::delete('/product-category/{category}/destroy', 'destroy')->name('admin.destroy.category');
    });

  Route::controller(BankAccountController::class)
    ->prefix('admin/dashboard')
    ->group(function () {
      Route::get('/bank/create', 'create')->name('admin.create.bank');
      Route::post('bank/store', 'store')->name('admin.store.bank');
      Route::get('/bank/{bank}/edit', 'edit')->name('admin.edit.bank');
      Route::get('/bank/{bank}/detail', 'show')->name('admin.detail.bank');
      Route::put('/bank/{bank}/update', 'update')->name('admin.update.bank');
      Route::delete('/bank/{bank}/destroy', 'destroy')->name('admin.destroy.bank');
    });

  Route::controller(UserController::class)
    ->prefix('admin/dashboard')
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
    ->prefix('seller/dashboard')
    ->group(function () {
      Route::get('/', 'dashboard')->name('seller.dashboard');
      Route::get('/settings', 'settings')->name('seller.settings');
    });
  Route::controller(OrderController::class)
    ->prefix('seller/dashboard')
    ->group(function () {
      Route::get('/list-orders', 'index')->name('seller.orders');
      Route::get('/order/create', 'create')->name('seller.create.order');
      Route::post('order/store', 'store')->name('seller.store.order');
      Route::get('/order/{order}/edit', 'edit')->name('seller.edit.order');
      Route::get('/order/{order}/detail', 'show')->name('seller.detail.order');
      Route::put('/order/{order}/update', 'update')->name('seller.update.order');
      Route::delete('/order/{order}/destroy', 'destroy')->name('seller.destroy.order');
    });
  Route::middleware('checkBiodata')->group(function () {
    Route::controller(ProductsController::class)
      ->prefix('seller/dashboards')
      ->group(function () {
        Route::get('/list-products', 'index')->name('seller.products');
        Route::get('/product/create', 'create')->name('seller.create.product')->middleware('mustActive');
        Route::post('product/store', 'store')->name('seller.store.product')->middleware('mustActive');
        Route::get('/product/{product}/edit', 'edit')->name('seller.edit.product');
        Route::get('/product/{product}/detail', 'show')->name('seller.detail.product');
        Route::put('/product/{product}/update', 'update')->name('seller.update.product');
        Route::delete('/product/{product}/destroy', 'destroy')->name('seller.destroy.product');
      });
  });
});

Route::middleware('auth', 'checkRole:Seller')->group(function () {
  Route::controller(BiodataController::class)
    ->prefix('seller/dashboard')
    ->group(function () {
      Route::get('/biodata', 'index')->name('seller.biodata');
      Route::post('biodata/store', 'store')->name('seller.store.biodata');
      Route::put('/biodata/{biodata}/update', 'update')->name('seller.update.biodata');
    });
});

Route::middleware('auth', 'checkRole:Customer')->group(function () {
  Route::controller(CustomerController::class)
    ->prefix('customer/dashboard')
    ->group(function () {
      Route::get('/', 'dashboard')->name('customer.dashboard');
      Route::get('/cart', 'cart')->name('customer.cart');
      Route::get('/orders', 'orders')->name('customer.orders');
      Route::get('/biodata', 'biodata')->name('customer.biodata');
      Route::post('biodata/store', 'store')->name('customer.store.biodata');
      Route::put('/biodata/{biodata}/update', 'update')->name('customer.update.biodata');
    });
  Route::controller(CustomerController::class)
    ->prefix('customer')
    ->group(function () {
      Route::get('/home', 'index')->name('customer.home');
      Route::get('/products', 'products')->name('customer.products');
      Route::get('/product/{product}/detail', 'product')->name('customer.detail.product');
    });
});


require __DIR__ . '/auth.php';
