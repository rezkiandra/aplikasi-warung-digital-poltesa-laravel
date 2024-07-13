@extends('layouts.authenticated')
@section('title', 'Opsi Pengiriman')
@section('content')
  <div class="row">
    <div class="col-12 col-lg-8">
      <div class="card mb-3">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="card-title m-0">Detail Pesanan</h5>
        </div>
        <div class="card-datatable table-responsive">
          <div>
            <table class="table">
              <thead class="text-uppercase">
                <tr>
                  <th>ID Pesanan</th>
                  <th colspan="4">Produk</th>
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
                        <small class="text-truncate">{{ Str::limit($order->product->description, 120) }}</small>
                      </div>
                    </div>
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
            </table>
          </div>
        </div>
      </div>
      <div class="card mb-3">
        <div class="card-header">
          <h5 class="card-title m-0">Aktivitas Pemesanan</h5>
        </div>
        <div class="card-body">
          <ul class="timeline pb-0 mb-0">
            {{-- Row 1 --}}
            <li class="timeline-item timeline-item-transparent border-primary">
              <span class="timeline-point timeline-point-primary"></span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">Pesanan berhasil dibuat (Order ID: #<span
                      class="text-uppercase">{{ Str::substr($order->uuid, 0, 5) }}</span>)</h6>
                  <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->created_at)) }}</small>
                </div>
                <p class="mt-1 mb-3">Anda harus menyelesaikan proses pembayaran</p>
              </div>
            </li>

            {{-- Row 2 --}}
            {{-- E-Channel --}}
            @if (
                $order->payment_method &&
                    ($order->status == 'sudah bayar' || $order->status == 'kadaluarsa' || $order->status == 'belum bayar') &&
                    $order->bill_key &&
                    $order->biller_code)
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Metode pembayaran menggunakan <span
                        class="text-uppercase">{{ $order->payment_method }}</span></h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->transaction_time)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Selesaikan pembayaran sebelum
                    {{ date('d M Y, H:i:s', strtotime($order->expiry_time)) }}</p>
                </div>
              </li>
              @if ($order->status == 'sudah bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pesanan anda berhasil dibayar sebesar Rp
                        {{ number_format($order->total_price + $order->fee * $order->quantity, 0, ',', '.') }}
                      </h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda sudah membayar pesanan</p>
                  </div>
                </li>
              @elseif ($order->status == 'kadaluarsa')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pesanan anda telah kadaluarsa</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda tidak dapat membeli produk</p>
                  </div>
                </li>
              @elseif ($order->status == 'belum bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pesanan anda belum dibayar</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda harus segera membayar pesanan sebesar Rp
                      {{ number_format($order->total_price + $order->fee * $order->quantity, 0, ',', '.') }}
                    </p>
                  </div>
                </li>
              @endif

              {{-- QRIS --}}
            @elseif (
                $order->payment_method &&
                    ($order->status == 'sudah bayar' || $order->status == 'kadaluarsa' || $order->status == 'belum bayar') &&
                    $order->issuer &&
                    $order->acquirer)
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Metode pembayaran menggunakan <span
                        class="text-uppercase">{{ $order->payment_method }}</span></h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->transaction_time)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Selesaikan pembayaran sebelum
                    {{ date('d M Y, H:i:s', strtotime($order->expiry_time)) }}</p>
                </div>
              </li>
              @if ($order->status == 'sudah bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pesanan anda berhasil dibayar sebesar Rp
                        {{ number_format($order->total_price + $order->fee * $order->quantity, 0, ',', '.') }}
                      </h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda sudah membayar pesanan</p>
                  </div>
                </li>
              @elseif ($order->status == 'kadaluarsa')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pesanan anda telah kadaluarsa</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda tidak dapat membeli produk</p>
                  </div>
                </li>
              @elseif ($order->status == 'belum bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pesanan anda belum dibayar</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda harus segera membayar pesanan sebesar Rp
                      {{ number_format($order->total_price + $order->fee * $order->quantity, 0, ',', '.') }}
                    </p>
                  </div>
                </li>
              @endif

              {{-- Virtual Account --}}
            @elseif (
                $order->payment_method == 'bank_transfer' &&
                    ($order->status == 'sudah bayar' || $order->status == 'kadaluarsa' || $order->status == 'belum bayar'))
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Metode pembayaran menggunakan <span
                        class="text-uppercase">{{ $order->payment_method }}</span></h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->transaction_time)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Selesaikan pembayaran sebelum
                    {{ date('d M Y, H:i:s', strtotime($order->expiry_time)) }}</p>
                </div>
              </li>
              @if ($order->status == 'sudah bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pesanan anda berhasil dibayar sebesar Rp
                        {{ number_format($order->total_price + $order->fee * $order->quantity, 0, ',', '.') }}
                      </h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda sudah membayar pesanan</p>
                  </div>
                </li>
              @elseif ($order->status == 'kadaluarsa')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pesanan anda telah kadaluarsa</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda tidak dapat membeli produk</p>
                  </div>
                </li>
              @elseif ($order->status == 'belum bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pesanan anda belum dibayar</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda harus segera membayar pesanan sebesar Rp
                      {{ number_format($order->total_price + $order->fee * $order->quantity, 0, ',', '.') }}
                    </p>
                  </div>
                </li>
              @endif

              {{-- Alfamart / Indomaret Group --}}
            @elseif (
                $order->payment_method &&
                    ($order->status == 'sudah bayar' || $order->status == 'kadaluarsa' || $order->status == 'belum bayar') &&
                    $order->payment_code &&
                    $order->store)
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Metode pembayaran menggunakan <span
                        class="text-uppercase">{{ $order->payment_method }}</span></h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->transaction_time)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Selesaikan pembayaran sebelum
                    {{ date('d M Y, H:i:s', strtotime($order->expiry_time)) }}</p>
                </div>
              </li>
              @if ($order->status == 'sudah bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pesanan anda berhasil dibayar sebesar Rp
                        {{ number_format($order->total_price + $order->fee * $order->quantity, 0, ',', '.') }}
                      </h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda sudah membayar pesanan</p>
                  </div>
                </li>
              @elseif ($order->status == 'kadaluarsa')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pesanan anda telah kadaluarsa</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda tidak dapat membeli produk</p>
                  </div>
                </li>
              @elseif ($order->status == 'belum bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pesanan anda belum dibayar</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda harus segera membayar pesanan sebesar Rp
                      {{ number_format($order->total_price + $order->fee * $order->quantity, 0, ',', '.') }}
                    </p>
                  </div>
                </li>
              @endif
            @elseif($order->status == 'dibatalkan')
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Pesanan anda telah dibatalkan</h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Anda berhasil membatalkan pesanan</p>
                </div>
              </li>
            @endif

            {{-- Row 3 --}}
            @if ($order->status == 'sudah bayar')
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Status pesanan anda <span class="text-uppercase badge bg-label-success">
                        Berhasil Dibayar</span></h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Pesanan selesai. Anda dapat melihat detail pesanan dan mencetaknya sebagai bukti
                    transaksi
                  </p>
                </div>
              </li>
            @elseif ($order->status == 'dibatalkan')
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Status pesanan anda <span class="text-uppercase badge bg-label-dark">
                        Dibatalkan</span></h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Anda dapat membeli kembali produk dari pesanan ini</p>
                </div>
              </li>
            @elseif ($order->status == 'kadaluarsa')
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Status pesanan anda <span
                        class="text-uppercase badge bg-label-danger">Kadaluarsa</span></h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->updated_at)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Anda dapat membeli kembali produk dari pesanan ini</p>
                </div>
              </li>
            @endif
          </ul>
        </div>
      </div>
      @if ($order->status == 'belum bayar')
        <div class="card card-body text-dark mb-3">
          <h5 class="card-title mb-3">Ketentuan Berlaku :</h5>
          <ol>
            <li class="mb-1">Jika sudah memilih metode pembayaran. Anda tidak dapat membatalkan pesanan!</li>
            <li class="mb-0">Jika anda ingin membatalkan pesanan, silahkan tunggu hingga waktu pembayaran sudah habis
            </li>
          </ol>
        </div>
      @endif
      <div class="d-flex justify-content-center align-items-center gap-3 mb-3">
        <x-basic-button :label="'Batalkan Pesanan'" :class="'w-100'" :variant="'dark'" :icon="'basket-minus-outline me-2'" :href="route('midtrans.cancelled', $order->uuid)" />
      </div>
    </div>
    <div class="col-12 col-lg-4">
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title mb-3">Detail Penjual</h5>
          <div class="d-flex justify-content-start align-items-center mb-4">
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
          <div class="d-flex justify-content-between">
            <h6 class="mb-1">Info Kontak</h6>
          </div>
          <p class="mb-1">Email : {{ $order->product->seller->user->email }}</p>
          <p class="mb-1">Nomor HP : {{ $order->product->seller->phone_number }}</p>
          <p class="mb-0">Alamat : {{ $order->product->seller->address }}</p>
        </div>
      </div>

      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title mb-3">Detail Pelanggan</h5>
          <div class="d-flex justify-content-start align-items-center mb-4">
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
          <div class="d-flex justify-content-between">
            <h6 class="mb-1">Info Kontak</h6>
          </div>
          <p class="mb-1">Email : {{ $order->customer->user->email }}</p>
          <p class="mb-1">Nomor HP : {{ $order->customer->phone_number }}</p>
          <p class="mb-0">Alamat : {{ $order->customer->address }}</p>
        </div>
      </div>

      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title mb-4">Opsi Pengiriman</h5>
          <form action="" method="POST" id="form-ongkir">
            @csrf
            <x-form-floating>
              <x-input-form-label :label="'Metode Pengiriman'" :name="'order_type'" :type="'select'" :options="$data['order_type']"
                :select="'Pilih Metode Pengiriman'" :value="old('order_type')" />
            </x-form-floating>

            <x-form-floating :class="'courier'">
              <x-input-form-label :label="'Kurir'" :name="'courier'" :type="'select'" :options="$data['courier']"
                :select="'Pilih Kurir'" />
            </x-form-floating>

            <x-submit-button :label="'Submit'" id="btn-submit" :type="'submit'" :variant="'primary w-100'"
              :icon="'check-circle-outline'" />
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script>
    let orderType = document.getElementById('order_type')
    let courier = document.getElementById('courier')

    if (orderType.value == 'jasa kirim') {
      courier.disabled = false
      $('#btn-submit').html('<i class="mdi mdi-truck-fast-outline me-1"></i>Cek Ongkos Kirim');
    } else {
      courier.disabled = true
    }

    orderType.onchange = function() {
      if (orderType.value == 'jasa kirim') {
        courier.disabled = false
        $('#btn-submit').html('<i class="mdi mdi-truck-fast-outline me-1"></i>Cek Ongkos Kirim');
      } else {
        courier.disabled = true
        courier.value = 'Pilih Kurir'
        $('#btn-submit').html('<i class="mdi mdi-check-circle-outline me-1"></i>Submit');
      }
    }

    courier.onfocus = function() {
      if (orderType.value == 'jasa kirim') {
        $('#btn-submit').html('<i class="mdi mdi-truck-fast-outline me-1"></i>Cek Ongkos Kirim');
      }
    }
  </script>
@endpush
