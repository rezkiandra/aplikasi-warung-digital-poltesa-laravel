@extends('layouts.authenticated')
@section('title', 'Detail Penjual')
@section('content')
  <x-detail-breadcrumbs :id="'Seller ID #' . $seller_id" :created="date('d F Y, H:i:s', strtotime($seller->created_at)) > '12.00'
      ? date('d F Y, H:i:s', strtotime($seller->created_at)) . ' PM'
      : date('d F Y, H:i:s', strtotime($seller->created_at)) . ' AM'" />

  <div class="row">
    <div class="col-lg-4 col-md-12">
      <div class="card mb-4">
        <x-detail-form :image="asset('storage/' . $seller->image)" :name="$seller->full_name" :id="'#' . $seller_id" :phone="$seller->phone_number" :address="$seller->address"
          :status="$seller->status" :totalOrder="$totalProducts" :labelOrder="'Produk'" :spentCost="'Rp ' . $totalEarnings" :labelCost="'Pendapatan'" :username="$username"
          :email="$email" :status="$seller->status" :type="'button'" :href="route('admin.edit.seller', $seller->uuid)" :variant="'primary'"
          :icon="'pencil-outline'" :label="'Edit Details'" :class="'btn-sm'" :bank="$bank[$seller->bank_account_id]" :account="$seller->account_number" />
      </div>
    </div>

    <x-detail-card-content>
      @if ($products->count() > 0)
        <x-products-seller-detail :datas="$products" :title="'Produk terbaru'" />
      @endif
    </x-detail-card-content>
  </div>
@endsection
