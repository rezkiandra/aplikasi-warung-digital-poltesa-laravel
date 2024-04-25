

<?php $__env->startSection('title', 'Edit Product'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal92a94ac4e359e812306e5de71cf3220aef818777 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailProduct::class, ['product' => $product]); ?>
<?php $component->withName('detail-product'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal92a94ac4e359e812306e5de71cf3220aef818777)): ?>
<?php $component = $__componentOriginal92a94ac4e359e812306e5de71cf3220aef818777; ?>
<?php unset($__componentOriginal92a94ac4e359e812306e5de71cf3220aef818777); ?>
<?php endif; ?>
  <?php if (isset($component)) { $__componentOriginalb41ce286e821b72f63c29c98024f9ea5e57aae6b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\RelatedProducts::class, ['relatedProducts' => $relatedProducts]); ?>
<?php $component->withName('related-products'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb41ce286e821b72f63c29c98024f9ea5e57aae6b)): ?>
<?php $component = $__componentOriginalb41ce286e821b72f63c29c98024f9ea5e57aae6b; ?>
<?php unset($__componentOriginalb41ce286e821b72f63c29c98024f9ea5e57aae6b); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/admin/products/detail.blade.php ENDPATH**/ ?>