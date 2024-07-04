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
                  <span class="text-truncate">
                    Durasi Perjalanan &emsp;&emsp; : {{ $data['duration'] }}
                  </span>
                  <span class="text-truncate">
                    Jarak Perjalanan &emsp;&emsp;&nbsp; : {{ $data['jarakKm'] }}
                  </span>
                  <span class="text-truncate">
                    Tarif Per Kilometer &emsp;&ensp;&nbsp; : Rp {{ $data['biayaMaxim'] }}
                  </span>
                  <br>
                  <span class="text-truncate">
                    Biaya Admin &emsp;&emsp;&emsp;&emsp;&nbsp; : Rp {{ $data['biayaAdmin'] }}
                  </span>
                  <span class="text-truncate">
                    Biaya Per Kilometer &ensp;&nbsp; : Rp {{ $data['biayaJarak'] }}
                  </span>
                  <br>
                  <span class="text-truncate">
                    Total Keseluruhan &emsp; : Rp {{ $data['biayaTotal'] }}
                  </span>
                </div>
              </div>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  {{-- <div class="row gy-3">
    @if (count($response['results'][0]['costs']) > 0)
      <div class="col col-lg col-md">
        <div class="card">
          <div class="card-body">
            <h5 class="courier-code">{{ $response['results'][0]['costs'][0]['service'] }}</h5>
            <p class="mb-1 courier-desc">Deskripsi : {{ $response['results'][0]['costs'][0]['description'] }}</p>
            @if ($response['results'][0]['name'] === 'POS Indonesia (POS)')
              <p class="mb-1 text-capitalize courier-etd">Estimasi Pengiriman :
                {{ $response['results'][0]['costs'][0]['cost'][0]['etd'] }}
              </p>
            @else
              <p class="mb-1 text-capitalize courier-etd">Estimasi Pengiriman :
                {{ $response['results'][0]['costs'][0]['cost'][0]['etd'] }}
                hari
              </p>
            @endif
            <p class="mb-3 courier-cost">Biaya : Rp
              {{ number_format($response['results'][0]['costs'][0]['cost'][0]['value'], 0, ',', '.') }}</p>
            <button type="submit" class="btn btn-sm btn-primary choose-service">Pilih Servis</button>
          </div>
        </div>
      </div>
    @endif
    @if (count($response['results'][0]['costs']) > 1)
      <div class="col col-lg col-md">
        <div class="card">
          <div class="card-body">
            <h5 class="courier-code">{{ $response['results'][0]['costs'][1]['description'] }}</h5>
            <p class="mb-1 courier-desc">Deskripsi : {{ $response['results'][0]['costs'][1]['service'] }}</p>
            @if ($response['results'][0]['name'] === 'POS Indonesia (POS)')
              <p class="mb-1 text-capitalize courier-etd">Estimasi Pengiriman :
                {{ $response['results'][0]['costs'][1]['cost'][0]['etd'] }}
              </p>
            @else
              <p class="mb-1 text-capitalize courier-etd">Estimasi Pengiriman :
                {{ $response['results'][0]['costs'][1]['cost'][0]['etd'] }}
                hari
              </p>
            @endif
            <p class="mb-3 courier-cost">Biaya : Rp
              {{ number_format($response['results'][0]['costs'][1]['cost'][0]['value'], 0, ',', '.') }}</p>
            <button type="submit" class="btn btn-sm btn-primary choose-service">Pilih Servis</button>
          </div>
        </div>
      </div>
    @endif
    @if (count($response['results'][0]['costs']) > 2)
      <div class="col col-lg col-md">
        <div class="card">
          <div class="card-body">
            <h5 class="courier-code">{{ $response['results'][0]['costs'][2]['description'] }}</h5>
            <p class="mb-1 courier-desc">Deskripsi : {{ $response['results'][0]['costs'][2]['service'] }}</p>
            @if ($response['results'][0]['name'] === 'POS Indonesia (POS)')
              <p class="mb-1 text-capitalize courier-etd">Estimasi Pengiriman :
                {{ $response['results'][0]['costs'][2]['cost'][0]['etd'] }}
              </p>
            @else
              <p class="mb-1 text-capitalize courier-etd">Estimasi Pengiriman :
                {{ $response['results'][0]['costs'][2]['cost'][0]['etd'] }}
                hari
              </p>
            @endif
            <p class="mb-3 courier-cost">Biaya : Rp
              {{ number_format($response['results'][0]['costs'][2]['cost'][0]['value'], 0, ',', '.') }}</p>
            <button type="submit" class="btn btn-sm btn-primary choose-service">Pilih Servis</button>
          </div>
        </div>
      </div>
    @endif
  </div> --}}

  <form action="{{ route('rajaongkir.storeShipping', $order->uuid) }}" method="POST" id="shippingForm">
    @csrf
    <input type="hidden" id="courierInput" name="courier">
    <input type="hidden" id="codeInput" name="code">
    <input type="hidden" id="etdInput" name="etd">
    <input type="hidden" id="priceInput" name="price">
    <input type="hidden" id="descriptionInput" name="description">
  </form>
@endsection

@push('scripts')
  <script>
    let courierInput = document.getElementById('courierInput').value
    let codeInput = document.getElementById('codeInput').value
    let etdInput = document.getElementById('etdInput').value
    let priceInput = document.getElementById('priceInput').value
    let descriptionInput = document.getElementById('descriptionInput').value
    let chooseService = document.querySelectorAll('.choose-service')
    let shippingForm = document.getElementById('shippingForm')

    chooseService.forEach((item, index) => {
      item.addEventListener('click', () => {
        courierInput = response.results[0]['name']
        codeInput = response.results[0]['costs'][index]['service']
        etdInput = response.results[0]['costs'][index]['cost'][0]['etd']
        priceInput = response.results[0]['costs'][index]['cost'][0]['value']
        descriptionInput = response.results[0]['costs'][index]['description']

        $('#courierInput').val(courierInput);
        $('#codeInput').val(codeInput);
        $('#etdInput').val(etdInput);
        $('#priceInput').val(priceInput);
        $('#descriptionInput').val(descriptionInput);

        shippingForm.submit();
      })
    })
  </script>
@endpush
