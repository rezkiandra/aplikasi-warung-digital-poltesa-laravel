

<?php $__env->startSection('title', 'Edit Bank'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal528210defe83c5339c746304373e516520f0ca7c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\EditBank::class, ['label' => 'Bank Name','title' => 'Edit specific bank','name' => 'bank_name','type' => 'text','placeholder' => 'Ex: BCA, Mandiri, BRI, etc','value' => $bank->bank_name,'route' => route('admin.update.bank', $bank->slug)]); ?>
<?php $component->withName('edit-bank'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal528210defe83c5339c746304373e516520f0ca7c)): ?>
<?php $component = $__componentOriginal528210defe83c5339c746304373e516520f0ca7c; ?>
<?php unset($__componentOriginal528210defe83c5339c746304373e516520f0ca7c); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/bank_account/edit.blade.php ENDPATH**/ ?>