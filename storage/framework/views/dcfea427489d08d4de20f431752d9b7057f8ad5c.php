<?php
  $totalProducts = \App\Models\Products::count();
?>


<?php $__env->startSection('title', 'Produk'); ?>
<?php $__env->startSection('content'); ?>
  <section id="hero" class="mb-5 pb-5">
    <div class="container-fluid mt-lg-5 mt-4 pt-4">
      <div class="mt-2 pt-5 pt-lg-4 pt-md-5">
        <h3 class="text-dark text-uppercase mb-2">Produk Kami</h3>
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
        <?php if (isset($component)) { $__componentOriginalb7c8a2c1fc2b8ded9c60b45d3eb870d1c3408e01 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductGrid::class, ['datas' => $products]); ?>
<?php $component->withName('product-grid'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb7c8a2c1fc2b8ded9c60b45d3eb870d1c3408e01)): ?>
<?php $component = $__componentOriginalb7c8a2c1fc2b8ded9c60b45d3eb870d1c3408e01; ?>
<?php unset($__componentOriginalb7c8a2c1fc2b8ded9c60b45d3eb870d1c3408e01); ?>
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

<?php $__env->startPush('scripts'); ?>
  <script>
    const customerId = <?php echo e(auth()->user()->customer->id ?? ''); ?>

    const productId = <?php echo e($data->id ?? ''); ?>


    $(document).on('click', '#wishlist', function() {
      $.ajax({
        url: "<?php echo e(route('wishlist.store')); ?>",
        method: "POST",
        data: {
          customer_id: customerId,
          product_id: productId
        },
        success: function(response) {
          if (response == 'success') {
            $('#wishlist').toggleClass('text-danger')
          }
        }
      });
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/pages/products.blade.php ENDPATH**/ ?>