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
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('sidebar-item', [
        'label' => 'Dashboard',
        'route' => route('admin.dashboard'),
        'wire' => 'admin.dashboard',
        // 'icon' => 'view-dashboard-outline',
        // 'datai18n' => 'Dashboard',
        // 'active' => request()->routeIs('admin.dashboard'),
    ])->html();
} elseif ($_instance->childHasBeenRendered('l3898812717-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l3898812717-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l3898812717-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l3898812717-0');
} else {
    $response = \Livewire\Livewire::mount('sidebar-item', [
        'label' => 'Dashboard',
        'route' => route('admin.dashboard'),
        'wire' => 'admin.dashboard',
        // 'icon' => 'view-dashboard-outline',
        // 'datai18n' => 'Dashboard',
        // 'active' => request()->routeIs('admin.dashboard'),
    ]);
    $html = $response->html();
    $_instance->logRenderedChild('l3898812717-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    
  </ul>
</aside>
<?php /**PATH C:\laragon\www\warungdigital\resources\views/livewire/sidebar.blade.php ENDPATH**/ ?>