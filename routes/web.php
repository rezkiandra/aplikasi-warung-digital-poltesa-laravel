<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\CallToActionController;
use App\Http\Controllers\ProductsCartController;
use App\Http\Controllers\ProductCategoryController;

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
    Route::get('/faq', 'faq')->name('guest.faq');
    Route::get('/detail-product/{product}', 'product')->name('guest.detail.product');
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
      Route::get('/detail-transaction/{order}', 'detailOrder')->name('admin.detail.order');
      Route::get('/list-roles', 'roles')->name('admin.roles');
      Route::get('/list-product-category', 'product_category')->name('admin.product_category');
      Route::get('/list-bank-accounts', 'bank_account')->name('admin.bank_accounts');
      Route::get('/settings', 'settings')->name('admin.settings');
    });

  Route::controller(AdminProductController::class)
    ->prefix('admin/dashboard')
    ->group(function () {
      Route::get('/create-product', 'create')->name('admin.create.product');
      Route::post('store-product', 'store')->name('admin.store.product');
      Route::get('/edit-product/{product}', 'edit')->name('admin.edit.product');
      Route::get('/detail-product/{product}', 'show')->name('admin.detail.product');
      Route::put('/update-product/{product}', 'update')->name('admin.update.product');
      Route::delete('/delete-product/{product}', 'destroy')->name('admin.destroy.product');
    });

  Route::controller(RoleController::class)
    ->prefix('admin/dashboard')
    ->group(function () {
      Route::get('/create-role', 'create')->name('admin.create.role');
      Route::post('store-role', 'store')->name('admin.store.role');
      Route::get('/edit-role/{role}', 'edit')->name('admin.edit.role');
      Route::get('/detail-role/{role}', 'show')->name('admin.detail.role');
      Route::put('/update-role/{role}', 'update')->name('admin.update.role');
      Route::delete('/delete-role/{role}', 'destroy')->name('admin.destroy.role');
    });

  Route::controller(ProductCategoryController::class)
    ->prefix('admin/dashboard')
    ->group(function () {
      Route::get('/create-category/create', 'create')->name('admin.create.category');
      Route::post('store-category', 'store')->name('admin.store.category');
      Route::get('/edit-category/{category}', 'edit')->name('admin.edit.category');
      Route::get('/detail-category/{category}', 'show')->name('admin.detail.category');
      Route::put('/update-category/{category}', 'update')->name('admin.update.category');
      Route::delete('/delete-category/{category}', 'destroy')->name('admin.destroy.category');
    });

  Route::controller(BankAccountController::class)
    ->prefix('admin/dashboard')
    ->group(function () {
      Route::get('/create-bank', 'create')->name('admin.create.bank');
      Route::post('store-bank', 'store')->name('admin.store.bank');
      Route::get('/edit-bank/{bank}', 'edit')->name('admin.edit.bank');
      Route::get('/detail-bank/{bank}', 'show')->name('admin.detail.bank');
      Route::put('/update-bank/{bank}', 'update')->name('admin.update.bank');
      Route::delete('/delete-bank/{bank}', 'destroy')->name('admin.destroy.bank');
    });

  Route::controller(UserController::class)
    ->prefix('admin/dashboard')
    ->group(function () {
      Route::get('/create-seller', 'createSeller')->name('admin.create.seller');
      Route::post('/store-seller', 'storeSeller')->name('admin.store.seller');
      Route::get('/edit-seller/{seller}', 'editSeller')->name('admin.edit.seller');
      Route::get('/detail-seller/{seller}', 'showSeller')->name('admin.detail.seller');
      Route::put('/update-seller/{seller}', 'updateSeller')->name('admin.update.seller');
      Route::delete('/delete-seller/{seller}', 'destroySeller')->name('admin.destroy.seller');

      Route::get('/create-customer', 'createCustomer')->name('admin.create.customer');
      Route::post('store-customer', 'storeCustomer')->name('admin.store.customer');
      Route::get('/edit-customer/{customer}', 'editCustomer')->name('admin.edit.customer');
      Route::get('/detail-customer/{customer}', 'showCustomer')->name('admin.detail.customer');
      Route::put('/update-customer/{customer}', 'updateCustomer')->name('admin.update.customer');
      Route::delete('/delete-customer/{customer}', 'destroyCustomer')->name('admin.destroy.customer');

      Route::get('/create-user', 'createUser')->name('admin.create.user');
      Route::post('store-user', 'storeUser')->name('admin.store.user');
      Route::get('/edit-user/{user}', 'editUser')->name('admin.edit.user');
      Route::get('/detail-user/{user}', 'showUser')->name('admin.detail.user');
      Route::put('/update-user/{user}', 'updateUser')->name('admin.update.user');
      Route::delete('/delete-user/{user}', 'destroyUser')->name('admin.destroy.user');
    });
});

Route::middleware('auth', 'checkRole:Seller')->group(function () {
  Route::controller(SellerController::class)
    ->prefix('seller/dashboard')
    ->group(function () {
      Route::get('/', 'dashboard')->name('seller.dashboard');
      Route::get('/list-orders', 'orders')->name('seller.orders');
      Route::get('/detail-order/{order}', 'orderDetail')->name('seller.detail.order');
      Route::get('/settings', 'settings')->name('seller.settings');
      Route::put('/settings/edit-profile/{seller}', 'updateProfile')->name('seller.update.profile');
    });

  Route::controller(BiodataController::class)
    ->prefix('seller/dashboard')
    ->group(function () {
      Route::get('/biodata', 'index')->name('seller.biodata');
      Route::post('store-biodata', 'store')->name('seller.store.biodata');
      Route::put('/update-biodata/{biodata}', 'update')->name('seller.update.biodata');
    });

  Route::middleware('checkBiodata')->group(function () {
    Route::controller(ProductsController::class)
      ->prefix('seller/dashboards')
      ->group(function () {
        Route::get('/list-products', 'index')->name('seller.products');
        Route::get('/create-product', 'create')->name('seller.create.product')->middleware('mustActive');
        Route::post('store-product', 'store')->name('seller.store.product')->middleware('mustActive');
        Route::get('/edit-product/{product}', 'edit')->name('seller.edit.product');
        Route::get('/detail-product/{product}', 'show')->name('seller.detail.product');
        Route::put('/update-product/{product}', 'update')->name('seller.update.product');
        Route::delete('/delete-product/{product}', 'destroy')->name('seller.destroy.product');
      });
  });
});

Route::middleware('auth', 'mustLogin', 'checkRole:Customer')->group(function () {
  Route::controller(CustomerController::class)
    ->prefix('customer/dashboard')
    ->group(function () {
      Route::get('/wishlist', 'wishlist')->name('customer.wishlist');
      Route::get('/cart', 'cart')->name('customer.cart');
      Route::get('/orders', 'orders')->name('customer.orders');
      Route::get('/', 'dashboard')->name('customer.dashboard');
      Route::get('/biodata', 'biodata')->name('customer.biodata');
      Route::get('/settings', 'settings')->name('customer.settings');
      Route::post('store-biodata', 'store')->name('customer.store.biodata');
      Route::put('/update-biodata/{biodata}', 'update')->name('customer.update.biodata');
      Route::get('/detail-product/{product}', 'product')->name('customer.detail.product');
      Route::put('/settings/edit-profile/{customer}', 'updateProfile')->name('customer.update.profile');
    });

  Route::controller(CustomerController::class)
    ->prefix('customer')
    ->group(function () {
      Route::get('/home', 'index')->name('customer.home');
      Route::get('/products', 'products')->name('customer.products');
      Route::get('/faq', 'faq')->name('customer.faq');
    });
});

Route::middleware('auth', 'checkCustomer', 'checkRole:Customer')->group(function () {
  Route::controller(ProductsCartController::class)
    ->prefix('customer')
    ->group(function () {
      Route::post('/store-cart', 'store')->name('cart.store');
      Route::put('/update-cart', 'update')->name('cart.update');
      Route::delete('/delete-cart/{cart}', 'destroy')->name('cart.destroy');
    });

  Route::controller(WishlistController::class)
    ->prefix('customer')
    ->group(function () {
      Route::post('/store-wishlist', 'store')->name('wishlist.store');
      Route::delete('/delete-wishlist/{wishlist}', 'destroy')->name('wishlist.destroy');
    });

  Route::controller(OrderController::class)
    ->prefix('customer')
    ->group(function () {
      Route::post('/store-order', 'store')->name('order.store');
      Route::put('/update-order/{order}', 'update')->name('order.update');
    });

  Route::controller(MidtransController::class)
    ->prefix('customer')
    ->group(function () {
      Route::get('/checkout/{order}', 'processPayment')->name('midtrans.checkout');
      Route::get('/detail-transaction/{order}', 'detailPayment')->name('midtrans.detail');
      Route::get('/cancel-transaction/{order}', 'cancelPayment')->name('midtrans.cancelled');
      Route::post('/cancel-transaction', 'cancelPaymentMidtrans')->name('midtrans.cancelledMidtrans');
    });
});

Route::middleware('auth', 'mustLogin')->group(function () {
  Route::controller(CallToActionController::class)->group(function () {
    Route::get('/preview-transaction/{order}', 'preview')->name('preview.transaction');
    Route::get('/download-transaction/{order}', 'download')->name('download.transaction');
  });
});

require __DIR__ . '/auth.php';
