<?php $__env->startSection('title', 'Levels'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BasicButton::class, ['label' => 'Add new level','icon' => 'plus','class' => 'w-0 text-uppercase mb-4','variant' => 'primary','href' => route('admin.create.level')]); ?>
<?php $component->withName('basic-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8)): ?>
<?php $component = $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8; ?>
<?php unset($__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8); ?>
<?php endif; ?>
  <?php if (isset($component)) { $__componentOriginalca76817e7105821da7f729e4ebec51b48062a9a7 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\LevelTable::class, ['title' => 'List of levels','fields' => ['No', 'Level Name', 'Created at', 'Updated at', 'Actions'],'datas' => $levels]); ?>
<?php $component->withName('level-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalca76817e7105821da7f729e4ebec51b48062a9a7)): ?>
<?php $component = $__componentOriginalca76817e7105821da7f729e4ebec51b48062a9a7; ?>
<?php unset($__componentOriginalca76817e7105821da7f729e4ebec51b48062a9a7); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/levels/index.blade.php ENDPATH**/ ?>