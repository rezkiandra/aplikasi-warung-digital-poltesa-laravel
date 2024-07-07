@extends('layouts.authenticated')
@section('title', 'Detail Pengiriman')
@section('content')
  <div class="row">
    <div class="col col-lg col-md">
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title mb-3 d-flex align-items-center">
            <i class="mdi mdi-store mdi-24px me-2"></i>
            <span>Detail Alamat Penjual</span>
          </h5>
          <div class="d-flex justify-content-start align-items-center mb-3">
            <div class="avatar me-3">
              <img src="{{ asset('storage/' . $order->product->seller->image) }}"
                alt="{{ $order->product->seller->full_name }}" class="rounded-circle">
            </div>
            <div class="d-flex flex-column">
              <a href="app-user-view-account.html">
                <h6 class="mb-0">{{ $order->product->seller->full_name }}</h6>
              </a>
              <span>Seller ID: #<span
                  class="text-uppercase">{{ Str::substr($order->product->seller->uuid, 0, 5) }}</span></span>
            </div>
          </div>
          <p class="mb-1 text-dark">Alamat Asal : {{ $order->seller->address }}</p>
        </div>
      </div>
    </div>
    <div class="col col-lg col-md">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title mb-3 d-flex align-items-center">
            <i class="mdi mdi-account-details mdi-24px me-2"></i>
            <span>Detail Alamat Pembeli</span>
          </h5>
          <div class="d-flex justify-content-start align-items-center mb-3">
            <div class="avatar me-3">
              <img src="{{ asset('storage/' . $order->customer->image) }}" alt="{{ $order->customer->full_name }}"
                class="rounded-circle">
            </div>
            <div class="d-flex flex-column">
              <a href="app-user-view-account.html">
                <h6 class="mb-0">{{ $order->customer->full_name }}</h6>
              </a>
              <span>Customer ID: #<span
                  class="text-uppercase">{{ Str::substr($order->customer->uuid, 0, 5) }}</span></span>
            </div>
          </div>
          <p class="mb-1 text-dark">Alamat Tujuan : {{ $order->customer->address }}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-header d-flex justify-content-between align-items-center">
      <h5 class="card-title mb-0 d-flex align-items-center">
        <i class="mdi mdi-cart-variant mdi-24px me-2"></i>
        <span>Detail Pesanan</span>
      </h5>
    </div>
    <div class="card-datatable table-responsive">
      <div>
        <table class="table">
          <thead class="text-uppercase">
            <tr>
              <th>ID Pesanan</th>
              <th>Produk</th>
              <th>Kurir</th>
            </tr>
          </thead>
          <tbody>
            <tr class="even">
              <td>
                <span class="badge bg-label-primary text-uppercase">#{{ Str::substr($order->uuid, 0, 5) }}</span>
              </td>
              <td class="sorting_1">
                <div class="d-flex justify-content-start align-items-center product-name">
                  <div class="avatar-wrapper me-3">
                    <div class="avatar avatar-sm rounded-2 bg-label-secondary"><img
                        src="{{ asset('storage/' . $order->product->image) }}" alt="{{ $order->product->name }}"
                        class="rounded-2">
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    <span class="text-nowrap text-heading fw-medium">{{ $order->product->name }}</span>
                    <small class="text-truncate">{{ Str::limit($order->product->description, 150) }}</small>
                  </div>
                </div>
              </td>
              <td>
                <span class="text-capitalize text-dark">{{ $data['courier'] }}</span>
              </td>
            </tr>
          </tbody>
          <tr>
            <td colspan="4" class="text-start text-dark">
              <div class="d-flex justify-content-start align-items-center my-2">
                <div class="d-flex flex-column align-items-start justify-content-end">
                  <span class="text-nowrap text-heading fw-medium mb-3">Rincian Pesanan (IDR)</span>
                  <span class="text-truncate">
                    Quantity &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; : {{ $order->quantity }}
                    {{ $order->product->unit }}
                  </span>
                  <span class="text-truncate">
                    Berat &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : {{ $order->product->weight }} gram
                  </span>
                  <span class="text-truncate">
                    Subtotal Produk &emsp;&emsp;&ensp;&nbsp; : Rp
                    {{ number_format($order->product->price, 0, ',', '.') }}
                  </span>
                  <br>
                  <span class="text-truncate">
                    Total Harga Produk &emsp; : Rp {{ number_format($order->total_price, 0, ',', '.') }}
                  </span>
                </div>
              </div>
            </td>
          </tr>
          <tr>
            <td colspan="4" class="text-start text-dark">
              <div class="d-flex justify-content-start align-items-center my-2">
                <div class="d-flex flex-column align-items-start justify-content-end">
                  <span class="text-nowrap text-heading fw-medium mb-3">Rincian Pengiriman</span>
                  <span class="text-truncate" id="etdInput">
                    Durasi Perjalanan &emsp;&emsp; : {{ $data['duration'] }}
                  </span>
                  <span class="text-truncate" id="descriptionInput">
                    Jarak Perjalanan &emsp;&emsp;&nbsp; : {{ $data['jarakKm'] }}
                  </span>
                  <br>
                  <span class="text-truncate">
                    Biaya Per Kilometer &emsp; : Rp {{ number_format($data['biayaMaxim'], 0, ',', '.') }}
                  </span>
                  {{-- <span class="text-truncate">
                    Biaya Admin &emsp;&emsp;&emsp;&emsp;&nbsp; : Rp {{ number_format($data['biayaAdmin'], 0, ',', '.') }}
                  </span> --}}
                  <span class="text-truncate" id="priceInput">
                    Biaya Pengiriman &emsp;&emsp; : Rp {{ number_format($data['biayaJarak'], 0, ',', '.') }}
                  </span>
                  <br>
                  <span class="text-truncate">
                    Total Keseluruhan &emsp;&emsp;: Rp {{ number_format($data['biayaTotal'], 0, ',', '.') }}
                  </span>
                </div>
              </div>
            </td>
          </tr>
        </table>
        <div class="p-3">
          <button type="submit" class="btn btn-sm btn-primary choose-service">Konfirmasi Pengiriman</button>
        </div>
      </div>
    </div>
  </div>

  <form action="{{ route('rajaongkir.storeShipping', $order->uuid) }}" method="POST" id="shippingForm">
    @csrf
    <input type="hidden" id="courierInput" name="courier" value="{{ $data['courier'] }}">
    <input type="hidden" id="codeInput" name="code"
      value="{{ Str::upper($data['courier']) . time() . Str::random(5) }}">
    <input type="hidden" id="etdInput" name="etd" value="{{ $data['duration'] }}">
    <input type="hidden" id="priceInput" name="price" value="{{ $data['biayaJarak'] }}">
    <input type="hidden" id="descriptionInput" name="description" value="{{ $data['jarakKm'] }}">
  </form>
@endsection

@push('scripts')
  <script>
    function updateInputs() {
      let courierInput = document.getElementById('courierInput').value;
      let codeInput = document.getElementById('codeInput').value;
      let etdInput = document.getElementById('etdInput').value;
      let priceInput = document.getElementById('priceInput').value;
      let descriptionInput = document.getElementById('descriptionInput').value;

      $('#courierInput').val(courierInput);
      $('#codeInput').val(codeInput);
      $('#etdInput').val(etdInput);
      $('#priceInput').val(priceInput);
      $('#descriptionInput').val(descriptionInput);
    }

    function handleServiceClick() {
      updateInputs();
      document.getElementById('shippingForm').submit();
    }

    document.querySelectorAll('.choose-service').forEach(service => {
      service.addEventListener('click', handleServiceClick);
    });
  </script>
@endpush
