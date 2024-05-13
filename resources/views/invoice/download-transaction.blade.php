<table width="100%" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th colspan="5" class="text-uppercase text-center">Detail Transaksi</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>UUID Pesanan</th>
      <th>Produk</th>
      <th>Quantity</th>
      <th>Total Harga</th>
      <th>Status</th>
    </tr>
    <tr>
      <td>{{ $order->uuid }}</td>
      <td>{{ $order->product->name }}</td>
      <td>{{ $order->quantity }}</td>
      <td>{{ $order->total_price }}</td>
      <td>{{ $order->status }}</td>
    </tr>
  </tbody>
</table>

<table width="100%" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th colspan="4" class="text-uppercase text-center">Detail Pembayaran</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Metohe Pembayaran</th>
      <th>Status</th>
      <th>Tanggal Pembayaran</th>
      <th>Tanggal Berakhir</th>
    </tr>
    <tr>
      <td>{{ $order->payment_method }}</td>
      <td>{{ $order->status }}</td>
      <td>{{ $order->updated_at }}</td>
      <td>{{ $order->expiry_time }}</td>
    </tr>
  </tbody>
</table>

<table width="100%" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th colspan="5" class="text-uppercase text-center">Detail Produk</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Produk</th>
      <th>Deskripsi</th>
      <th>Harga</th>
      <th>Kategori</th>
      <th>Dipublish pada</th>
    </tr>
    <tr>
      <td>{{ $order->product->name }}</td>
      <td>{{ $order->product->description }}</td>
      <td>{{ $order->product->price }}</td>
      <td>{{ $order->product->category->name }}</td>
      <td>{{ $order->product->created_at }}</td>
    </tr>
  </tbody>
</table>

<table width="100%" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th colspan="4  " class="text-uppercase text-center">Detail Penjual</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Penjual</th>
      <th>Alamat</th>
      <th>Nomor HP</th>
      <th>Nomor Rekening</th>
    </tr>
    <tr>
      <td>{{ $order->product->seller->full_name }}</td>
      <td>{{ $order->product->seller->address }}</td>
      <td>{{ $order->product->seller->phone_number }}</td>
      <td>{{ $order->product->seller->account_number }}</td>
    </tr>
  </tbody>
</table>

<table width="100%" cellspacing="0" cellpadding="5">
  <thead>
    <tr>
      <th colspan="4" class="text-uppercase text-center">Detail Pelanggan</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th>Pelanggan</th>
      <th>Alamat</th>
      <th>Nomor HP</th>
      <th>Email</th>
    </tr>
    <tr>
      <td>{{ $order->customer->full_name }}</td>
      <td>{{ $order->customer->address }}</td>
      <td>{{ $order->customer->phone_number }}</td>
      <td>{{ $order->customer->user->email }}</td>
    </tr>
  </tbody>
</table>
