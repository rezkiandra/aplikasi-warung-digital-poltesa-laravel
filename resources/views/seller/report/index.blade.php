@extends('layouts.authenticated')
@section('title', 'Laporan Transaksi')
@section('content')
  <h4 class="mb-1">Laporan Transaksi</h4>
  <p class="mb-3">Daftar transaksi yang telah dilakukan oleh pelanggan yang membeli produk anda</p>

  <div class="card mb-4">
    <div class="card-body">
      <form id="filter" method="GET" action="">
        <div class="row">
          <div class="col-lg-6 col-12 col-md-12">
            <x-form-floating>
              <x-input-form-label :type="'date'" :label="'Dari Tanggal'" :name="'from'" :placeholder="'Select Date'"
                :value="old('from')" />
            </x-form-floating>
          </div>
          <div class="col-lg-6 col-12 col-md-12">
            <x-form-floating>
              <x-input-form-label :type="'date'" :label="'Sampai Tanggal'" :name="'to'" :placeholder="'Select Date'"
                :value="old('to')" />
            </x-form-floating>
          </div>
        </div>
        <x-submit-button :type="'submit'" :variant="'primary w-100'" :label="'Filter'" />
      </form>
    </div>
  </div>

  @if ($filter->count() > 0)
    <x-report-tabel :datas="$filter" />
  @endif
@endsection
