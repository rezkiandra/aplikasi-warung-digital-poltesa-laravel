<?php $__env->startSection('title', 'Levels'); ?>

<?php $__env->startSection('content'); ?>
  <h4>Levels</h4>
  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.basic-table','data' => ['fields' => ['No', 'Level Name', 'Created at', 'Updated at', 'Actions'],'datas' => $levels]]); ?>
<?php $component->withName('basic-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['fields' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(['No', 'Level Name', 'Created at', 'Updated at', 'Actions']),'datas' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($levels)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/levels.blade.php ENDPATH**/ ?>