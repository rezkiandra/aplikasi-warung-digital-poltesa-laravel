@php
  // Alert Card
  $messageAlert = 'Biodata anda sudah lengkap. Anda dapat menggunakan aplikasi ini.';

  // Greetings Card
  $message = 'Dashboard penjual berisi informasi produk penjual dan transaksi';
  $greetings = 'Halo, ' . auth()->user()->customer->full_name;
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
  $totalPaid = \App\Models\Order::where('customer_id', auth()->user()->customer->id)
      ->where('status', 'paid')
      ->count();
  $totalUnpaid = \App\Models\Order::where('customer_id', auth()->user()->customer->id)
      ->where('status', 'unpaid')
      ->count();
  $totalExpire = \App\Models\Order::where('customer_id', auth()->user()->customer->id)
      ->where('status', 'expire')
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
      ->take(3)
      ->get();

  // Graph Content
  $labelCart = 'Keranjang Produk';
  $valueCart = \App\Models\ProductsCart::where('customer_id', auth()->user()->customer->id)->count();

  $labelWishlist = 'Wishlist Produk';
  $valueWishlist = \App\Models\Wishlist::where('customer_id', auth()->user()->customer->id)->count();
@endphp

@extends('layouts.authenticated')
@section('title', 'Dashboard')
@section('content')
  <x-customer-dashboard-card :description="$messageAlert" />
  <x-content-card>
    <x-greetings-card :greetings="$greetings" :description="$descriptionGreetings" :label="$label" :value="$value" :actionLabel="$actionLabel"
      :route="$route" />
    <x-transactions-card :title="$title" :description="$description">
      <x-transaction-item-card :label="'Selesai'" :value="$totalPaid" :variant="'success'" :icon="'basket-check-outline'" />
      <x-transaction-item-card :label="'Belum Bayar'" :value="$totalUnpaid" :variant="'warning'" :icon="'basket-off-outline'" />
      <x-transaction-item-card :label="'Kadaluarsa'" :value="$totalExpire" :variant="'danger'" :icon="'basket-remove-outline'" />
      <x-transaction-item-card :label="'Dibatalkan'" :value="$totalCancelled" :variant="'dark'" :icon="'basket-minus-outline'" />
    </x-transactions-card>

    <x-earnings-card :title="$titleSpent" :description="$descriptionSpent" :earnings="$spentValue" />
    <x-four-card>
      <x-graph-card-content :label="$labelCart" :value="$valueCart" :icon="'cart-outline'" :variant="'info'" />
      <x-graph-card-content :label="$labelWishlist" :value="$valueWishlist" :icon="'star-outline'" :variant="'warning'" />
    </x-four-card>
    <x-top-products-card :datas="$topProducts" :title="'Pembelian Produk Teratas 🎉'" />

    <x-order-table-card :datas="$orders" />
  </x-content-card>
@endsection
