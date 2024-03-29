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
      <x-divider :label="'User Management'" />
      <x-sidebar-dropdown :label="'Sellers'" :route="route('admin.sellers')" :icon="'account-group-outline'" :active="request()->routeIs('admin.sellers', 'admin.*.seller')">
        <x-sidebar-dropdown-item :label="'Add seller'" :href="route('admin.create.seller')" :active="request()->routeIs('admin.create.seller')" />
        <x-sidebar-dropdown-item :label="'Seller list'" :href="route('admin.sellers')" :active="request()->routeIs('admin.sellers', 'admin.detail.seller', 'admin.edit.seller')" />
      </x-sidebar-dropdown>

      <x-sidebar-dropdown :label="'Customers'" :route="route('admin.customers')" :icon="'account-multiple-outline'" :active="request()->routeIs('admin.customers', 'admin.*.customer')">
        <x-sidebar-dropdown-item :label="'Add customer'" :href="route('admin.create.customer')" :active="request()->routeIs('admin.create.customer')" />
        <x-sidebar-dropdown-item :label="'Customer list'" :href="route('admin.customers')" :active="request()->routeIs('admin.customers', 'admin.detail.customer', 'admin.edit.customer')" />
      </x-sidebar-dropdown>

      <x-sidebar-dropdown :label="'Users'" :route="route('admin.users')" :icon="'account-outline'" :active="request()->routeIs('admin.users', 'admin.*.user')">
        <x-sidebar-dropdown-item :label="'Add user'" :href="route('admin.create.user')" :active="request()->routeIs('admin.create.user')" />
        <x-sidebar-dropdown-item :label="'User list'" :href="route('admin.users')" :active="request()->routeIs('admin.users', 'admin.detail.user', 'admin.edit.user')" />
      </x-sidebar-dropdown>
    @elseif(Auth::user()->role_id == 2)
      <x-sidebar-item :label="'Dashboard'" :route="route('seller.dashboard')" :icon="'view-dashboard-outline'" :active="request()->routeIs('seller.dashboard')" />
      <x-sidebar-item :label="'Biodata'" :route="route('seller.biodata')" :icon="'account-box-outline'" :active="request()->routeIs('seller.biodata', 'seller.*.biodata')" />
    @elseif(Auth::user()->role_id == 3)
      <x-sidebar-item :label="'Dashboard'" :route="route('customer.dashboard')" :icon="'view-dashboard-outline'" :active="request()->routeIs('customer.dashboard')" />
      <x-sidebar-item :label="'Biodata'" :route="route('customer.biodata')" :icon="'account-box-outline'" :active="request()->routeIs('customer.biodata', 'seller.*.biodata')" />
    @endif

    <x-divider :label="'Data Management'" />
    @if (Auth::user()->role_id == 2)
      <x-sidebar-dropdown :label="'Products'" :route="route('admin.sellers')" :icon="'package-variant'" :active="request()->routeIs('admin.products', 'seller.products', 'admin.*.product', 'seller.*.product')">
        <x-sidebar-dropdown-item :label="'Add product'" :href="route('seller.create.product')" :active="request()->routeIs('seller.create.product')" />
        <x-sidebar-dropdown-item :label="'Product list'" :href="route('seller.products')" :active="request()->routeIs('seller.products')" />
      </x-sidebar-dropdown>
    @elseif(Auth::user()->role_id == 3)
      <x-sidebar-item :label="'Cart'" :route="route('customer.cart')" :badge="\App\Models\ProductsCart::where('customer_id', Auth::user()->customer->id)->count()" :icon="'cart-outline'" :active="request()->routeIs('customer.cart')" />
      <x-sidebar-item :label="'Orders'" :route="route('customer.orders')" :icon="'hand-coin-outline'" :active="request()->routeIs('customer.orders')" />
    @elseif(Auth::user()->role_id == 1)
      <x-sidebar-dropdown :label="'Products'" :route="route('admin.sellers')" :icon="'package-variant'" :active="request()->routeIs('admin.products', 'seller.products', 'admin.*.product', 'seller.*.product')">
        {{-- <x-sidebar-dropdown-item :label="'Create'" :href="route('seller.create.product')" :active="request()->routeIs('seller.create.product')" /> --}}
        <x-sidebar-dropdown-item :label="'Product list'" :href="route('admin.products')" :active="request()->routeIs('admin.products')" />
      </x-sidebar-dropdown>
    @endif

    @if (Auth::user()->role_id == 1)
      <x-sidebar-item :label="'Orders'" :route="route('admin.orders')" :icon="'hand-coin-outline'" :active="request()->routeIs('admin.orders', 'admin.*.order')" />
    @elseif(Auth::user()->role_id == 2)
      <x-sidebar-item :label="'Orders'" :route="route('seller.orders')" :icon="'hand-coin-outline'" :active="request()->routeIs('seller.orders', 'seller.*.order')" />
    @endif

    @if (Auth::user()->role_id == 1)
      <x-divider :label="'Data Master'" />
      <x-sidebar-item :label="'Roles'" :route="route('admin.roles')" :icon="'format-list-checkbox'" :active="request()->routeIs('admin.roles', 'admin.*.role')" />
      <x-sidebar-item :label="'Product Category'" :route="route('admin.product_category')" :icon="'filter-outline'" :active="request()->routeIs('admin.product_category', 'admin.*.category')" />
      <x-sidebar-item :label="'Bank Account'" :route="route('admin.bank_accounts')" :icon="'bank-outline'" :active="request()->routeIs('admin.bank_accounts', 'admin.*.bank')" />
    @endif

    @if (Auth::user()->role_id == 1)
      <x-divider :label="'Settings'" />
      <x-sidebar-item :label="'Settings'" :route="route('admin.settings')" :icon="'account-cog-outline'" :active="request()->routeIs('admin.settings')" />
    @elseif (Auth::user()->role_id == 2)
      <x-sidebar-item :label="'Settings'" :route="route('seller.settings')" :icon="'account-cog-outline'" :active="request()->routeIs('seller.settings')" />
    @endif
  </ul>
</aside>
