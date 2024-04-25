<?php
  $gender = [
      'laki-laki' => 'laki-laki',
      'perempuan' => 'perempuan',
  ];
  $bank = \App\Models\BankAccount::pluck('bank_name', 'id')->toArray();
?>


<?php $__env->startSection('title', 'Add Biodata'); ?>
<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal2f5fe581eb9b2c453c66c3c24186f5ca3109252c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CreateForm::class, ['title' => 'Add new biodata','route' => route('seller.create.biodata'),'action' => route('seller.store.biodata')]); ?>
<?php $component->withName('create-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="row">
      <?php if(session('error')): ?>
        <div class="col-lg-12">
          <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        </div>
      <?php endif; ?>

      <?php $__currentLoopData = $seller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($data->full_name); ?>

      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <?php if (isset($component)) { $__componentOriginalbdca446458c2217070929c68d419f1fe63331342 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SubmitButton::class, ['label' => 'Submit','type' => 'submit','variant' => 'primary','icon' => 'check-circle-outline']); ?>
<?php $component->withName('submit-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbdca446458c2217070929c68d419f1fe63331342)): ?>
<?php $component = $__componentOriginalbdca446458c2217070929c68d419f1fe63331342; ?>
<?php unset($__componentOriginalbdca446458c2217070929c68d419f1fe63331342); ?>
<?php endif; ?>
   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f5fe581eb9b2c453c66c3c24186f5ca3109252c)): ?>
<?php $component = $__componentOriginal2f5fe581eb9b2c453c66c3c24186f5ca3109252c; ?>
<?php unset($__componentOriginal2f5fe581eb9b2c453c66c3c24186f5ca3109252c); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/seller/biodata.blade.php ENDPATH**/ ?>