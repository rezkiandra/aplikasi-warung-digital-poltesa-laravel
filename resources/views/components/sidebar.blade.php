<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  <div class="app-brand demo">
    <a href="javascript:void(0)" class="app-brand-link">
      <x-sidebar-logo />
      <span class="app-brand-text demo menu-text fw-semibold ms-2">{{ __('Materio') }}</span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <x-sidebar-item :label="'Dashboard'" :route="route('admin.dashboard')" :icon="'view-dashboard-outline'" :datai18n="'Basic'" :active="request()->routeIs('admin.dashboard')" />

    <x-divider :label="'User Management'" />
    <x-sidebar-item :label="'Sellers'" :route="route('admin.sellers')" :icon="'account-multiple-outline'" :data-i18n="'Sellers'" :active="request()->routeIs('admin.sellers')" />
    <x-sidebar-item :label="'Customers'" :route="route('admin.customers')" :icon="'account-group-outline'" :datai18n="'Customers'" :active="request()->routeIs('admin.customers')" />

    <x-divider :label="'Data Management'" />
    <x-sidebar-item :label="'Products'" :route="route('admin.products')" :icon="'package-variant'" :datai18n="'Products'" :active="request()->routeIs('admin.products')" />
    <x-sidebar-item :label="'Orders'" :route="route('admin.orders')" :icon="'hand-coin-outline'" :datai18n="'Orders'" :active="request()->routeIs('admin.orders')" />

    <x-divider :label="'Data Master'" />
    <x-sidebar-item :label="'Levels'" :route="route('admin.levels')" :icon="'format-list-checkbox'" :datai18n="'Levels'" :active="request()->routeIs('admin.levels')" />
    <x-sidebar-item :label="'Product Category'" :route="route('admin.product_category')" :icon="'filter-outline'" :datai18n="'Category'" :active="request()->routeIs('admin.product_category')" />
    <x-sidebar-item :label="'Bank Account'" :route="route('admin.bank_account')" :icon="'bank-outline'" :datai18n="'Bank'" :active="request()->routeIs('admin.bank_account')" />

    <x-divider :label="'Settings'" />
    <x-sidebar-item :label="'Settings'" :route="route('admin.settings')" :icon="'account-cog-outline'" :datai18n="'Settings'" :active="request()->routeIs('admin.settings')" />
  </ul>
</aside>
