

<?php $__env->startSection('title', 'Detail Produk'); ?>

<?php $__env->startSection('content'); ?>
  <div class="container mt-5 pt-5">
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

    <h5 class="fw-medium mt-5 mt-lg-5 mb-3">Produk Serupa</h5>
    <?php if (isset($component)) { $__componentOriginale96be6e73177399ecc28bfca7687b53f2b97aa62 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GridCard::class, []); ?>
<?php $component->withName('grid-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
      <?php if (isset($component)) { $__componentOriginalf76d4cb7c448d76b73205d0a98bd867a3d5c6b95 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GridCardItem::class, ['datas' => $relatedProducts]); ?>
<?php $component->withName('grid-card-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->name),'image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->image),'price' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product->price)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf76d4cb7c448d76b73205d0a98bd867a3d5c6b95)): ?>
<?php $component = $__componentOriginalf76d4cb7c448d76b73205d0a98bd867a3d5c6b95; ?>
<?php unset($__componentOriginalf76d4cb7c448d76b73205d0a98bd867a3d5c6b95); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale96be6e73177399ecc28bfca7687b53f2b97aa62)): ?>
<?php $component = $__componentOriginale96be6e73177399ecc28bfca7687b53f2b97aa62; ?>
<?php unset($__componentOriginale96be6e73177399ecc28bfca7687b53f2b97aa62); ?>
<?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/customer/detail-product.blade.php ENDPATH**/ ?>