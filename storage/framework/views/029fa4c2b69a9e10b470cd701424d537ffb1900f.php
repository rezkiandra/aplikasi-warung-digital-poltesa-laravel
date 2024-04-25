<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
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
    <?php if (isset($component)) { $__componentOriginal6575204421d4ede9ffd0a82ba21b4d926afb5394 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Dashboard','route' => route('admin.dashboard'),'icon' => 'view-dashboard-outline','datai18n' => 'Dashboard','active' => request()->routeIs('admin.dashboard')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Divider::class, ['label' => 'User Management']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Sellers','route' => route('admin.sellers'),'icon' => 'account-outline','datai18n' => 'Sellers','active' => request()->routeIs('admin.sellers', 'admin.*.seller')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Customers','route' => route('admin.customers'),'icon' => 'account-multiple-outline','datai18n' => 'Customers','active' => request()->routeIs('admin.customers', 'admin.*.customer')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Users','route' => route('admin.users'),'icon' => 'account-group-outline','datai18n' => 'users','active' => request()->routeIs('admin.users', 'admin.*.user')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Divider::class, ['label' => 'Data Management']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Products','route' => route('admin.products'),'icon' => 'package-variant','datai18n' => 'Products','active' => request()->routeIs('admin.products', 'admin.*.product')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Orders','route' => route('admin.orders'),'icon' => 'hand-coin-outline','datai18n' => 'Orders','active' => request()->routeIs('admin.orders', 'admin.*.order')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Divider::class, ['label' => 'Data Master']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Roles','route' => route('admin.roles'),'icon' => 'format-list-checkbox','datai18n' => 'roles','active' => request()->routeIs('admin.roles', 'admin.*.role')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Product Category','route' => route('admin.product_category'),'icon' => 'filter-outline','datai18n' => 'Category','active' => request()->routeIs('admin.product_category', 'admin.*.category')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Bank Account','route' => route('admin.bank_accounts'),'icon' => 'bank-outline','datai18n' => 'Bank','active' => request()->routeIs('admin.bank_accounts', 'admin.*.bank')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\Divider::class, ['label' => 'Settings']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\SidebarItem::class, ['label' => 'Settings','route' => route('admin.settings'),'icon' => 'account-cog-outline','datai18n' => 'Settings','active' => request()->routeIs('admin.settings')]); ?>
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