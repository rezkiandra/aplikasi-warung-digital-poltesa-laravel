@props(['product', 'wishlistUUID'])
@php
  $data = (object) [
      'product' => $product,
  ];
@endphp

@if (Auth::user()->customer->wishlist->contains('product_id', $data->product->id))
  <form action="{{ route('wishlist.destroy', $wishlistUUID) }}" method="POST" class="bg-white rounded-circle">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn small p-1">
      <i class="mdi mdi-heart text-danger"></i>
    </button>
  </form>
@else
  <form action="{{ route('wishlist.store') }}" method="POST" class="bg-white rounded-circle">
    @csrf
    <input type="hidden" name="customer_id" value="{{ Auth::user()->customer->id }}">
    <input type="hidden" name="product_id" value="{{ $data->product->id }}">
    <button type="submit" id="wishlist" class="btn small p-1">
      <i class="mdi mdi-heart-outline text-dark"></i>
    </button>
  </form>
@endif
