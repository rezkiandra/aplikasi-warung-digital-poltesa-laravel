@php
  // Greetings Card
  $message = 'Dashboard penjual berisi informasi produk penjual dan transaksi';
  $greetings = 'Halo, ' . auth()->user()->name;
  $descriptionGreetings = 'Selamat datang di dashboard customer';
  $label = 'Total Pesanan';
  $value = \App\Models\Order::where('customer_id', auth()->user()->customer->id)->count();
  $actionLabel = 'Selengkapnya';
  $route = route('customer.orders');

  // Transaction Card
  $title = 'Pesanan';
  $description = 'Total pesanan akhir ini';

  // Earnings Card
  $spent = \App\Models\Order::where('customer_id', auth()->user()->customer->id)
      ->where('status', 'paid')
      ->get();
  $titleSpent = 'Total Pengeluaran';
  $spentValue = 'Rp ' . number_format($spent->sum('total_price'), 0, ',', '.');
  $descriptionSpent = 'Total pengeluaran akhir ini';

  // Transaction Item Card
  $totalOrders = \App\Models\Order::where('customer_id', auth()->user()->customer->id)->count();
  $totalPaid = \App\Models\Order::where('customer_id', auth()->user()->customer->id)
      ->where('status', 'paid')
      ->count();
  $totalUnpaid = \App\Models\Order::where('customer_id', auth()->user()->customer->id)
      ->where('status', 'unpaid')
      ->count();
  $totalCancelled = \App\Models\Order::where('customer_id', auth()->user()->customer->id)
      ->where('status', 'cancelled')
      ->count();

  $topProducts = \App\Models\Order::selectRaw('product_id, sum(quantity) as total')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('orders.customer_id', auth()->user()->customer->id)
      ->where('orders.status', 'paid')
      ->groupBy('product_id')
      ->orderBy('total', 'desc')
      ->take(5)
      ->get();

  // Graph Content
  $labelCart = 'Keranjang Produk';
  $valueCart = \App\Models\ProductsCart::where('customer_id', auth()->user()->customer->id)->count();

  $labelWishlist = 'Wishlist Produk';
  $valueWishlist = \App\Models\Wishlist::where('customer_id', auth()->user()->customer->id)->count();

  $orders = \App\Models\Order::where('customer_id', auth()->user()->customer->id)->paginate(8);
@endphp

@extends('layouts.authenticated')
@section('title', 'Dashboard')
@section('content')
  <x-content-card>
    <x-greetings-card :greetings="$greetings" :description="$descriptionGreetings" :label="$label" :value="$value" :actionLabel="$actionLabel"
      :route="$route" />
    <x-transactions-card :title="$title" :description="$description">
      <x-transaction-item-card :label="'Jumlah Pesanan'" :value="$totalOrders" :variant="'info'" :icon="'account-group-outline'" />
      <x-transaction-item-card :label="'Selesai'" :value="$totalPaid" :variant="'success'" :icon="'account-multiple-outline'" />
      <x-transaction-item-card :label="'Belum Dibayar'" :value="$totalUnpaid" :variant="'warning'" :icon="'package'" />
      <x-transaction-item-card :label="'Dibatalkan'" :value="$totalCancelled" :variant="'danger'" :icon="'basket-outline'" />
    </x-transactions-card>

    <x-top-products-card :datas="$topProducts" :title="'Pembelian Produk Teratas 🎉'" />
    <x-earnings-card :title="$titleSpent" :description="$descriptionSpent" :earnings="$spentValue" />

    <x-four-card>
      <x-graph-card-content :label="$labelCart" :value="$valueCart" :icon="'cart-outline'" :variant="'info'" />
      <x-graph-card-content :label="$labelWishlist" :value="$valueWishlist" :icon="'star-outline'" :variant="'warning'" />
    </x-four-card>

    <x-order-table-card :datas="$orders" />
  </x-content-card>
@endsection
