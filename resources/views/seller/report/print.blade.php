@extends('layouts.invoice')
@section('title', 'Laporan Transaksi')
<table class="table">
  <thead>
    <th>ID Pesanan</th>
    <th>Pelanggan</th>
    <th>Produk</th>
    <th>Harga(Rp)</th>
    <th>Jumlah</th>
    <th>PPN 3%(Rp)</th>
    <th>Total(Rp)</th>
    <th>Status</th>
    <th>Tgl. Transaksi</th>
  </thead>
  <tbody>
    @foreach ($order as $data)
      <tr>
        <td class="text-uppercase text-dark small">#{{ Str::substr($data->uuid, 0, 5) }}</td>
        <td class="text-dark small">{{ $data->customer->full_name }}</td>
        <td class="text-dark small">{{ $data->product->name }}</td>
        <td class="text-dark small">{{ number_format($data->product->price, 0, ',', '.') }}</td>
        <td class="text-dark small">{{ $data->quantity }} - {{ $data->product->unit }}</td>
        <td class="text-dark small">{{ number_format(($data->product->price / 100) * 3, 0, ',', '.') }}</td>
        <td class="text-dark small">{{ number_format($data->total_price, 0, ',', '.') }}</td>
        <td class="text-uppercase text-dark small">{{ $data->status }}</td>
        <td class="text-dark small">{{ date('d M Y, H:i:s', strtotime($data->created_at)) }}</td>
      </tr>
    @endforeach
  </tbody>
</table>

@push('scripts')
  <script>
    window.print()
  </script>
@endpush
