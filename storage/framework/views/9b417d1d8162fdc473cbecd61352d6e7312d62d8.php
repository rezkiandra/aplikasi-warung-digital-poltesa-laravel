

<?php $__env->startSection('title', 'Create Bank'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal72069e47e1a7bafb3d63cca9eea72f9ff2a30828 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CreateBank::class, ['label' => 'Bank Name','title' => 'Create new bank','action' => route('admin.store.bank'),'route' => route('admin.bank_accounts'),'name' => 'bank_name','type' => 'text','placeholder' => 'Ex: BCA, Mandiri, BRI, etc','value' => old('bank_name'),'variant' => 'primary','icon' => 'check-circle-outline']); ?>
<?php $component->withName('create-bank'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal72069e47e1a7bafb3d63cca9eea72f9ff2a30828)): ?>
<?php $component = $__componentOriginal72069e47e1a7bafb3d63cca9eea72f9ff2a30828; ?>
<?php unset($__componentOriginal72069e47e1a7bafb3d63cca9eea72f9ff2a30828); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/bank_account/create.blade.php ENDPATH**/ ?>