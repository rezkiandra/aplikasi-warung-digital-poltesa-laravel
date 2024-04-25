

<?php $__env->startSection('title', 'Create Role'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginalc8c4bca5363ece0a0c9ed9230cf8d96c3f521ae5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CreateRole::class, ['label' => 'Role Name','title' => 'Create new role','action' => route('admin.store.role'),'route' => route('admin.roles'),'name' => 'role_name','type' => 'text','placeholder' => 'Ex: Admin, Superadmin, Editor, etc','value' => old('role_name'),'variant' => 'primary','icon' => 'check-circle-outline']); ?>
<?php $component->withName('create-role'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc8c4bca5363ece0a0c9ed9230cf8d96c3f521ae5)): ?>
<?php $component = $__componentOriginalc8c4bca5363ece0a0c9ed9230cf8d96c3f521ae5; ?>
<?php unset($__componentOriginalc8c4bca5363ece0a0c9ed9230cf8d96c3f521ae5); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/roles/create.blade.php ENDPATH**/ ?>