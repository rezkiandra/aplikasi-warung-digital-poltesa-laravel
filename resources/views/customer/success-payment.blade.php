@extends('layouts.authenticated')

@section('title', 'Success Payment')

@section('content')
  <h1>Success Payment</h1>
  <h3>Product Detail</h3>
  <p>{{ $order->product->name }}</p>
  <p>{{ $order->product->description }}</p>
  <p>Rp{{ number_format($order->product->price, 0, ',', '.') }}</p>
  <p>{{ $order->quantity }} pcs</p>

  <h3>Customer Detail</h3>
  <p>Name: {{ $order->customer->full_name }}</p>
  <p>Email: {{ $order->customer->user->email }}</p>
  <p>Phone: {{ $order->customer->phone_number }}</p>
  <p>Address: {{ $order->customer->address }}</p>

  <h3>Transaction Detail</h3>
  <p>Status: {{ $order->status }}</p>
  <p>Total: Rp{{ number_format($order->total_price, 0, ',', '.') }}</p>
  <p>Fee: Rp{{ number_format($order->fee, 0, ',', '.') }}</p>
  <p>Payment Method: {{ $order->payment_method }}</p>
  <p>Snap Token: {{ $order->snap_token }}</p>
  <p>Transaction Date: {{ date('M d, H:i', strtotime($order->created_at)) }}</p>
@endsection
