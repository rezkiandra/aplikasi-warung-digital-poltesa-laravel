@extends('layouts.authenticated')
@section('title', 'Detail Product')
@section('content')
  <x-detail-product :product="$product" />
  <x-related-products :relatedProducts="$relatedProducts" />
@endsection
