

<?php $__env->startSection('title', 'Edit Level'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal7c111e2471e3b5097c25cb0911a9d8b661626edc = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\EditLevel::class, ['label' => 'Level Name','title' => 'Edit specific level','name' => 'level_name','type' => 'text','placeholder' => 'Ex: Admin, Superadmin, Editor, etc','value' => $level->level_name,'route' => route('admin.update.level', $level->slug)]); ?>
<?php $component->withName('edit-level'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c111e2471e3b5097c25cb0911a9d8b661626edc)): ?>
<?php $component = $__componentOriginal7c111e2471e3b5097c25cb0911a9d8b661626edc; ?>
<?php unset($__componentOriginal7c111e2471e3b5097c25cb0911a9d8b661626edc); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/levels/edit.blade.php ENDPATH**/ ?>