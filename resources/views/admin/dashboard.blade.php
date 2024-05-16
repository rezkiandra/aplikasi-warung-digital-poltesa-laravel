@php
  $alertMessage =
      'Anda memiliki kendali penuh terhadap aplikasi ini. Jadilah seorang administrator yang bertanggung jawab!!';
  // Greetings Card
  $message = 'Dashboard admin berisi informasi tentang transaksi, pengguna, penjual, dan produk';
  $greetings = 'Halo, ' . auth()->user()->name;
  $descriptionGreetings = 'Selamat datang di dashboard admin';
  $label = 'Total Pengguna';
  $value = \App\Models\User::count();
  $actionLabel = 'Selengkapnya';
  $route = route('admin.users');

  // Transaction Card
  $title = 'Data Master';
  $description = 'Total data master dibulan ini';

  // Transaction Item Card
  $totalSeller = \App\Models\Seller::count();
  $totalCustomer = \App\Models\Customer::count();
  $totalProduct = \App\Models\Products::count();
  $totalOrder = \App\Models\Order::count();

  // Top Card Content
  $topSellers = \App\Models\Order::selectRaw('seller_id, count(*) as total')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->join('sellers', 'products.seller_id', '=', 'sellers.id', 'left')
      ->where('orders.status', 'paid')
      ->groupBy('seller_id')
      ->selectRaw('SUM(orders.total_price) as total_price')
      ->orderBy('total_price', 'desc')
      ->take(5)
      ->get();

  $topCustomers = \App\Models\Order::selectRaw('customer_id, count(*) as total')
      ->where('orders.status', 'paid')
      ->groupBy('customer_id')
      ->orderBy('total', 'desc')
      ->take(5)
      ->get();

  $topProducts = \App\Models\Order::selectRaw('product_id, count(*) as total')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('orders.status', 'paid')
      ->groupBy('product_id')
      ->orderBy('total', 'desc')
      ->take(5)
      ->get();

  $users = \App\Models\User::with('seller', 'customer')->orderBy('role_id', 'asc')->paginate(8);
@endphp

@extends('layouts.authenticated')
@section('title', 'Dashboard')
@push('styles')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content')
  <x-customer-dashboard-card :description="$alertMessage" />
  <x-content-card>
    <x-greetings-card :greetings="$greetings" :description="$descriptionGreetings" :label="$label" :value="$value" :actionLabel="$actionLabel"
      :route="$route" />
    <x-transactions-card :title="$title" :description="$description">
      <x-transaction-item-card :label="'Penjual'" :value="$totalSeller" :variant="'info'" :icon="'account-group-outline'" />
      <x-transaction-item-card :label="'Pelanggan'" :value="$totalCustomer" :variant="'success'" :icon="'account-multiple-outline'" />
      <x-transaction-item-card :label="'Produk'" :value="$totalProduct" :variant="'warning'" :icon="'package'" />
      <x-transaction-item-card :label="'Pesanan'" :value="$totalOrder" :variant="'danger'" :icon="'basket-outline'" />
    </x-transactions-card>

    <x-bar-graph-card :height="'300'" :title="'Transaksi Bulanan Tahun Ini'" />

    <x-top-sellers-card :datas="$topSellers" :title="'Penjual Teratas 🎉'" />
    <x-top-customers-card :datas="$topCustomers" :title="'Pelanggan Teratas 🎉'" />
    <x-top-products-card :datas="$topProducts" :title="'Produk Teratas 🎉'" />

    <x-user-table-card :datas="$users" />
  </x-content-card>
@endsection

@push('scripts')
  <script>
    var ctx = document.getElementById('monthlyOrders');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: @json($data['labels']),
        datasets: [{
            label: 'Paid',
            data: @json($data['paid']),
            backgroundColor: 'rgba(86, 202, 0, 0.5)',
            borderColor: 'rgba(86, 202, 0, 1)',
            borderWidth: 1,
            tension: 0
          },
          {
            label: 'Unpaid',
            data: @json($data['unpaid']),
            backgroundColor: 'rgba(255, 180, 0, 0.5)',
            borderColor: 'rgba(255, 180, 0, 1)',
            borderWidth: 1,
            tension: 0
          },
          {
            label: 'Expire',
            data: @json($data['expire']),
            backgroundColor: 'rgba(255, 76, 81, 0.5)',
            borderColor: 'rgba(255, 76, 81, 1)',
            borderWidth: 1,
            tension: 0
          },
          {
            label: 'Cancel',
            data: @json($data['cancel']),
            backgroundColor: 'rgba(2, 11, 12, 0.5)',
            borderColor: 'rgba(2, 11, 12, 1)',
            borderWidth: 1,
            tension: 0
          },
        ],
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
            max: 100
          }
        },
        plugins: {
          legend: {
            display: true,
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
