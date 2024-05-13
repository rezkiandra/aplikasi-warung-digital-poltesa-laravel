<?php
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
?>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme border-end">
  <div class="app-brand demo">
    <a href="javascript:void(0)" class="app-brand-link">
      <?php if (isset($component)) { $__componentOriginal419d28988bc0c2b13b71bc202ba66d95f0bd71f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarLogo::class, []); ?>
<?php $component->withName('sidebar-logo'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal419d28988bc0c2b13b71bc202ba66d95f0bd71f4)): ?>
<?php $component = $__componentOriginal419d28988bc0c2b13b71bc202ba66d95f0bd71f4; ?>
<?php unset($__componentOriginal419d28988bc0c2b13b71bc202ba66d95f0bd71f4); ?>
<?php endif; ?>
      <span class="app-brand-text demo menu-text fw-semibold ms-2"><?php echo e(__('Warung Digital')); ?></span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <?php if(Auth::user()->role_id == 1): ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Dashboard','route' => route('admin.dashboard'),'icon' => 'view-dashboard-outline','active' => request()->routeIs('admin.dashboard')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Divider::class, ['label' => 'Manajamen User']); ?>
<?php $component->withName('divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06)): ?>
<?php $component = $__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06; ?>
<?php unset($__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdown::class, ['label' => 'Penjual','icon' => 'account-group-outline','active' => request()->routeIs('admin.sellers', 'admin.*.seller')]); ?>
<?php $component->withName('sidebar-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.sellers'))]); ?>
        <?php if (isset($component)) { $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdownItem::class, ['label' => 'Tambah Penjual','href' => route('admin.create.seller'),'active' => request()->routeIs('admin.create.seller')]); ?>
<?php $component->withName('sidebar-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43)): ?>
<?php $component = $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43; ?>
<?php unset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdownItem::class, ['label' => 'Daftar Penjual','href' => route('admin.sellers'),'active' => request()->routeIs('admin.sellers', 'admin.detail.seller', 'admin.edit.seller')]); ?>
<?php $component->withName('sidebar-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43)): ?>
<?php $component = $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43; ?>
<?php unset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43); ?>
<?php endif; ?>
       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac)): ?>
<?php $component = $__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac; ?>
<?php unset($__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac); ?>
<?php endif; ?>

      <?php if (isset($component)) { $__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdown::class, ['label' => 'Pelanggan','icon' => 'account-multiple-outline','active' => request()->routeIs('admin.customers', 'admin.*.customer')]); ?>
<?php $component->withName('sidebar-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.customers'))]); ?>
        <?php if (isset($component)) { $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdownItem::class, ['label' => 'Tambah Pelanggan','href' => route('admin.create.customer'),'active' => request()->routeIs('admin.create.customer')]); ?>
<?php $component->withName('sidebar-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43)): ?>
<?php $component = $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43; ?>
<?php unset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdownItem::class, ['label' => 'Daftar Pelanggan','href' => route('admin.customers'),'active' => request()->routeIs('admin.customers', 'admin.detail.customer', 'admin.edit.customer')]); ?>
<?php $component->withName('sidebar-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43)): ?>
<?php $component = $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43; ?>
<?php unset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43); ?>
<?php endif; ?>
       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac)): ?>
<?php $component = $__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac; ?>
<?php unset($__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac); ?>
<?php endif; ?>

      <?php if (isset($component)) { $__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdown::class, ['label' => 'Pengguna','icon' => 'account-outline','active' => request()->routeIs('admin.users', 'admin.*.user')]); ?>
<?php $component->withName('sidebar-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.users'))]); ?>
        <?php if (isset($component)) { $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdownItem::class, ['label' => 'Tambah Pengguna','href' => route('admin.create.user'),'active' => request()->routeIs('admin.create.user')]); ?>
<?php $component->withName('sidebar-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43)): ?>
<?php $component = $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43; ?>
<?php unset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdownItem::class, ['label' => 'Daftar Pengguna','href' => route('admin.users'),'active' => request()->routeIs('admin.users', 'admin.detail.user', 'admin.edit.user')]); ?>
<?php $component->withName('sidebar-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43)): ?>
<?php $component = $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43; ?>
<?php unset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43); ?>
<?php endif; ?>
       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac)): ?>
<?php $component = $__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac; ?>
<?php unset($__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac); ?>
<?php endif; ?>
    <?php elseif(Auth::user()->role_id == 2): ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Dashboard','route' => route('seller.dashboard'),'icon' => 'view-dashboard-outline','active' => request()->routeIs('seller.dashboard')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Biodata','route' => route('seller.biodata'),'icon' => 'account-box-outline','active' => request()->routeIs('seller.biodata', 'seller.*.biodata')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
    <?php elseif(Auth::user()->role_id == 3): ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Dashboard','route' => route('customer.dashboard'),'icon' => 'view-dashboard-outline','active' => request()->routeIs('customer.dashboard')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Biodata','route' => route('customer.biodata'),'icon' => 'account-box-outline','active' => request()->routeIs('customer.biodata', 'seller.*.biodata')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Divider::class, ['label' => 'Manajemen Data']); ?>
<?php $component->withName('divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06)): ?>
<?php $component = $__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06; ?>
<?php unset($__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06); ?>
<?php endif; ?>
    <?php if(Auth::user()->role_id == 1): ?>
      <?php if (isset($component)) { $__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdown::class, ['label' => 'Produk','icon' => 'package-variant','active' => request()->routeIs('admin.products', 'seller.products', 'admin.*.product', 'seller.*.product')]); ?>
<?php $component->withName('sidebar-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.sellers'))]); ?>
        
        <?php if (isset($component)) { $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdownItem::class, ['label' => 'Daftar Produk','href' => route('admin.products'),'active' => request()->routeIs('admin.products')]); ?>
<?php $component->withName('sidebar-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43)): ?>
<?php $component = $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43; ?>
<?php unset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43); ?>
<?php endif; ?>
       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac)): ?>
<?php $component = $__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac; ?>
<?php unset($__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac); ?>
<?php endif; ?>
    <?php elseif(Auth::user()->role_id == 2): ?>
      <?php if (isset($component)) { $__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdown::class, ['label' => 'Produk','icon' => 'package-variant','active' => request()->routeIs('admin.products', 'seller.products', 'admin.*.product', 'seller.*.product')]); ?>
<?php $component->withName('sidebar-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['route' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.sellers'))]); ?>
        <?php if(Auth()->user()->seller->status == 'active'): ?>
          <?php if (isset($component)) { $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdownItem::class, ['label' => 'Tambah Produk','href' => route('seller.create.product'),'active' => request()->routeIs('seller.create.product')]); ?>
<?php $component->withName('sidebar-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43)): ?>
<?php $component = $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43; ?>
<?php unset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43); ?>
<?php endif; ?>
        <?php endif; ?>
        <?php if (isset($component)) { $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarDropdownItem::class, ['label' => 'Daftar Produk','href' => route('seller.products'),'active' => request()->routeIs('seller.products', 'seller.detail.product', 'seller.edit.product')]); ?>
<?php $component->withName('sidebar-dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43)): ?>
<?php $component = $__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43; ?>
<?php unset($__componentOriginal33298f493885e4db4f550977ba1a0df320b07e43); ?>
<?php endif; ?>
       <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac)): ?>
<?php $component = $__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac; ?>
<?php unset($__componentOriginal2d633c2ba82daa6ba94ab9bf3193b5f1dff3c4ac); ?>
<?php endif; ?>
    <?php elseif(Auth::user()->role_id == 3): ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Keranjang','badge' => $cartCount,'route' => route('customer.cart'),'icon' => 'cart-outline','active' => request()->routeIs('customer.cart')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Wishlist','badge' => $wishlistCount,'route' => route('customer.wishlist'),'icon' => 'heart-outline','active' => request()->routeIs('customer.wishlist')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
      <?php if(Auth::user()->customer): ?>
        <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Pesanan','badge' => $orderCount,'route' => route('customer.orders'),'icon' => 'hand-coin-outline','active' => request()->routeIs(
              'customer.orders',
              'midtrans.checkout',
              'midtrans.detail',
              'midtrans.cancelled',
          )]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
      <?php endif; ?>
    <?php endif; ?>

    <?php if(Auth::user()->role_id == 1): ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Pesanan','route' => route('admin.orders'),'icon' => 'hand-coin-outline','active' => request()->routeIs('admin.orders', 'admin.*.order')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
    <?php elseif(Auth::user()->role_id == 2 && Auth::user()->seller): ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Pesanan','route' => route('seller.orders'),'icon' => 'hand-coin-outline','active' => request()->routeIs('seller.orders', 'seller.*.order')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(Auth::user()->role_id == 1): ?>
      <?php if (isset($component)) { $__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Divider::class, ['label' => 'Master Data']); ?>
<?php $component->withName('divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06)): ?>
<?php $component = $__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06; ?>
<?php unset($__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Kategori Produk','route' => route('admin.product_category'),'icon' => 'filter-outline','active' => request()->routeIs('admin.product_category', 'admin.*.category')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Role','route' => route('admin.roles'),'icon' => 'format-list-checkbox','active' => request()->routeIs('admin.roles', 'admin.*.role')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Bank','route' => route('admin.bank_accounts'),'icon' => 'bank-outline','active' => request()->routeIs('admin.bank_accounts', 'admin.*.bank')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
    <?php endif; ?>

    <?php if(Auth::user()->role_id == 1): ?>
      <?php if (isset($component)) { $__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Divider::class, ['label' => 'Pengaturan']); ?>
<?php $component->withName('divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06)): ?>
<?php $component = $__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06; ?>
<?php unset($__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Profil Saya','route' => route('admin.settings'),'icon' => 'account-cog-outline','active' => request()->routeIs('admin.settings')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
    <?php elseif(Auth::user()->role_id == 2): ?>
      <?php if (isset($component)) { $__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Divider::class, ['label' => 'Pengaturan']); ?>
<?php $component->withName('divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06)): ?>
<?php $component = $__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06; ?>
<?php unset($__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Profil Saya','route' => route('seller.settings'),'icon' => 'account-cog-outline','active' => request()->routeIs('seller.settings')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
    <?php elseif(Auth::user()->role_id == 3): ?>
      <?php if (isset($component)) { $__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Divider::class, ['label' => 'Pengaturan']); ?>
<?php $component->withName('divider'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06)): ?>
<?php $component = $__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06; ?>
<?php unset($__componentOriginal8091966d9bf2c7b150ac53fb28cd0da5c6248f06); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Profil Saya','route' => route('customer.settings'),'icon' => 'account-cog-outline','active' => request()->routeIs('customer.settings')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Halaman Utama','route' => route('customer.home'),'icon' => 'arrow-left-circle-outline','active' => request()->routeIs('customer.home')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
    <?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Logout','route' => route('logout'),'icon' => 'power me-2','active' => request()->routeIs('logout')]); ?>
<?php $component->withName('sidebar-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394)): ?>
<?php $component = $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394; ?>
<?php unset($__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394); ?>
<?php endif; ?>
  </ul>
</aside>
<?php /**PATH C:\laragon\www\warungdigital\resources\views/components/sidebar.blade.php ENDPATH**/ ?>