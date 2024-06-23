<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Role;
use App\Models\User;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Customer;
use App\Models\Products;
use App\Models\BankAccount;
use App\Models\ProductCategory;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
  public function dashboard()
  {
    $bulanJan = date('01');
    $bulanFeb = date('02');
    $bulanMar = date('03');
    $bulanApr = date('04');
    $bulanMei = date('05');
    $bulanJun = date('06');
    $bulanJul = date('07');
    $bulanAgu = date('08');
    $bulanSep = date('09');
    $bulanOkt = date('10');
    $bulanNov = date('11');
    $bulanDes = date('12');

    $tahun = Carbon::now()->year;
    $data = [
      'labels'  => ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
      'sudah bayar'    => [
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJan)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanFeb)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMar)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanApr)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMei)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJun)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJul)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanAgu)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanSep)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanOkt)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanNov)->count(),
        Order::where('status', 'sudah bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanDes)->count(),
      ],
      'belum bayar'  => [
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJan)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanFeb)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMar)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanApr)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMei)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJun)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJul)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanAgu)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanSep)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanOkt)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanNov)->count(),
        Order::where('status', 'belum bayar')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanDes)->count(),
      ],
      'kadaluarsa'  => [
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJan)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanFeb)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMar)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanApr)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMei)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJun)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJul)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanAgu)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanSep)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanOkt)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanNov)->count(),
        Order::where('status', 'kadaluarsa')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanDes)->count(),
      ],
      'dibatalkan'  => [
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMar)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanFeb)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMar)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanApr)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanMei)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJun)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanJul)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanAgu)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanSep)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanOkt)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanNov)->count(),
        Order::where('status', 'dibatalkan')->whereYear('created_at', $tahun)->whereMonth('created_at', $bulanDes)->count(),
      ],
    ];

    return view('admin.dashboard', compact('data'));
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

  public function detailOrder(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->first();
    return view('admin.orders.detail', compact('order'));
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
