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
  $titleSpent = 'Pengeluaran Tanpa PPN 1%';
  $spentValue = 'Rp ' . number_format($spent->sum('total_price'), 0, ',', '.');
  $descriptionSpent = 'Total pengeluaran keseluruhan';

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

  $topProducts = \App\Models\Order::select('product_id', DB::raw('SUM(quantity) as total'))
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->groupBy('product_id')
      ->orderBy('total', 'desc')
      ->orderBy('products.price', 'desc')
      ->take(5)
      ->get();

  // Graph Content
  $labelCart = 'Keranjang Produk';
  $valueCart = \App\Models\ProductsCart::where('customer_id', auth()->user()->customer->id)->count();

  $labelWishlist = 'Wishlist Produk';
  $valueWishlist = \App\Models\Wishlist::where('customer_id', auth()->user()->customer->id)->count();
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

    <x-bar-graph-card :height="'300'" :title="'Pengeluaran Tahun Ini (' . date('Y') . ')'" :id="'monthlySpentCost'" :class="'col-lg-8 col-md-12 col-12'" />
    <x-top-products-card :datas="$topProducts" :title="'Pembelian Produk Teratas 🎉'" :class="'col-12 col-lg-4 col-md-12'" />

    <x-earnings-card :title="$titleSpent" :description="$descriptionSpent" :earnings="$spentValue" :class="'col-lg-6 col-md-12 col-12'" />
    <x-four-card>
      <x-graph-card-content :label="$labelCart" :value="$valueCart" :icon="'cart-outline'" :variant="'info'" />
      <x-graph-card-content :label="$labelWishlist" :value="$valueWishlist" :icon="'star-outline'" :variant="'warning'" />
    </x-four-card>

    <x-order-table-card :datas="$orders" />
  </x-content-card>
@endsection

@push('scripts')
  <script>
    var ctx = document.getElementById('monthlySpentCost');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: @json($data['labels']),
        datasets: [{
          label: 'Total Pengeluaran',
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
