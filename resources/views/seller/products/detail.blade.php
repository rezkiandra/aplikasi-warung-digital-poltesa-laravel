@extends('layouts.authenticated')
@section('title', 'Detail Product')
@section('content')
  <x-detail-product :product="$product" />
  @if ($relatedProducts->count() > 0)
    <x-related-products :relatedProducts="$relatedProducts" />
  @endif
@endsection
