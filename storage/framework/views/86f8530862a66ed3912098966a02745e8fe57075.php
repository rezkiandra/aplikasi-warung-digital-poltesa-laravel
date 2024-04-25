

<?php $__env->startSection('title', 'Detail Product'); ?>

<?php $__env->startSection('content'); ?>
  <div class="position-absolute">
    <?php if (isset($component)) { $__componentOriginalb86efb4bad49dfd6bdff8a6db73c7b24c4cd1331 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ActionButton::class, ['route' => route('seller.products'),'variant' => 'text-light','icon' => 'arrow-left-circle mdi-24px','class' => 'p-2']); ?>
<?php $component->withName('action-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb86efb4bad49dfd6bdff8a6db73c7b24c4cd1331)): ?>
<?php $component = $__componentOriginalb86efb4bad49dfd6bdff8a6db73c7b24c4cd1331; ?>
<?php unset($__componentOriginalb86efb4bad49dfd6bdff8a6db73c7b24c4cd1331); ?>
<?php endif; ?>
  </div>
  <div class="col-lg-7 col-12">
    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="" class="img-fluid rounded shadow hover-shadow"
      width="500px">

    <div class="align-self-center">
      <h4 class="mt-4 fw-medium"><?php echo e($product->name); ?> / <span class="h5 fw-medium"><?php echo e($product->slug); ?></span></h4>
    </div>
    <span class="mb-3 rounded badge bg-label-primary">
      Rp.<?php echo e(number_format($product->price, 2, ',', '.')); ?>

    </span>

    <div class="d-lg-flex">
      <h6 class="fw-medium">Rating:
        <i class="mdi mdi-star text-warning"></i>
        <i class="mdi mdi-star text-warning"></i>
        <i class="mdi mdi-star text-warning"></i>
        <i class="mdi mdi-star text-warning"></i>
        <i class="mdi mdi-star-outline text-warning"></i>
      </h6>
    </div>

    

    <h6 class="fw-medium">Published On:
      <span class="text-secondary"><?php echo e(date('M d, H:i', strtotime($product->created_at))); ?>

        <?php echo e($product->created_at->format('H:i') > '12:00' ? 'PM' : 'AM'); ?>

      </span>
    </h6>
    <div class="mt-4 pb-3">
      <h6 class="fw-medium mb-2">Description:</h6>
      <p class="fw-medium text-capitalize"><?php echo e($product->description); ?></p>
    </div>
  </div>

  <h5 class="fw-medium mt-5 mb-3">Related Products</h5>
  <?php if (isset($component)) { $__componentOriginale96be6e73177399ecc28bfca7687b53f2b97aa62 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GridCard::class, []); ?>
<?php $component->withName('grid-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginalf76d4cb7c448d76b73205d0a98bd867a3d5c6b95 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GridCardItem::class, ['title' => $product->name,'image' => $product->image,'price' => $product->price,'datas' => $relatedProducts]); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/seller/products/detail.blade.php ENDPATH**/ ?>