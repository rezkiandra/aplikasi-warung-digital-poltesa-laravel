<?php
  $totalProducts = \App\Models\Products::count();
  $category = \App\Models\ProductCategory::pluck('name', 'id')->toArray();
?>


<?php $__env->startSection('title', 'Produk'); ?>

<?php $__env->startSection('content'); ?>
  <section class="mb-5 pb-5" data-aos="fade" data-aos-duration="1000">
    <div class="container-fluid mt-lg-5 mt-4 pt-4">
      <div class="d-flex align-items-center justify-content-between">
        <div class="mt-3 pt-4 pt-lg-4 pt-md-5">
          <h3 class="text-dark text-uppercase mb-2">Produk Kami</h3>
          <h6 class="">Menampilkan <?php echo e($totalProducts); ?> produk</h6>
        </div>
        <div class="d-flex flex-column pt-4 col-4 col-lg-2">
          <label for="filter" class="d-none d-lg-block d-md-block form-label text-uppercase h4">Filter Produk</label>
          <select name="filter" id="filter" class="form-select text-uppercase">
            <option value="" class="form-select">Semua</option>
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($key); ?>" class="form-select"><?php echo e($value); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </select>
        </div>
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
    const filter = document.getElementById('filter');
    filter.addEventListener('change', function(event) {
      event.preventDefault();
      window.location.href = `<?php echo e(route('customer.products')); ?>?category=${event.target.value}`;
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/customer/products.blade.php ENDPATH**/ ?>