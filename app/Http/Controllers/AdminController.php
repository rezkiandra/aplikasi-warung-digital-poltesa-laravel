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
		return view('admin.sellers', compact('sellers'));
	}

	public function customers()
	{
		$customers = Customer::all();
		return view('admin.customers', compact('customers'));
	}

	public function products()
	{
		$products = Products::all();
		return view('admin.products', compact('products'));
	}

	public function orders()
	{
		$orders = Order::all();
		return view('admin.orders', compact('orders'));
	}

	public function levels()
	{
		$levels = Level::all();
		return view('admin.levels', compact('levels'));
	}

	public function product_category()
	{
		$product_category = ProductCategory::all();
		return view('admin.product_category', compact('product_category'));
	}

	public function bank_account()
	{
		$bank_account = BankAccount::all();
		return view('admin.bank_account', compact('bank_account'));
	}
}
