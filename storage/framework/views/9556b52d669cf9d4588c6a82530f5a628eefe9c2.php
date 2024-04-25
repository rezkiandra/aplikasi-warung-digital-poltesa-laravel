

<?php $__env->startSection('title', 'Product Categories'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BasicButton::class, ['label' => 'Add new category','icon' => 'plus','class' => 'w-0 text-uppercase mb-4','variant' => 'primary','href' => route('admin.create.category')]); ?>
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
  <?php if (isset($component)) { $__componentOriginal4d0ff7fd200bd5b69df6409e6aac4c144f8e8f92 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CategoryTable::class, ['title' => 'List of categories','fields' => ['No', 'Category Name', 'Total Products', 'Total Earnings', 'Created at', 'Updated at', 'Actions'],'datas' => $category]); ?>
<?php $component->withName('category-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4d0ff7fd200bd5b69df6409e6aac4c144f8e8f92)): ?>
<?php $component = $__componentOriginal4d0ff7fd200bd5b69df6409e6aac4c144f8e8f92; ?>
<?php unset($__componentOriginal4d0ff7fd200bd5b69df6409e6aac4c144f8e8f92); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/product_category/index.blade.php ENDPATH**/ ?>