<?php
  $totalProducts = \App\Models\Products::count();
?>



<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>
  <section id="hero" class="mb-5 pb-5">
    <div class="container-fluid mt-lg-5 mt-4 pt-4">
      <div class="mt-3 pt-5 pt-lg-4 pt-md-5">
        <h4 class="text-dark text-uppercase mb-2">Produk Kami</h4>
        <h6 class="">Menampilkan <?php echo e($totalProducts); ?> produk</h6>
      </div>
    </div>

    <div class="container-fluid">
      <?php if (isset($component)) { $__componentOriginale96be6e73177399ecc28bfca7687b53f2b97aa62 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GridCard::class, []); ?>
<?php $component->withName('grid-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <?php if (isset($component)) { $__componentOriginalf76d4cb7c448d76b73205d0a98bd867a3d5c6b95 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GridCardItem::class, ['datas' => $products]); ?>
<?php $component->withName('grid-card-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
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
  </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/pages/products.blade.php ENDPATH**/ ?>