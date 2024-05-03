<?php
  $fashionProduct = \App\Models\Products::with('category')->where('category_id', 2)->get();
  $totalFashionProduct = $fashionProduct->count();

  $parfumeProduct = \App\Models\Products::with('category')->where('category_id', 5)->get();
  $totalParfumeProduct = $parfumeProduct->count();
?>


<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal39095e96dc654356da7e4dc53d8b3e5955e2d4c5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BannerImage::class, ['image' => asset('img/banner1.webp'),'title' => 'Fashion','class' => 'pt-lg-5 pt-5 mt-lg-4 mt-4']); ?>
<?php $component->withName('banner-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39095e96dc654356da7e4dc53d8b3e5955e2d4c5)): ?>
<?php $component = $__componentOriginal39095e96dc654356da7e4dc53d8b3e5955e2d4c5; ?>
<?php unset($__componentOriginal39095e96dc654356da7e4dc53d8b3e5955e2d4c5); ?>
<?php endif; ?>
  <main class="container-fluid">
    <section class="mt-3 pt-3 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between">
      <h3 class="text-dark text-uppercase">Kategori Pakaian</h3>
      <a href="<?php echo e(route('guest.products')); ?>" class="btn btn-sm btn-outline-primary mb-4">View All</a>
    </section>
    <?php if (isset($component)) { $__componentOriginale96be6e73177399ecc28bfca7687b53f2b97aa62 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GridCard::class, ['class' => 'mb-5']); ?>
<?php $component->withName('grid-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
      <?php if (isset($component)) { $__componentOriginalb7c8a2c1fc2b8ded9c60b45d3eb870d1c3408e01 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductGrid::class, ['datas' => $fashionProduct]); ?>
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
  </main>

  <?php if (isset($component)) { $__componentOriginal39095e96dc654356da7e4dc53d8b3e5955e2d4c5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BannerImage::class, ['image' => asset('img/banner2.webp'),'title' => 'Parfume','class' => '']); ?>
<?php $component->withName('banner-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal39095e96dc654356da7e4dc53d8b3e5955e2d4c5)): ?>
<?php $component = $__componentOriginal39095e96dc654356da7e4dc53d8b3e5955e2d4c5; ?>
<?php unset($__componentOriginal39095e96dc654356da7e4dc53d8b3e5955e2d4c5); ?>
<?php endif; ?>
  <main class="container-fluid">
    <section class="mt-3 pt-3 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between">
      <h3 class="text-dark text-uppercase mb-4">Kategori Parfume</h3>
      <a href="<?php echo e(route('guest.products')); ?>" class="btn btn-sm btn-outline-primary mb-4">View All</a>
    </section>
    <?php if (isset($component)) { $__componentOriginale96be6e73177399ecc28bfca7687b53f2b97aa62 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GridCard::class, ['class' => 'mb-5 pb-5']); ?>
<?php $component->withName('grid-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
      <?php if (isset($component)) { $__componentOriginalb7c8a2c1fc2b8ded9c60b45d3eb870d1c3408e01 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductGrid::class, ['datas' => $parfumeProduct]); ?>
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
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/pages/home.blade.php ENDPATH**/ ?>