@php
  $user_role = Auth::user()->role_id ?? '';
  $categories = \App\Models\ProductCategory::has('product')->get('slug');
@endphp
<li class="nav-item dropdown">
  <a class="nav-link text-dark dropdown-toggle" href="javascript:void(0)" id="navbarDropdown" role="button"
    data-bs-toggle="dropdown" aria-expanded="false" {{ request()->routeIs('*.products') ? 'active text-primary' : '' }}>
    {{ $label }}
  </a>
  <ul class="dropdown-menu" aria-labelledby="navbarDropdown" data-bs-popper="static"
    @foreach ($categories as $item)
      @if ($user_role == 3)
        <x-dropdown-nav-item :name="$item->slug" :route="route('customer.products', ['category' => $item->slug])" />
      @else
        <x-dropdown-nav-item :name="$item->slug" :route="route('guest.products', ['category' => $item->slug])" />
      @endif @endforeach
    </ul>
</li>
