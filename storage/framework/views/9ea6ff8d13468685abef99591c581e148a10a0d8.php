

<?php $__env->startSection('title', 'Edit Role'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal01466deb953e1b7c065d672bbeff951bcc937dcd = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\EditRole::class, ['label' => 'role Name','title' => 'Edit specific role','name' => 'role_name','type' => 'text','placeholder' => 'Ex: Admin, Superadmin, Editor, etc','value' => $role->role_name,'route' => route('admin.update.role', $role->slug)]); ?>
<?php $component->withName('edit-role'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal01466deb953e1b7c065d672bbeff951bcc937dcd)): ?>
<?php $component = $__componentOriginal01466deb953e1b7c065d672bbeff951bcc937dcd; ?>
<?php unset($__componentOriginal01466deb953e1b7c065d672bbeff951bcc937dcd); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/roles/edit.blade.php ENDPATH**/ ?>