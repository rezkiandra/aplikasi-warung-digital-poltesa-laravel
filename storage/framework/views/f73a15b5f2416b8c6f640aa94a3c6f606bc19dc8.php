

<?php $__env->startSection('title', 'Users'); ?>

<?php $__env->startSection('content'); ?>
  
  

  <h4 class="mb-1">User list</h4>
  <p class="mb-3">A user can be a customer or seller</p>

  <div class="row g-4 mb-4">
    <?php if (isset($component)) { $__componentOriginal45f42def1456c65b347578c00f2092c071446f71 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UserCard::class, ['datas' => $users,'label' => 'Session','icon' => 'account-outline','variant' => 'primary']); ?>
<?php $component->withName('user-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71)): ?>
<?php $component = $__componentOriginal45f42def1456c65b347578c00f2092c071446f71; ?>
<?php unset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal45f42def1456c65b347578c00f2092c071446f71 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UserCard::class, ['datas' => $users,'label' => 'Paid users','icon' => 'account-plus-outline','variant' => 'danger']); ?>
<?php $component->withName('user-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71)): ?>
<?php $component = $__componentOriginal45f42def1456c65b347578c00f2092c071446f71; ?>
<?php unset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal45f42def1456c65b347578c00f2092c071446f71 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UserCard::class, ['datas' => $users,'label' => 'Active users','icon' => 'account-check-outline','variant' => 'success']); ?>
<?php $component->withName('user-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71)): ?>
<?php $component = $__componentOriginal45f42def1456c65b347578c00f2092c071446f71; ?>
<?php unset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal45f42def1456c65b347578c00f2092c071446f71 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UserCard::class, ['datas' => $users,'label' => 'Pending users','icon' => 'account-search-outline','variant' => 'warning']); ?>
<?php $component->withName('user-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71)): ?>
<?php $component = $__componentOriginal45f42def1456c65b347578c00f2092c071446f71; ?>
<?php unset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71); ?>
<?php endif; ?>
  </div>

  <?php if (isset($component)) { $__componentOriginalea7c908e1e7ad25ac2b61d9323ede8915a60b9cf = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UserTable::class, ['title' => 'List of users','datas' => $users,'fields' => ['No', 'Username', 'Email', 'Role', 'Created at', 'Updated at', '#']]); ?>
<?php $component->withName('user-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalea7c908e1e7ad25ac2b61d9323ede8915a60b9cf)): ?>
<?php $component = $__componentOriginalea7c908e1e7ad25ac2b61d9323ede8915a60b9cf; ?>
<?php unset($__componentOriginalea7c908e1e7ad25ac2b61d9323ede8915a60b9cf); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/users/index.blade.php ENDPATH**/ ?>