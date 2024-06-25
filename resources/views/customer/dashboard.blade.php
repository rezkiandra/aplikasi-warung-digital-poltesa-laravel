@php
  $messageAlert = 'Biodata anda sudah lengkap. Anda dapat menggunakan aplikasi ini.';
  $message = 'Dashboard penjual berisi informasi produk penjual dan transaksi';
  $greetings = 'Halo, ' . auth()->user()->customer->full_name;
  $descriptionGreetings = 'Selamat datang di dashboard customer';
  $label = 'Total Pesanan';
  $value = \App\Models\Order::where('customer_id', auth()->user()->customer->id)->count();
  $actionLabel = 'Selengkapnya';
  $route = route('customer.orders');

  $title = 'Pesanan';
  $description = 'Total pesanan akhir ini';
@endphp

@extends('layouts.authenticated')
@section('title', 'Dashboard')
@section('content')
  <x-customer-dashboard-card :description="$messageAlert" />
  <x-content-card>
    <x-greetings-card :greetings="$greetings" :description="$descriptionGreetings" :label="$label" :value="$value" :actionLabel="$actionLabel"
      :route="$route" />
    <x-transactions-card :title="$title" :description="$description">
      <x-transaction-item-card :label="'Selesai'" :value="$stats['paid']" :variant="'success'" :icon="'basket-check-outline'" />
      <x-transaction-item-card :label="'Belum Bayar'" :value="$stats['unpaid']" :variant="'warning'" :icon="'basket-off-outline'" />
      <x-transaction-item-card :label="'Kadaluarsa'" :value="$stats['expired']" :variant="'danger'" :icon="'basket-remove-outline'" />
      <x-transaction-item-card :label="'Dibatalkan'" :value="$stats['cancelled']" :variant="'dark'" :icon="'basket-minus-outline'" />
    </x-transactions-card>

    <x-bar-graph-card :height="'300'" :title="'Pengeluaran Tahun Ini (' . date('Y') . ')'" :id="'monthlySpentCost'" :class="'col-lg-8 col-md-12 col-12'" />
    <x-top-products-card :datas="$topProducts" :title="'Pembelian Produk Teratas 🎉'" :class="'col-12 col-lg-4 col-md-12'" />

    <x-earnings-card :title="$stats['titleSpent']" :description="$stats['descSpent']" :earnings="$stats['spentValue']" :class="'col-lg-6 col-md-12 col-12'" />
    <x-four-card>
      <x-graph-card-content :label="$labelCart" :value="$valueCart" :icon="'cart-outline'" :variant="'info'" />
      <x-graph-card-content :label="$labelWishlist" :value="$valueWishlist" :icon="'star-outline'" :variant="'warning'" />
    </x-four-card>

    <x-order-table-card :datas="$orders" />
  </x-content-card>
@endsection

@push('styles')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush
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
