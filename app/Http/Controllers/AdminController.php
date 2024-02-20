<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Customer;
use App\Models\Products;
use App\Models\BankAccount;
use Illuminate\Http\Request;
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

	public function levels()
	{
		$levels = Level::all();
		return view('admin.levels.index', compact('levels'));
	}

	public function product_category()
	{
		$category = ProductCategory::all();
		return view('admin.product_category.index', compact('category'));
	}

	public function bank_account()
	{
		$bank_account = BankAccount::all();
		return view('admin.bank_account.index', compact('bank_account'));
	}

	public function settings()
	{
		return view('admin.settings');
	}
}
