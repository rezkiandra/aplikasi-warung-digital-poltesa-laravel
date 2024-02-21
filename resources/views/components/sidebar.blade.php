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
    <x-sidebar-item :label="'Dashboard'" :route="route('admin.dashboard')" :icon="'view-dashboard-outline'" :datai18n="'Dashboard'" :active="request()->routeIs('admin.dashboard')" />

    <x-divider :label="'User Management'" />
    <x-sidebar-item :label="'Sellers'" :route="route('admin.sellers')" :icon="'account-multiple-outline'" :datai18n="'Sellers'" :active="request()->routeIs('admin.sellers', 'admin.*.seller')" />
    <x-sidebar-item :label="'Customers'" :route="route('admin.customers')" :icon="'account-group-outline'" :datai18n="'Customers'" :active="request()->routeIs('admin.customers', 'admin.*.customer')" />

    <x-divider :label="'Data Management'" />
    <x-sidebar-item :label="'Products'" :route="route('admin.products')" :icon="'package-variant'" :datai18n="'Products'" :active="request()->routeIs('admin.products', 'admin.*.product')" />
    <x-sidebar-item :label="'Orders'" :route="route('admin.orders')" :icon="'hand-coin-outline'" :datai18n="'Orders'" :active="request()->routeIs('admin.orders', 'admin.*.order')" />

    <x-divider :label="'Data Master'" />
    <x-sidebar-item :label="'Roles'" :route="route('admin.roles')" :icon="'format-list-checkbox'" :datai18n="'roles'" :active="request()->routeIs('admin.roles', 'admin.*.role')" />
    <x-sidebar-item :label="'Product Category'" :route="route('admin.product_category')" :icon="'filter-outline'" :datai18n="'Category'" :active="request()->routeIs('admin.product_category', 'admin.*.category')" />
    <x-sidebar-item :label="'Bank Account'" :route="route('admin.bank_accounts')" :icon="'bank-outline'" :datai18n="'Bank'" :active="request()->routeIs('admin.bank_accounts', 'admin.*.bank_account')" />

    <x-divider :label="'Settings'" />
    <x-sidebar-item :label="'Settings'" :route="route('admin.settings')" :icon="'account-cog-outline'" :datai18n="'Settings'" :active="request()->routeIs('admin.settings')" />
  </ul>
</aside>
