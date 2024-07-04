@php
  $customer_id = optional(Auth::user()->customer)->id;
  if (Auth::user()->role_id == 3 && $customer_id) {
      $cartCount = \App\Models\ProductsCart::where('customer_id', $customer_id)->count();
      $cartCount = $cartCount != 0 ? $cartCount : '';

      $wishlistCount = \App\Models\Wishlist::where('customer_id', $customer_id)->count();
      $wishlistCount = $wishlistCount != 0 ? $wishlistCount : '';

      $orderCount = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'unpaid')->count();
      $orderCount = $orderCount != 0 ? $orderCount : '';
  } else {
      $cartCount = '';
      $wishlistCount = '';
      $orderCount = '';
  }
@endphp

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme border-end">
  <div class="app-brand demo">
    <a href="javascript:void(0)" class="app-brand-link">
      <x-sidebar-logo />
      <span class="app-brand-text demo menu-text fw-semibold ms-2">{{ __('Warung Digital') }}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    @if (Auth::user()->role_id == 1)
      <x-sidebar-item :label="'Dashboard'" :route="route('admin.dashboard')" :icon="'view-dashboard-outline'" :active="request()->routeIs('admin.dashboard')" />
      <x-divider :label="'Manajamen User'" />
      <x-sidebar-dropdown :label="'Penjual'" :route="route('admin.sellers')" :icon="'account-group-outline'" :active="request()->routeIs('admin.sellers', 'admin.*.seller')">
        <x-sidebar-dropdown-item :label="'Tambah Penjual'" :href="route('admin.create.seller')" :active="request()->routeIs('admin.create.seller')" />
        <x-sidebar-dropdown-item :label="'Daftar Penjual'" :href="route('admin.sellers')" :active="request()->routeIs('admin.sellers', 'admin.detail.seller', 'admin.edit.seller')" />
      </x-sidebar-dropdown>

      <x-sidebar-dropdown :label="'Pelanggan'" :route="route('admin.customers')" :icon="'account-multiple-outline'" :active="request()->routeIs('admin.customers', 'admin.*.customer')">
        <x-sidebar-dropdown-item :label="'Tambah Pelanggan'" :href="route('admin.create.customer')" :active="request()->routeIs('admin.create.customer')" />
        <x-sidebar-dropdown-item :label="'Daftar Pelanggan'" :href="route('admin.customers')" :active="request()->routeIs('admin.customers', 'admin.detail.customer', 'admin.edit.customer')" />
      </x-sidebar-dropdown>

      <x-sidebar-dropdown :label="'Pengguna'" :route="route('admin.users')" :icon="'account-outline'" :active="request()->routeIs('admin.users', 'admin.*.user')">
        <x-sidebar-dropdown-item :label="'Tambah Pengguna'" :href="route('admin.create.user')" :active="request()->routeIs('admin.create.user')" />
        <x-sidebar-dropdown-item :label="'Daftar Pengguna'" :href="route('admin.users')" :active="request()->routeIs('admin.users', 'admin.detail.user', 'admin.edit.user')" />
      </x-sidebar-dropdown>
    @elseif(Auth::user()->role_id == 2)
      <x-sidebar-item :label="'Dashboard'" :route="route('seller.dashboard')" :icon="'view-dashboard-outline'" :active="request()->routeIs('seller.dashboard')" />
      <x-sidebar-item :label="'Biodata'" :route="route('seller.biodata')" :icon="'account-box-outline'" :active="request()->routeIs('seller.biodata', 'seller.*.biodata')" />
    @elseif(Auth::user()->role_id == 3)
      <x-sidebar-item :label="'Dashboard'" :route="route('customer.dashboard')" :icon="'view-dashboard-outline'" :active="request()->routeIs('customer.dashboard')" />
      <x-sidebar-item :label="'Biodata'" :route="route('customer.biodata')" :icon="'account-box-outline'" :active="request()->routeIs('customer.biodata', 'seller.*.biodata')" />
    @endif

    <x-divider :label="'Manajemen Data'" />
    @if (Auth::user()->role_id == 1)
      <x-sidebar-dropdown :label="'Produk'" :route="route('admin.sellers')" :icon="'package-variant'" :active="request()->routeIs('admin.products', 'seller.products', 'admin.*.product', 'seller.*.product')">
        {{-- <x-sidebar-dropdown-item :label="'Create'" :href="route('seller.create.product')" :active="request()->routeIs('seller.create.product')" /> --}}
        <x-sidebar-dropdown-item :label="'Daftar Produk'" :href="route('admin.products')" :active="request()->routeIs('admin.products', 'admin.*.product')" />
      </x-sidebar-dropdown>
    @elseif (Auth::user()->role_id == 2)
      <x-sidebar-dropdown :label="'Produk'" :route="route('admin.sellers')" :icon="'package-variant'" :active="request()->routeIs('admin.products', 'seller.products', 'admin.*.product', 'seller.*.product')">
        <x-sidebar-dropdown-item :label="'Tambah Produk'" :href="route('seller.create.product')" :active="request()->routeIs('seller.create.product')" />
        <x-sidebar-dropdown-item :label="'Daftar Produk'" :href="route('seller.products')" :active="request()->routeIs('seller.products', 'seller.detail.product', 'seller.edit.product')" />
      </x-sidebar-dropdown>
    @elseif(Auth::user()->role_id == 3)
      <x-sidebar-item :label="'Keranjang'" :badge="$cartCount" :route="route('customer.cart')" :icon="'cart-outline'" :active="request()->routeIs('customer.cart')" />
      <x-sidebar-item :label="'Wishlist'" :badge="$wishlistCount" :route="route('customer.wishlist')" :icon="'heart-outline'" :active="request()->routeIs('customer.wishlist')" />
      @if (Auth::user()->customer)
        <x-sidebar-item :label="'Pesanan'" :badge="$orderCount" :route="route('customer.orders')" :icon="'hand-coin-outline'"
          :active="request()->routeIs(
              'customer.orders',
              'midtrans.checkout',
              'midtrans.detail',
              'midtrans.cancelled',
              'rajaongkir.*',
          )" />
      @endif
    @endif

    @if (Auth::user()->role_id == 1)
      <x-sidebar-item :label="'Pesanan'" :route="route('admin.orders')" :icon="'hand-coin-outline'" :active="request()->routeIs('admin.orders', 'admin.*.order')" />
    @elseif(Auth::user()->role_id == 2 && Auth::user()->seller)
      <x-sidebar-item :label="'Pesanan'" :route="route('seller.orders')" :icon="'hand-coin-outline'" :active="request()->routeIs('seller.orders', 'seller.*.order', 'rajaongkir.*')" />
      <x-sidebar-item :label="'Laporan'" :route="route('seller.report')" :icon="'finance'" :active="request()->routeIs('seller.report')" />
    @endif

    @if (Auth::user()->role_id == 1)
      <x-divider :label="'Master Data'" />
      <x-sidebar-item :label="'Kategori Produk'" :route="route('admin.product_category')" :icon="'filter-outline'" :active="request()->routeIs('admin.product_category', 'admin.*.category')" />
      <x-sidebar-item :label="'Role'" :route="route('admin.roles')" :icon="'format-list-checkbox'" :active="request()->routeIs('admin.roles', 'admin.*.role')" />
      <x-sidebar-item :label="'Bank'" :route="route('admin.bank_accounts')" :icon="'bank-outline'" :active="request()->routeIs('admin.bank_accounts', 'admin.*.bank')" />
      <x-sidebar-item :label="'Tarif'" :route="route('admin.edit.cost')" :icon="'currency-usd'" :active="request()->routeIs('admin.edit.cost')" />
    @endif

    @if (Auth::user()->role_id == 1)
      <x-divider :label="'Pengaturan'" />
      <x-sidebar-item :label="'Profil Saya'" :route="route('admin.settings')" :icon="'account-cog-outline'" :active="request()->routeIs('admin.settings')" />
    @elseif (Auth::user()->role_id == 2)
      <x-divider :label="'Pengaturan'" />
      <x-sidebar-item :label="'Profil Saya'" :route="route('seller.settings')" :icon="'account-cog-outline'" :active="request()->routeIs('seller.settings')" />
    @elseif (Auth::user()->role_id == 3)
      <x-divider :label="'Pengaturan'" />
      <x-sidebar-item :label="'Profil Saya'" :route="route('customer.settings')" :icon="'account-cog-outline'" :active="request()->routeIs('customer.settings')" />
      <x-sidebar-item :label="'Halaman Utama'" :route="route('customer.home')" :icon="'arrow-left-circle-outline'" :active="request()->routeIs('customer.home')" />
    @endif
    <x-sidebar-item :label="'Logout'" :route="route('logout')" :icon="'power me-2'" :active="false'"
      :active="request()->routeIs('logout')" />
  </ul>
</aside>
