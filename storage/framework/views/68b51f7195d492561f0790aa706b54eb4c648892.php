<?php
  $allProduct = \App\Models\Products::all();
  $fashionProduct = \App\Models\Products::with('category')->where('category_id', 2)->get();
  $totalFashionProduct = $fashionProduct->count();

  $parfumeProduct = \App\Models\Products::with('category')->where('category_id', 5)->get();
  $totalParfumeProduct = $parfumeProduct->count();
?>


<?php $__env->startPush('styles'); ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('content'); ?>
  <div class="container-fluid mt-3 pt-5">
    <div class="position-absolute end-0 p-4 bottom-0 z-index-2">
      <button type="button" class="btn btn-sm btn-outline-primary">
        <i class="mdi mdi-arrow-up mdi-24px"></i>
      </button>
    </div>
    <div class="mt-3 pt-5 text-center">
      <h1 class="text-primary mb-5" data-aos="fade-down" data-aos-duration="1000">Warung Digital POLTESA</h1>
      <div class="box" data-aos="fade-down" data-aos-duration="1000">
        <h4 class="text-dark mb-2">Toko Online Sederhana dan Terpercaya</h4>
        <h5 class="text-dark mb-4">Transaksi Dengan Mudah Dan Cepat Serta Memberikan Pelayanan Terbaik</h5>
        <button type="button" id="CtaBtn" class="btn btn-primary text-uppercase">Belanja Sekarang</button>
      </div>
    </div>
  </div>

  <?php if (isset($component)) { $__componentOriginal39095e96dc654356da7e4dc53d8b3e5955e2d4c5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BannerImage::class, ['image' => asset('img/banner1.webp'),'title' => 'Fashion','class' => 'pt-lg-5 pt-5 mt-lg-4 mt-4','aos' => 'fade-up']); ?>
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
  <main class="container-fluid" id="products">
    <section class="mt-3 pt-3 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between" data-aos="fade-up"
      data-aos-duration="1000">
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
<?php $component = $__env->getContainer()->make(App\View\Components\BannerImage::class, ['image' => asset('img/banner2.webp'),'title' => 'Parfume','aos' => 'fade-up']); ?>
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
    <section class="mt-3 pt-3 pt-lg-4 pt-md-5 d-flex align-items-center justify-content-between" data-aos="fade-up"
      data-aos-duration="1000">
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

<?php $__env->startPush('scripts'); ?>
  <script>
    const ctaBtn = document.getElementById('CtaBtn');
    ctaBtn.addEventListener('click', function() {
      window.location.href = '#products';
      window.scrollTo(0, 0);
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/pages/home.blade.php ENDPATH**/ ?>