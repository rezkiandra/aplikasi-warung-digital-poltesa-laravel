<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Customer;
use App\Models\Products;
use App\Models\BankAccount;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
	public function dashboard()
	{
		return view('admin.dashboard');
	}

	public function sellers()
	{
		$sellers = Seller::all();
		return view('admin.sellers.index', compact('sellers'));
	}

	public function customers()
	{
		$customers = Customer::all();
		return view('admin.customers.index', compact('customers'));
	}

	public function users()
	{
		$users = User::all();
		return view('admin.users.index', compact('users'));
	}

	public function products()
	{
		$products = Products::all();
		return view('admin.products.index', compact('products'));
	}

	public function orders()
	{
		$orders = Order::all();
		return view('admin.orders.index', compact('orders'));
	}

	public function roles()
	{
		$roles = Role::all();
		$user_level = User::where('role_id', 1)->get('name');
		return view('admin.roles.index', compact('roles', 'user_level'));
	}

	public function product_category()
	{
		$category = ProductCategory::all();
		return view('admin.product_category.index', compact('category'));
	}

	public function bank_account()
	{
		$banks = BankAccount::all();
		return view('admin.bank_account.index', compact('banks'));
	}

	public function settings()
	{
		return view('admin.settings.index');
	}
}
