@extends('layouts.authenticated')
@section('title', 'Edit Pesanan')
@section('content')
  <div class="row">
    <div class="col-12 col-lg-8">
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
                  <th colspan="4">Produk</th>
                </tr>
              </thead>
              <tbody>
                <tr class="even">
                  <td>
                    <span class="badge bg-label-primary text-uppercase">#{{ Str::substr($shipping->uuid, 0, 5) }}</span>
                  </td>
                  <td class="sorting_1">
                    <div class="d-flex justify-content-start align-items-center product-name">
                      <div class="avatar-wrapper me-3">
                        <div class="avatar avatar-sm rounded-2 bg-label-secondary"><img
                            src="{{ asset('storage/' . $shipping->order->product->image) }}"
                            alt="{{ $shipping->order->product->name }}" class="rounded-2">
                        </div>
                      </div>
                      <div class="d-flex flex-column">
                        <span class="text-nowrap text-heading fw-medium">{{ $shipping->order->product->name }}</span>
                        <small class="text-truncate">{{ Str::limit($shipping->order->product->description, 120) }}</small>
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
                        Quantity &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; : {{ $shipping->quantity }}
                        {{ $shipping->order->product->unit }}
                      </span>
                      <span class="text-truncate">
                        Berat &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : {{ $shipping->order->product->weight }}
                        gram
                      </span>
                      <span class="text-truncate">
                        Subtotal Produk &emsp;&emsp;&ensp; : Rp
                        {{ number_format($shipping->order->product->price, 0, ',', '.') }}
                      </span>
                      <span class="text-truncate">
                        Total Harga Produk &emsp; : Rp {{ number_format($shipping->order->total_price, 0, ',', '.') }}
                      </span>
                      <br>
                      <span class="text-truncate">
                        Biaya Admin &emsp;&emsp;&emsp;&emsp;&nbsp; : Rp {{ number_format(\App\Models\Setting::getValue('admin_cost'), 0, ',', '.') }}
                      </span>
                      <span class="text-truncate">
                        Biaya Pengiriman &emsp;&ensp;&nbsp; : Rp
                        {{ number_format($shipping->price, 0, ',', '.') }}
                      </span>
                      <br>
                      <span class="text-truncate">
                        Harga Keseluruhan &emsp; : Rp
                        {{ number_format($shipping->order->total_price + \App\Models\Setting::getValue('admin_cost') + $shipping->price, 0, ',', '.') }}
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
          <h5 class="card-title mb-0 d-flex align-items-center">
            <i class="mdi mdi-timeline-text mdi-24px me-2"></i>
            <span>Aktivitas Pemesanan</span>
          </h5>
        </div>
        <div class="card-body">
          <ul class="timeline pb-0 mb-0">
            {{-- Row 1 --}}
            <li class="timeline-item timeline-item-transparent border-primary">
              <span class="timeline-point timeline-point-primary"></span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  <h6 class="mb-0">Pesanan berhasil dibuat (Order ID: #<span
                      class="text-uppercase">{{ Str::substr($shipping->uuid, 0, 5) }}</span>)</h6>
                  <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->created_at)) }}</small>
                </div>
                <p class="mt-1 mb-3">Pelanggan anda harus menyelesaikan proses pembayaran</p>
              </div>
            </li>
            <li class="timeline-item timeline-item-transparent border-primary">
              <span class="timeline-point timeline-point-primary"></span>
              <div class="timeline-event">
                <div class="timeline-header mb-1">
                  @if ($order->order_type == 'ambil_sendiri')
                    <h6 class="mb-0">Pelanggan anda memilih tipe pesanan Ambil Sendiri</h6>
                  @elseif($order->order_type == 'jasa_kirim')
                    <h6 class="mb-0">Pelanggan anda memilih tipe pesanan Jasa Kirim</h6>
                  @endif
                  <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($order->created_at)) }}</small>
                </div>
                <p class="mt-1 mb-3">Pelanggan anda telah memilih tipe pesanan</p>
              </div>
            </li>
            @if ($order->shipping)
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Ekspedisi pengiriman menggunakan {{ $shipping->courier }}</h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->created_at)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Estimasi pengiriman produk {{ $shipping->etd }} hari</p>
                </div>
              </li>
            @endif

            {{-- Row 2 --}}
            {{-- E-Channel --}}
            @if (
                $shipping->order->payment_method &&
                    ($shipping->order->status == 'sudah bayar' ||
                        $shipping->order->status == 'kadaluarsa' ||
                        $shipping->order->status == 'belum bayar') &&
                    $shipping->order->bill_key &&
                    $shipping->order->biller_code)
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Metode pembayaran menggunakan <span
                        class="text-uppercase">{{ $shipping->order->payment_method }}</span></h6>
                    <small
                      class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->order->transaction_time)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Selesaikan pembayaran sebelum
                    {{ date('d M Y, H:i:s', strtotime($shipping->order->expiry_time)) }}</p>
                </div>
              </li>
              @if ($shipping->order->status == 'sudah bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pelanggan berhasil membayar sebesar Rp
                        {{ number_format($shipping->order->total_price + \App\Models\Setting::getValue('admin_cost') + $shipping->price, 0, ',', '.') }}
                      </h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Pelanggan sudah membayar pesanan</p>
                  </div>
                </li>
              @elseif ($shipping->order->status == 'kadaluarsa')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pelanggan anda telah membatalkan pesanan</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda tidak dapat membeli produk</p>
                  </div>
                </li>
              @elseif ($shipping->order->status == 'belum bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pelanggan belum membayar</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Pelanggan anda harus segera membayar pesanan sebesar Rp
                      {{ number_format($shipping->order->total_price + \App\Models\Setting::getValue('admin_cost') + $shipping->price, 0, ',', '.') }}
                    </p>
                  </div>
                </li>
              @endif

              {{-- QRIS --}}
            @elseif (
                $shipping->order->payment_method &&
                    ($shipping->order->status == 'sudah bayar' ||
                        $shipping->order->status == 'kadaluarsa' ||
                        $shipping->order->status == 'belum bayar') &&
                    $shipping->order->issuer &&
                    $shipping->order->acquirer)
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Metode pembayaran menggunakan <span
                        class="text-uppercase">{{ $shipping->order->payment_method }}</span></h6>
                    <small
                      class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->order->transaction_time)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Selesaikan pembayaran sebelum
                    {{ date('d M Y, H:i:s', strtotime($shipping->order->expiry_time)) }}</p>
                </div>
              </li>
              @if ($shipping->order->status == 'sudah bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pelanggan berhasil membayar sebesar Rp
                        {{ number_format($shipping->order->total_price + \App\Models\Setting::getValue('admin_cost') + $shipping->price, 0, ',', '.') }}
                      </h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Pelanggan sudah membayar pesanan</p>
                  </div>
                </li>
              @elseif ($shipping->order->status == 'kadaluarsa')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pelanggan anda telah membatalkan pesanan</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda tidak dapat membeli produk</p>
                  </div>
                </li>
              @elseif ($shipping->order->status == 'belum bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pelanggan belum membayar</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Pelanggan anda harus segera membayar pesanan sebesar Rp
                      {{ number_format($shipping->order->total_price + \App\Models\Setting::getValue('admin_cost') + $shipping->price, 0, ',', '.') }}
                    </p>
                  </div>
                </li>
              @endif

              {{-- Virtual Account --}}
            @elseif (
                $shipping->order->payment_method == 'bank_transfer' &&
                    ($shipping->order->status == 'sudah bayar' ||
                        $shipping->order->status == 'kadaluarsa' ||
                        $shipping->order->status == 'belum bayar'))
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Metode pembayaran menggunakan <span
                        class="text-uppercase">{{ $shipping->order->payment_method }}</span></h6>
                    <small
                      class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->order->transaction_time)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Selesaikan pembayaran sebelum
                    {{ date('d M Y, H:i:s', strtotime($shipping->order->expiry_time)) }}</p>
                </div>
              </li>
              @if ($shipping->order->status == 'sudah bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pelanggan berhasil membayar sebesar Rp
                        {{ number_format($shipping->order->total_price + \App\Models\Setting::getValue('admin_cost') + $shipping->price, 0, ',', '.') }}
                      </h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Pelanggan sudah membayar pesanan</p>
                  </div>
                </li>
              @elseif ($shipping->order->status == 'kadaluarsa')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pelanggan anda telah membatalkan pesanan</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda tidak dapat membeli produk</p>
                  </div>
                </li>
              @elseif ($shipping->order->status == 'belum bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pelanggan belum membayar</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Pelanggan anda harus segera membayar pesanan sebesar Rp
                      {{ number_format($shipping->order->total_price + \App\Models\Setting::getValue('admin_cost') + $shipping->price, 0, ',', '.') }}
                    </p>
                  </div>
                </li>
              @endif

              {{-- Alfamart / Indomaret Group --}}
            @elseif (
                $shipping->order->payment_method &&
                    ($shipping->order->status == 'sudah bayar' ||
                        $shipping->order->status == 'kadaluarsa' ||
                        $shipping->order->status == 'belum bayar') &&
                    $shipping->order->payment_code &&
                    $shipping->order->store)
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Metode pembayaran menggunakan <span
                        class="text-uppercase">{{ $shipping->order->payment_method }}</span></h6>
                    <small
                      class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->order->transaction_time)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Selesaikan pembayaran sebelum
                    {{ date('d M Y, H:i:s', strtotime($shipping->order->expiry_time)) }}</p>
                </div>
              </li>
              @if ($shipping->order->status == 'sudah bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pelanggan berhasil membayar sebesar Rp
                        {{ number_format($shipping->order->total_price + \App\Models\Setting::getValue('admin_cost') + $shipping->price, 0, ',', '.') }}
                      </h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Pelanggan sudah membayar pesanan</p>
                  </div>
                </li>
              @elseif ($shipping->order->status == 'kadaluarsa')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pelanggan anda telah membatalkan pesanan</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Anda tidak dapat membeli produk</p>
                  </div>
                </li>
              @elseif ($shipping->order->status == 'belum bayar')
                <li class="timeline-item timeline-item-transparent border-primary">
                  <span class="timeline-point timeline-point-primary"></span>
                  <div class="timeline-event">
                    <div class="timeline-header mb-1">
                      <h6 class="mb-0">Pelanggan belum membayar</h6>
                      <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                    </div>
                    <p class="mt-1 mb-3">Pelanggan anda harus segera membayar pesanan sebesar Rp
                      {{ number_format($shipping->order->total_price + \App\Models\Setting::getValue('admin_cost') + $shipping->price, 0, ',', '.') }}
                    </p>
                  </div>
                </li>
              @endif
            @elseif($shipping->order->status == 'dibatalkan')
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Pelanggan anda telah membatalkan pesanan</h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Anda berhasil membatalkan pesanan</p>
                </div>
              </li>
            @endif

            {{-- Row 3 --}}
            @if ($shipping->order->status == 'sudah bayar')
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Status Pesanan <span class="text-uppercase badge bg-label-success">
                        Berhasil Dibayar</span></h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Pesanan selesai. Anda dapat melihat detail pesanan dan mencetaknya sebagai bukti
                    transaksi
                  </p>
                </div>
              </li>
            @elseif ($shipping->order->status == 'dibatalkan')
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Status Pesanan <span class="text-uppercase badge bg-label-dark">
                        Dibatalkan</span></h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Pelanggan dapat membeli kembali produk dari pesanan ini</p>
                </div>
              </li>
            @elseif ($shipping->order->status == 'kadaluarsa')
              <li class="timeline-item timeline-item-transparent border-primary">
                <span class="timeline-point timeline-point-primary"></span>
                <div class="timeline-event">
                  <div class="timeline-header mb-1">
                    <h6 class="mb-0">Status Pesanan <span
                        class="text-uppercase badge bg-label-danger">Kadaluarsa</span></h6>
                    <small class="text-muted">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}</small>
                  </div>
                  <p class="mt-1 mb-3">Anda dapat membeli kembali produk dari pesanan ini</p>
                </div>
              </li>
            @endif
          </ul>
        </div>
      </div>
      @if ($shipping->order->status == 'belum bayar')
        <div class="card card-body text-dark mb-3">
          <h5 class="card-title mb-3">Ketentuan Berlaku :</h5>
          <ol>
            <li class="mb-1">Jika sudah memilih metode pembayaran. Anda tidak dapat membatalkan pesanan!</li>
            <li class="mb-0">Jika anda ingin membatalkan pesanan, silahkan tunggu hingga waktu pembayaran sudah habis
            </li>
          </ol>
        </div>
      @endif
    </div>
    <div class="col-12 col-lg-4">
      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title mb-4 d-flex align-items-center">
            <i class="mdi mdi-store mdi-24px me-2"></i>
            <span>Detail Penjual</span>
          </h5>
          <div class="d-flex justify-content-start align-items-center mb-4">
            <div class="avatar me-3">
              <img src="{{ asset('storage/' . $shipping->order->product->seller->image) }}"
                alt="{{ $shipping->order->product->seller->full_name }}" class="rounded-circle">
            </div>
            <div class="d-flex flex-column">
              <a href="app-user-view-account.html">
                <h6 class="mb-0">{{ $shipping->order->product->seller->full_name }}</h6>
              </a>
              <span>Seller ID: #<span
                  class="text-uppercase">{{ Str::substr($shipping->order->product->seller->uuid, 0, 5) }}</span></span>
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <h6 class="mb-1">Info Kontak</h6>
          </div>
          <p class="mb-1">Email : {{ $shipping->order->product->seller->user->email }}</p>
          <p class="mb-1">Nomor HP : {{ $shipping->order->product->seller->phone_number }}</p>
          <p class="mb-0">Alamat : {{ $shipping->order->product->seller->address }}</p>
        </div>
      </div>

      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title mb-4 d-flex align-items-center">
            <i class="mdi mdi-account-details mdi-24px me-2"></i>
            <span>Detail Pelanggan</span>
          </h5>
          <div class="d-flex justify-content-start align-items-center mb-4">
            <div class="avatar me-3">
              <img src="{{ asset('storage/' . $shipping->order->customer->image) }}"
                alt="{{ $shipping->order->customer->full_name }}" class="rounded-circle">
            </div>
            <div class="d-flex flex-column">
              <a href="app-user-view-account.html">
                <h6 class="mb-0">{{ $shipping->order->customer->full_name }}</h6>
              </a>
              <span>Customer ID: #<span
                  class="text-uppercase">{{ Str::substr($shipping->order->customer->uuid, 0, 5) }}</span></span>
            </div>
          </div>
          <div class="d-flex justify-content-between">
            <h6 class="mb-1">Info Kontak</h6>
          </div>
          <p class="mb-1">Email : {{ $shipping->order->customer->user->email }}</p>
          <p class="mb-1">Nomor HP : {{ $shipping->order->customer->phone_number }}</p>
          <p class="mb-0">Alamat : {{ $shipping->order->customer->address }}</p>
        </div>
      </div>

      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title mb-4 d-flex align-items-center">
            <i class="mdi mdi-truck-fast mdi-24px me-2"></i>
            <span>Detail Pengiriman</span>
          </h5>
          <div class="d-flex justify-content-between">
            <h6 class="mb-1">Info Kurir</h6>
          </div>
          <p class="mb-1">Kurir : {{ $shipping->courier }}</p>
          <p class="mb-1">Servis : {{ $shipping->description }}</p>
          <p class="mb-3">Estimasi Pengiriman : {{ $shipping->etd }} hari</p>
          <form action="{{ route('rajaongkir.updateShipping', $shipping->uuid) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              @if ($shipping->status != 'diterima')
                <div class="col">
                  <x-form-floating>
                    <select name="shipping_status" id="shipping_status" class="form-select text-capitalize">
                      <option value="{{ $shipping->status }}" selected>{{ $shipping->status }}</option>
                      @if ($shipping->status == 'diproses')
                        <option value="dikirim">Dikirim</option>
                        <option value="diterima">Diterima</option>
                      @elseif ($shipping->status == 'dikirim')
                        <option value="diproses">Diproses</option>
                        <option value="diterima">Diterima</option>
                      @endif
                    </select>
                    <x-validation-error :name="'shipping_status'" />
                  </x-form-floating>
                </div>
                <div class="col">
                  <x-form-floating>
                    <x-input-form-label :label="'Resi Pengiriman'" :name="'resi'" :type="'text'" :value="$shipping->resi, old('resi')" />
                  </x-form-floating>
                </div>
            </div>
            <x-submit-button :label="'Update Pengiriman'" :type="'submit'" :variant="'primary w-100 btn-sm'" :icon="'check-circle-outline'" />
          @else
            <p class="mb-1">Status : {{ $shipping->status }}</p>
            <p class="mb-1">Nomor Resi : {{ $shipping->resi }}</p>
            @endif
          </form>
        </div>
      </div>

      <div class="card mb-3">
        <div class="card-body">
          <h5 class="card-title mb-4 d-flex align-items-center">
            <i class="mdi mdi-wallet mdi-24px me-2"></i>
            <span>Detail Pembayaran</span>
          </h5>
          <div class="d-flex justify-content-between">
            <h6 class="mb-1">Info Pembayaran</h6>
          </div>

          @if ($shipping->order->status == 'sudah bayar')
            @if ($shipping->order->acquirer && $shipping->order->issuer)
              <p class="mb-1">Metode :
                <span class="text-uppercase">{{ $shipping->order->payment_method }}</span>
              </p>
              <p class="mb-1">Acquirer :
                <span class="text-capitalize">{{ $shipping->order->acquirer }}</span>
              </p>
              <p class="mb-1">Issuer :
                <span class="text-capitalize">{{ $shipping->order->issuer }}</span>
              </p>
              <p class="mb-1">Tgl. Pemesanan :
                <span
                  class="text-uppercase badge bg-label-info rounded">{{ date('d M Y, H:i:s', strtotime($shipping->created_at)) }}
                  {{ $shipping->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                </span>
              </p>
              <p class="mb-1">Tgl. Pembayaran :
                <span
                  class="text-uppercase badge bg-label-success rounded">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}
                  {{ $shipping->updated_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                </span>
              </p>
              <p class="mb-1">Status :
                <span class="text-uppercase badge bg-label-success rounded">{{ $shipping->order->status }}</span>
              </p>
            @elseif($shipping->order->biller_code && $shipping->order->bill_key)
              <p class="mb-1">Metode :
                <span class="text-uppercase">{{ $shipping->order->payment_method }}</span>
              </p>
              <p class="mb-1">Kode Perusahaan :
                <span class="text-capitalize">{{ $shipping->order->biller_code }}</span>
              </p>
              <p class="mb-1">Nomor Virtual Account :
                <span class="text-capitalize">{{ $shipping->order->bill_key }}</span>
              </p>
              <p class="mb-1">Tgl. Pemesanan :
                <span
                  class="text-uppercase badge bg-label-info rounded">{{ date('d M Y, H:i:s', strtotime($shipping->created_at)) }}
                  {{ $shipping->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                </span>
              </p>
              <p class="mb-1">Tgl. Pembayaran :
                <span
                  class="text-uppercase badge bg-label-success rounded">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}
                  {{ $shipping->updated_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                </span>
              </p>
              <p class="mb-1">Status :
                <span class="text-uppercase badge bg-label-success rounded">{{ $shipping->order->status }}</span>
              </p>
            @else
              <p class="mb-1">Metode :
                <span class="text-uppercase">{{ $shipping->order->payment_method }}</span>
              </p>
              @if ($shipping->order->store && $shipping->order->payment_code)
                <p class="mb-1">Gerai :
                  <span class="text-capitalize">{{ $shipping->order->store }}</span>
                </p>
                <p class="mb-1">Kode Pembayaran :
                  <span class="text-capitalize">{{ $shipping->order->payment_code }}</span>
                </p>
              @endif
              <p class="mb-1">Tgl. Pemesanan :
                <span
                  class="text-uppercase badge bg-label-info rounded">{{ date('d M Y, H:i:s', strtotime($shipping->created_at)) }}
                  {{ $shipping->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                </span>
              </p>
              <p class="mb-1">Tgl. Pembayaran :
                <span
                  class="text-uppercase badge bg-label-success rounded">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}
                  {{ $shipping->updated_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                </span>
              </p>
              <p class="mb-1">Status :
                <span class="text-uppercase badge bg-label-success rounded">{{ $shipping->order->status }}</span>
              </p>
            @endif
          @elseif($shipping->order->status == 'belum bayar')
            @if ($shipping->order->store)
              <p class="mb-1">Metode :
                <span class="text-uppercase">{{ $shipping->order->payment_method }}</span>
              </p>
              <p class="mb-1">Gerai :
                <span class="text-capitalize">{{ $shipping->order->store }}</span>
              </p>
              <p class="mb-1">Kode Pembayaran :
                <span class="text-capitalize">{{ $shipping->order->payment_code }}</span>
              </p>
              <p class="mb-1">Tgl. Pemesanan :
                <span
                  class="text-uppercase badge bg-label-info rounded">{{ date('d M Y, H:i:s', strtotime($shipping->created_at)) }}
                  {{ $shipping->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                </span>
              </p>
              <p class="mb-1">Status :
                <span class="text-uppercase badge bg-label-warning rounded">{{ $shipping->order->status }}</span>
              </p>
            @elseif ($shipping->order->payment_method == 'akulaku')
              <p class="mb-1">Metode :
                <span class="text-uppercase">{{ $shipping->order->payment_method }}</span>
              </p>
              <p class="mb-1">Tgl. Pemesanan :
                <span
                  class="text-uppercase badge bg-label-info rounded">{{ date('d M Y, H:i:s', strtotime($shipping->created_at)) }}
                  {{ $shipping->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                </span>
              </p>
              <p class="mb-1">Status :
                <span class="text-uppercase badge bg-label-warning rounded">{{ $shipping->order->status }}</span>
              </p>
            @elseif($shipping->order->biller_code && $shipping->order->bill_key)
              <p class="mb-1">Metode :
                <span class="text-capitalize">{{ $shipping->order->payment_method }}</span>
              </p>
              <p class="mb-1">Kode Perusahaan :
                <span class="text-capitalize">{{ $shipping->order->biller_code }}</span>
              </p>
              <p class="mb-1">Nomor Virtual Account :
                <span class="text-capitalize">{{ $shipping->order->bill_key }}</span>
              </p>
              <p class="mb-1">Tgl. Pemesanan :
                <span
                  class="text-uppercase badge bg-label-info rounded">{{ date('d M Y, H:i:s', strtotime($shipping->created_at)) }}
                  {{ $shipping->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                </span>
              </p>
              <p class="mb-1">Status :
                <span class="text-uppercase badge bg-label-warning rounded">{{ $shipping->order->status }}</span>
              </p>
            @else
              <p class="mb-1">Tgl. Pemesanan :
                <span
                  class="text-uppercase badge bg-label-info rounded">{{ date('d M Y, H:i:s', strtotime($shipping->created_at)) }}
                  {{ $shipping->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
                </span>
              </p>
              <p class="mb-1">Status :
                <span class="text-uppercase badge bg-label-warning rounded">{{ $shipping->order->status }}</span>
              </p>
            @endif
          @elseif($shipping->order->status == 'dibatalkan')
            @if ($shipping->order->payment_method && $shipping->order->biller_code && $shipping->order->bill_key)
              <p class="mb-1">Metode :
                <span class="text-uppercase">{{ $shipping->order->payment_method }}</span>
              </p>
              <p class="mb-1">Kode Perusahaan :
                <span class="text-uppercase">{{ $shipping->order->biller_code }}</span>
              </p>
              <p class="mb-1">Nomor Virtual Account :
                <span class="text-uppercase">{{ $shipping->order->bill_key }}</span>
              </p>
            @elseif ($shipping->order->payment_method && $shipping->order->store)
              <p class="mb-1">Metode :
                <span class="text-uppercase">{{ $shipping->order->payment_method }}</span>
              </p>
              <p class="mb-1">Gerai :
                <span class="text-uppercase">{{ $shipping->order->store }}</span>
              </p>
              <p class="mb-1">Kode Pembayaran :
                <span class="text-uppercase">{{ $shipping->order->payment_code }}</span>
              </p>
            @elseif ($shipping->order->payment_method && $shipping->order->issuer && $shipping->order->acquirer)
              <p class="mb-1">Metode :
                <span class="text-uppercase">{{ $shipping->order->payment_method }}</span>
              </p>
              <p class="mb-1">Acquirer :
                <span class="text-uppercase">{{ $shipping->order->acquirer }}</span>
              </p>
              <p class="mb-1">Issuer :
                <span class="text-uppercase">{{ $shipping->order->issuer }}</span>
              </p>
            @endif
            <p class="mb-1">Tgl. Pemesanan :
              <span
                class="text-uppercase badge bg-label-info rounded">{{ date('d M Y, H:i:s', strtotime($shipping->created_at)) }}
                {{ $shipping->created_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
              </span>
            </p>
            <p class="mb-1">Tgl. Pembatalan :
              <span
                class="text-uppercase badge bg-label-dark rounded">{{ date('d M Y, H:i:s', strtotime($shipping->updated_at)) }}
                {{ $shipping->updated_at->format('H:i') > '12:00' ? 'PM' : 'AM' }}
              </span>
            </p>
            <p class="mb-1">Status :
              <span class="text-uppercase badge bg-label-dark rounded">{{ $shipping->order->status }}</span>
            </p>
          @elseif ($shipping->order->status == 'kadaluarsa')
            <p class="mb-1">Metode :
              <span class="text-uppercase">{{ $shipping->order->payment_method }}</span>
            </p>
            @if ($shipping->order->store)
              <p class="mb-1">Gerai :
                <span class="text-capitalize">{{ $shipping->order->store }}</span>
              </p>
              <p class="mb-1">Kode Pembayaran :
                <span class="text-capitalize">{{ $shipping->order->payment_code }}</span>
              </p>
            @elseif($shipping->order->biller_code && $shipping->order->bill_key)
              <p class="mb-1">Kode Perusahaan :
                <span class="text-capitalize">{{ $shipping->order->biller_code }}</span>
              </p>
              <p class="mb-1">Nomor Virtual Account :
                <span class="text-capitalize">{{ $shipping->order->bill_key }}</span>
              </p>
            @elseif($shipping->order->issuer && $shipping->order->acquirer)
              <p class="mb-1">Acquirer :
                <span class="text-capitalize">{{ $shipping->order->acquirer }}</span>
              </p>
              <p class="mb-1">Issuer :
                <span class="text-capitalize">{{ $shipping->order->issuer }}</span>
              </p>
            @endif
            <p class="mb-1">Tgl. Pemesanan :
              <span
                class="text-uppercase badge bg-label-info rounded">{{ date('d M Y, H:i:s', strtotime($shipping->order->transaction_time)) }}
              </span>
            </p>
            <p class="mb-1">Tgl. Kadaluarsa :
              <span
                class="text-uppercase badge bg-label-dark rounded">{{ date('d M Y, H:i:s', strtotime($shipping->order->expiry_time)) }}
              </span>
            </p>
            <p class="mb-1">Status :
              <span class="text-uppercase badge bg-label-danger rounded">{{ $shipping->order->status }}</span>
            </p>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
