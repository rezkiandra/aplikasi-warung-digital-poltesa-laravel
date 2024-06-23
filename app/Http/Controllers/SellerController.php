<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Seller;
use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class SellerController extends Controller
{
  public function dashboard()
  {
    if (auth()->user()->seller) {
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
        'data'    => [
          Order::join('products', 'products.id', '=', 'orders.product_id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('status', 'sudah bayar')->whereYear('orders.created_at', $tahun)->whereMonth('orders.created_at', $bulanJan)->sum('total_price'),
          Order::join('products', 'products.id', '=', 'orders.product_id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('status', 'sudah bayar')->whereYear('orders.created_at', $tahun)->whereMonth('orders.created_at', $bulanFeb)->sum('total_price'),
          Order::join('products', 'products.id', '=', 'orders.product_id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('status', 'sudah bayar')->whereYear('orders.created_at', $tahun)->whereMonth('orders.created_at', $bulanMar)->sum('total_price'),
          Order::join('products', 'products.id', '=', 'orders.product_id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('status', 'sudah bayar')->whereYear('orders.created_at', $tahun)->whereMonth('orders.created_at', $bulanApr)->sum('total_price'),
          Order::join('products', 'products.id', '=', 'orders.product_id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('status', 'sudah bayar')->whereYear('orders.created_at', $tahun)->whereMonth('orders.created_at', $bulanMei)->sum('total_price'),
          Order::join('products', 'products.id', '=', 'orders.product_id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('status', 'sudah bayar')->whereYear('orders.created_at', $tahun)->whereMonth('orders.created_at', $bulanJun)->sum('total_price'),
          Order::join('products', 'products.id', '=', 'orders.product_id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('status', 'sudah bayar')->whereYear('orders.created_at', $tahun)->whereMonth('orders.created_at', $bulanJul)->sum('total_price'),
          Order::join('products', 'products.id', '=', 'orders.product_id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('status', 'sudah bayar')->whereYear('orders.created_at', $tahun)->whereMonth('orders.created_at', $bulanAgu)->sum('total_price'),
          Order::join('products', 'products.id', '=', 'orders.product_id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('status', 'sudah bayar')->whereYear('orders.created_at', $tahun)->whereMonth('orders.created_at', $bulanSep)->sum('total_price'),
          Order::join('products', 'products.id', '=', 'orders.product_id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('status', 'sudah bayar')->whereYear('orders.created_at', $tahun)->whereMonth('orders.created_at', $bulanOkt)->sum('total_price'),
          Order::join('products', 'products.id', '=', 'orders.product_id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('status', 'sudah bayar')->whereYear('orders.created_at', $tahun)->whereMonth('orders.created_at', $bulanNov)->sum('total_price'),
          Order::join('products', 'products.id', '=', 'orders.product_id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('status', 'sudah bayar')->whereYear('orders.created_at', $tahun)->whereMonth('orders.created_at', $bulanDes)->sum('total_price'),
        ],
      ];

      $earnings = Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
        ->where('products.seller_id', auth()->user()->seller->id)
        ->where('orders.status', 'sudah bayar')
        ->orderBy('orders.created_at', 'desc')
        ->take(5)
        ->get();
      $titleEarnings = 'Total Pendapatan';
      $earningsValue = 'Rp ' . number_format($earnings->sum('total_price'), 0, ',', '.');
      $descriptionEarnings = 'Total pendapatan keseluruhan';

      $totalPaid = Order::join('products', 'orders.product_id', '=', 'products.id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('orders.status', 'sudah bayar')->count();
      $totalUnpaid = Order::join('products', 'orders.product_id', '=', 'products.id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('orders.status', 'belum bayar')->count();
      $totalExpire = Order::join('products', 'orders.product_id', '=', 'products.id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('orders.status', 'kadaluarsa')->count();
      $totalCancelled = Order::join('products', 'orders.product_id', '=', 'products.id', 'left')->where('products.seller_id', auth()->user()->seller->id)->where('orders.status', 'dibatalkan')->count();

      $topCustomers = Order::selectRaw('customer_id, count(*) as total')
        ->join('products', 'orders.product_id', '=', 'products.id', 'left')
        ->where('products.seller_id', auth()->user()->seller->id)
        ->where('orders.status', 'sudah bayar')
        ->groupBy('customer_id')
        ->orderBy('total', 'desc')
        ->take(5)
        ->get();

      $topProducts = Order::selectRaw('product_id, count(*) as total')
        ->join('products', 'orders.product_id', '=', 'products.id', 'left')
        ->where('products.seller_id', auth()->user()->seller->id)
        ->where('orders.status', 'sudah bayar')
        ->groupBy('product_id')
        ->selectRaw('SUM(orders.quantity) as total')
        ->orderBy('product_id', 'asc')
        ->take(5)
        ->get();

      $products = Products::where('seller_id', Auth::user()->seller->id)->orderBy('created_at', 'desc')->paginate(6) ?? collect([]);
      return view('seller.dashboard', compact('products', 'data', 'titleEarnings', 'earningsValue', 'descriptionEarnings', 'totalPaid', 'totalUnpaid', 'totalExpire', 'totalCancelled', 'topCustomers', 'topProducts'));
    } else {
      $products = collect([]);
      return view('seller.anonymous', compact('products'));
    }
  }

  public function orders()
  {
    $orders = Order::where('seller_id', auth()->user()->seller->id)->orderBy('orders.id', 'desc')->paginate(10);
    $totalPaid = Order::where('seller_id', auth()->user()->seller->id)->where('orders.status', 'sudah bayar')->count();
    $totalUnpaid = Order::where('seller_id', auth()->user()->seller->id)->where('orders.status', 'belum bayar')->count();
    $totalExpire = Order::where('seller_id', auth()->user()->seller->id)->where('orders.status', 'kadaluarsa')->count();
    $totalCancelled = Order::where('seller_id', auth()->user()->seller->id)->where('orders.status', 'dibatalkan')->count();
    return view('seller.orders.index', compact('orders', 'totalPaid', 'totalUnpaid', 'totalExpire', 'totalCancelled'));
  }

  public function orderDetail(string $uuid)
  {
    $order = Order::where('uuid', $uuid)->firstOrFail();
    return view('seller.orders.detail', compact('order'));
  }

  public function report(Request $request)
  {
    $from = Carbon::parse($request->from);
    $to = Carbon::parse($request->to);

    if ($request->from && $request->to) {
      $filter = Order::whereBetween('orders.created_at', [$from, $to])
        ->join('products', 'orders.product_id', '=', 'products.id', 'left')
        ->where('products.seller_id', Auth::user()->seller->id)
        ->get('orders.*', 'products.name, products.price, products.image');
    } else {
      $filter = collect([]);
    }

    return view('seller.report.index', compact('filter'));
  }

  public function print()
  {
    $seller = Auth::user()->seller;
    $order = Order::join('products', 'orders.product_id', '=', 'products.id', 'left')->where('products.seller_id', auth()->user()->seller->id)->get();
    return view('seller.report.print', compact('seller', 'order'));

    // $pdf = Pdf::loadView('seller.report.print', compact('seller', 'order'));
    // return $pdf->download('laporan-penjualan-' . $seller->slug . '-' . date('d-m-Y') . '.pdf');
  }

  public function settings()
  {
    $userSeller = User::where('uuid', Auth::user()->uuid)->first();
    return view('seller.settings', compact('userSeller'));
  }

  public function updateProfile(UserRequest $request, string $uuid)
  {
    $userSeller = User::where('uuid', $uuid)->firstOrFail();
    $userSeller->update([
      'uuid' => Str::uuid('id'),
      'name' => $request->name,
      'slug' => Str::slug($request->name),
      'email' => $request->email,
      'role_id' => $userSeller->role_id,
      'password' => $userSeller->password ?? Hash::make($request->new_password),
    ]);

    Alert::toast('Berhasil update profile', 'success');
    return redirect()->back();
  }
}
