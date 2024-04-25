

<?php $__env->startSection('title', 'Sellers'); ?>

<?php $__env->startSection('content'); ?>
  
  

  <h4 class="mb-1">Seller list</h4>
  <p class="mb-3">A seller selling the products</p>

  <div class="row g-4 mb-4">
    <?php if (isset($component)) { $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SellerCard::class, ['datas' => $sellers,'label' => 'Session','icon' => 'account-outline','variant' => 'primary']); ?>
<?php $component->withName('seller-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8)): ?>
<?php $component = $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8; ?>
<?php unset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SellerCard::class, ['datas' => $sellers,'label' => 'Paid sellers','icon' => 'account-plus-outline','variant' => 'danger']); ?>
<?php $component->withName('seller-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8)): ?>
<?php $component = $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8; ?>
<?php unset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SellerCard::class, ['datas' => $sellers,'label' => 'Active sellers','icon' => 'account-check-outline','variant' => 'success']); ?>
<?php $component->withName('seller-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8)): ?>
<?php $component = $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8; ?>
<?php unset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SellerCard::class, ['datas' => $sellers,'label' => 'Pending sellers','icon' => 'account-search-outline','variant' => 'warning']); ?>
<?php $component->withName('seller-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8)): ?>
<?php $component = $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8; ?>
<?php unset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8); ?>
<?php endif; ?>
  </div>

  <?php if (isset($component)) { $__componentOriginal0df6ad5cc98fac9acf20a54534b0d87f650a1863 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SellerTable::class, ['title' => 'List of sellers','datas' => $sellers,'fields' => ['No', 'Username', 'Created at', 'Updated at']]); ?>
<?php $component->withName('seller-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0df6ad5cc98fac9acf20a54534b0d87f650a1863)): ?>
<?php $component = $__componentOriginal0df6ad5cc98fac9acf20a54534b0d87f650a1863; ?>
<?php unset($__componentOriginal0df6ad5cc98fac9acf20a54534b0d87f650a1863); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/sellers/index.blade.php ENDPATH**/ ?>