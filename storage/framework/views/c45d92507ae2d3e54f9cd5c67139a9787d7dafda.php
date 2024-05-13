
<?php $__env->startSection('title', 'Roles'); ?>
<?php $__env->startSection('content'); ?>
  <h4 class="mb-1">Daftar Role</h4>
  <p class="mb-3">Sebuah role mengatur semua hak akses user</p>
  <?php if (isset($component)) { $__componentOriginalb112240d9c630dcaf668d28072aa68649840043b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\RolesCard::class, ['datas' => $roles]); ?>
<?php $component->withName('roles-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb112240d9c630dcaf668d28072aa68649840043b)): ?>
<?php $component = $__componentOriginalb112240d9c630dcaf668d28072aa68649840043b; ?>
<?php unset($__componentOriginalb112240d9c630dcaf668d28072aa68649840043b); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/roles/index.blade.php ENDPATH**/ ?>