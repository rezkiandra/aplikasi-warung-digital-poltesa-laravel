@extends('layouts.authenticated')
@section('title', 'Laporan Transaksi')
@section('content')
  <h4 class="mb-1">Laporan Transaksi</h4>
  <p class="mb-3">Daftar transaksi yang telah dilakukan oleh pelanggan yang membeli produk anda</p>

  <div class="card mb-4">
    <div class="card-body">
      <form id="filterForm" method="GET">
        <div class="row">
          <div class="col-lg-6 col-12 col-md-12">
            <x-form-floating>
              <x-input-form-label :type="'date'" :label="'Dari Tanggal'" :name="'from_date'" :placeholder="'Select Date'"
                :value="old('from_date')" />
            </x-form-floating>
          </div>
          <div class="col-lg-6 col-12 col-md-12">
            <x-form-floating>
              <x-input-form-label :type="'date'" :label="'Sampai Tanggal'" :name="'to_date'" :placeholder="'Select Date'"
                :value="old('to_date')" />
            </x-form-floating>
          </div>
        </div>
        <x-submit-button :type="'button'" :variant="'primary w-100'" :label="'Filter'" :id="'filterButton'" />
      </form>
    </div>
  </div>

  <div id="filterResult"></div>
@endsection


@push('scripts')
  <script>
    $(document).on('click', '#filterButton', function() {
      var formData = $('#filterForm').serialize();

      $.ajax({
        type: "GET",
        url: "{{ route('seller.report') }}",
        data: formData,
        success: function(data) {
          $('#filterResult').html(data);
        },
        error: function(data) {
          console.log(data);
        }
      });
    })
  </script>
@endpush
