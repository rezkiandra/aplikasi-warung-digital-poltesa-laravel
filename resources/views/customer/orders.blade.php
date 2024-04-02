@php
  $countOrder = \App\Models\Order::where('customer_id', Auth::user()->customer->id)->count();
  $countUnpaid = \App\Models\Order::where('customer_id', Auth::user()->customer->id)
      ->where('status', 'unpaid')
      ->count();
  $countPaid = \App\Models\Order::where('customer_id', Auth::user()->customer->id)
      ->where('status', 'paid')
      ->count();
  $countCancelled = \App\Models\Order::where('customer_id', Auth::user()->customer->id)
      ->where('status', 'cancelled')
      ->count();
@endphp

@extends('layouts.authenticated')
@section('title', 'Orders')
@section('content')
  <h4 class="mb-1">Orders</h4>
  <p class="mb-3">List of orders</p>

  <x-detail-order>
    <x-detail-order-item :label="'Total Orders'" :icon="'wallet-giftcard'" :class="'border-end'" :variant="'primary'" :condition="$countOrder" />
    <x-detail-order-item :label="'Unpaid'" :icon="'wallet-outline'" :class="'border-end'" :variant="'danger'" :condition="$countUnpaid" />
    <x-detail-order-item :label="'Completed'" :icon="'check-all'" :class="'border-end'" :variant="'success'" :condition="$countPaid" />
    <x-detail-order-item :label="'Cancelled'" :icon="'alert-circle-outline'" :variant="'dark'" :condition="$countCancelled" />
  </x-detail-order>

  <x-order-tabel :orders="$orders" />
@endsection

@push('scripts')
  <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
  <script type="text/javascript">
    document.getElementById('pay-button').onclick = function() {
      snap.pay('{{ $snapToken }}', {
        onSuccess: function(result) {
          document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        onPending: function(result) {
          document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        },
        onError: function(result) {
          document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
        }
      });
    };
  </script>
@endpush
