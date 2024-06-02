@php
  if (auth()->user()->seller->status === 'active') {
      $messageAlert = 'Biodata anda sudah lengkap. Anda dapat menjual berbagai produk.';
  } else {
      $messageAlert =
          'Biodata anda sudah lengkap sebagai seller. Tetapi status anda sebagai penjual masih pending. Silahkan hubungi admin untuk menyetujui sebagai penjual!';
  }
  $message = 'Dashboard penjual berisi informasi produk penjual dan transaksi';
  $greetings = 'Halo, ' . auth()->user()->seller->full_name;

  $descriptionGreetings = 'Selamat datang di dashboard seller';
  $label = 'Total Produk';
  $value = \App\Models\Products::where('seller_id', auth()->user()->seller->id)->count();
  $actionLabel = 'Selengkapnya';
  $route = route('seller.products');

  $title = 'Transaksi';
  $description = 'Total transaksi dibulan ini';

  // Earnings Card
  $earnings = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->orderBy('orders.created_at', 'desc')
      ->take(5)
      ->get();
  $titleEarnings = 'Total Pendapatan';
  $earningsValue = 'Rp ' . number_format($earnings->sum('total_price'), 0, ',', '.');
  $descriptionEarnings = 'Total pendapatan keseluruhan';

  // Transaction Item Card
  $totalPaid = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->count();
  $totalUnpaid = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'unpaid')
      ->count();
  $totalExpire = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'expire')
      ->count();
  $totalCancelled = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'cancelled')
      ->count();

  // Top Card Content
  $topCustomers = \App\Models\Order::selectRaw('customer_id, count(*) as total')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->groupBy('customer_id')
      ->orderBy('total', 'desc')
      ->take(5)
      ->get();

  $topProducts = \App\Models\Order::selectRaw('product_id, count(*) as total')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->groupBy('product_id')
      ->selectRaw('SUM(orders.quantity) as total')
      ->orderBy('product_id', 'asc')
      ->take(5)
      ->get();

  $products = \App\Models\Products::where('seller_id', auth()->user()->seller->id)->paginate(6);
@endphp

@extends('layouts.authenticated')
@section('title', 'Dashboard')
@push('styles')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
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

    <x-bar-graph-card :height="'300'" :title="'Total Pendapatan Tahun Ini (' . date('Y') . ')'" :id="'monthlyEarnings'" :class="'col-lg-8 col-md-12 col-12'" />
    <x-top-products-card :datas="$topProducts" :title="'Penjualan Produk Teratas 🎉'" :class="'col-12 col-lg-4 col-md-12'" />

    <x-earnings-card :title="$titleEarnings" :description="$descriptionEarnings" :earnings="$earningsValue" :class="'col-lg-6 col-md-6 col-12'" />
    <x-top-customers-card :datas="$topCustomers" :title="'Pelanggan Teratas 🎉'" :class="'col-lg-6 col-md-6 col-12'" />

    <x-product-table-card :datas="$products" />
  </x-content-card>
@endsection

@push('scripts')
  <script>
    var ctx = document.getElementById('monthlyEarnings');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: @json($data['labels']),
        datasets: [{
          label: 'Total Pendapatan',
          data: @json($data['data']),
          backgroundColor: 'rgba(86, 202, 0, 0.5)',
          borderColor: 'rgba(86, 202, 0, 1)',
          borderWidth: 1,
          tension: 0
        }, ],
      },
      options: {
        transitions: {
          show: {
            animations: {
              x: {
                from: 0
              },
              y: {
                from: 0
              }
            }
          },
          hide: {
            animations: {
              x: {
                to: 0
              },
              y: {
                to: 0
              }
            }
          }
        },
        animations: {
          tension: {
            duration: 5000,
            easing: 'easeInOutCubic',
            from: .2,
            to: 0,
            loop: true
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            min: 0,
            max: 1000000
          }
        },
        plugins: {
          legend: {
            display: false,
            position: 'top',
            fullSize: true,
            align: 'center',
            title: {
              display: false,
              text: 'Status Pesanan',
            }
          }
        }
      }
    });
  </script>
@endpush
