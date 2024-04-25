@extends('layouts.authenticated')

@section('title', 'Edit Product')

@section('content')
  <x-detail-product :product="$product" />
  <x-related-products :relatedProducts="$relatedProducts" />
@endsection
