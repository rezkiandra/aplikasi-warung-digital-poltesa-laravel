<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
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
    <x-sidebar-item :label="'Dashboard'" :route="route('admin.dashboard')" :icon="'view-dashboard-outline'" :active="request()->routeIs('admin.dashboard')" />

    <x-divider :label="'User Management'" />
    <x-sidebar-dropdown :label="'Sellers'" :route="route('admin.sellers')" :icon="'account-group-outline'" :active="request()->routeIs('admin.sellers', 'admin.*.seller')">
      <x-sidebar-dropdown-item :label="'Create'" :href="route('admin.create.seller')" :active="request()->routeIs('admin.create.seller')" />
      <x-sidebar-dropdown-item :label="'List'" :href="route('admin.sellers')" :active="request()->routeIs('admin.sellers', 'admin.detail.seller', 'admin.edit.seller')" />
    </x-sidebar-dropdown>

    <x-sidebar-dropdown :label="'Customers'" :route="route('admin.customers')" :icon="'account-multiple-outline'" :active="request()->routeIs('admin.customers', 'admin.*.customer')">
      <x-sidebar-dropdown-item :label="'Create'" :href="route('admin.create.customer')" :active="request()->routeIs('admin.create.customer')" />
      <x-sidebar-dropdown-item :label="'List'" :href="route('admin.customers')" :active="request()->routeIs('admin.customers', 'admin.detail.customer', 'admin.edit.customer')" />
    </x-sidebar-dropdown>

    <x-sidebar-dropdown :label="'Users'" :route="route('admin.users')" :icon="'account-outline'" :active="request()->routeIs('admin.users', 'admin.*.user')">
      <x-sidebar-dropdown-item :label="'Create'" :href="route('admin.create.user')" :active="request()->routeIs('admin.create.user')" />
      <x-sidebar-dropdown-item :label="'List'" :href="route('admin.users')" :active="request()->routeIs('admin.users', 'admin.detail.user', 'admin.edit.user')" />
    </x-sidebar-dropdown>

    <x-divider :label="'Data Management'" />
    <x-sidebar-dropdown :label="'Products'" :route="route('admin.sellers')" :icon="'package-variant'" :active="request()->routeIs('admin.products', 'admin.*.product')">
      <x-sidebar-dropdown-item :label="'Create'" :href="route('admin.create.product')" :active="request()->routeIs('admin.create.product')" />
      <x-sidebar-dropdown-item :label="'List'" :href="route('admin.products')" :active="request()->routeIs('admin.products', 'admin.detail.product', 'admin.edit.product')" />
    </x-sidebar-dropdown>

    <x-sidebar-item :label="'Orders'" :route="route('admin.orders')" :icon="'hand-coin-outline'" :active="request()->routeIs('admin.orders', 'admin.*.order')" />

    <x-divider :label="'Data Master'" />
    <x-sidebar-item :label="'Roles'" :route="route('admin.roles')" :icon="'format-list-checkbox'" :active="request()->routeIs('admin.roles', 'admin.*.role')" />
    <x-sidebar-item :label="'Product Category'" :route="route('admin.product_category')" :icon="'filter-outline'" :active="request()->routeIs('admin.product_category', 'admin.*.category')" />
    <x-sidebar-item :label="'Bank Account'" :route="route('admin.bank_accounts')" :icon="'bank-outline'" :active="request()->routeIs('admin.bank_accounts', 'admin.*.bank')" />

    <x-divider :label="'Settings'" />
    <x-sidebar-item :label="'Settings'" :route="route('admin.settings')" :icon="'account-cog-outline'" :active="request()->routeIs('admin.settings')" />
  </ul>
</aside>
