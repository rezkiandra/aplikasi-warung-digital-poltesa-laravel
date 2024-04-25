

<?php $__env->startSection('title', 'Customers'); ?>

<?php $__env->startSection('content'); ?>
  
  

  <h4 class="mb-1">Customer list</h4>
  <p class="mb-3">A customer will purchase the products</p>

  <div class="row g-4 mb-4">
    <?php if (isset($component)) { $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerCard::class, ['datas' => $customers,'label' => 'Session','icon' => 'account-outline','variant' => 'primary']); ?>
<?php $component->withName('customer-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3)): ?>
<?php $component = $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3; ?>
<?php unset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerCard::class, ['datas' => $customers,'label' => 'Paid customers','icon' => 'account-plus-outline','variant' => 'danger']); ?>
<?php $component->withName('customer-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3)): ?>
<?php $component = $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3; ?>
<?php unset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerCard::class, ['datas' => $customers,'label' => 'Active customers','icon' => 'account-check-outline','variant' => 'success']); ?>
<?php $component->withName('customer-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3)): ?>
<?php $component = $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3; ?>
<?php unset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerCard::class, ['datas' => $customers,'label' => 'Pending customers','icon' => 'account-search-outline','variant' => 'warning']); ?>
<?php $component->withName('customer-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3)): ?>
<?php $component = $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3; ?>
<?php unset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3); ?>
<?php endif; ?>
  </div>

  <?php if (isset($component)) { $__componentOriginalc6ba6500e6bfea952115c941efc7d1759239a6d5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerTable::class, ['title' => 'List of customers','datas' => $customers,'fields' => ['No', 'Username', 'Created at', 'Updated at']]); ?>
<?php $component->withName('customer-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc6ba6500e6bfea952115c941efc7d1759239a6d5)): ?>
<?php $component = $__componentOriginalc6ba6500e6bfea952115c941efc7d1759239a6d5; ?>
<?php unset($__componentOriginalc6ba6500e6bfea952115c941efc7d1759239a6d5); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/customers/index.blade.php ENDPATH**/ ?>