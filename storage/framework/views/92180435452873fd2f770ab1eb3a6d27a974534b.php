
<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal39095e96dc654356da7e4dc53d8b3e5955e2d4c5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BannerImage::class, ['image' => asset('img/banner3.jpg'),'class' => 'pt-lg-5 pt-5 mt-lg-3 mt-4','aos' => 'fade-up']); ?>
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
      <h3 class="text-dark text-uppercase mb-4">Kategori Produk</h3>
      
    </section>
    <div class="row mb-5">
      <div class="col-lg-1">
        <i class="mdi mdi-food-outline mdi-48px"></i>
        <h4>Makanan</h4>
      </div>
    </div>
    
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/pages/home.blade.php ENDPATH**/ ?>