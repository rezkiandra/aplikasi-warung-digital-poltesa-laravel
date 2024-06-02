
<?php $__env->startSection('title', 'Beranda'); ?>
<?php $__env->startPush('styles'); ?>
  <style>
    .banner {
      border-top-left-radius: 30%;
      border-bottom-right-radius: 30%;
      border-top-right-radius: 1%;
      border-bottom-left-radius: 1%;
      transition: all 0.3s ease;
      transform: scale(1.01);
      animation: floating 5s ease-in-out infinite;
    }

    .fixed-left {
      top: 20%;
    }

    @keyframes  floating {
      0% {
        transform: translateY(0px);
      }

      50% {
        transform: translateY(20px);
      }

      100% {
        transform: translateY(0px);
      }
    }

    .banner:hover {
      transform: scale(1.03);
      transition: all 0.3s ease;
    }

    .line-height {
      line-height: 1.8;
    }
  </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
  <div
    class="fixed-left d-none position-fixed py-4 bg-white d-lg-flex d-md-flex flex-column gap-4 px-3 rounded rounded-lg shadow">
    <a href="" class="">
      <i class="mdi mdi-github mdi-24px"></i>
    </a>
    <a href="" class="">
      <i class="mdi mdi-gitlab mdi-24px"></i>
    </a>
    <a href="" class="">
      <i class="mdi mdi-linkedin mdi-24px"></i>
    </a>
    <a href="" class="">
      <i class="mdi mdi-facebook mdi-24px"></i>
    </a>
    <a href="" class="">
      <i class="mdi mdi-instagram mdi-24px"></i>
    </a>
    <a href="" class="">
      <i class="mdi mdi-whatsapp mdi-24px"></i>
    </a>
  </div>
  <main class="container">
    <section class="row my-5 pt-lg-5 d-flex align-items-center gap-5">
      <div class="col-lg" data-aos="fade-right" data-aos-duration="1200">
        <h5 class="mb-4">Pre-Release <span class="badge bg-label-primary rounded-pill">V.1.0</span></h5>
        <h1 class="text-uppercase fw-bold">Warung <span class="text-primary">Digital</span></h1>
        <div class="mb-4">
          <h5 class="text-wrap text-secondary line-height">Aplikasi e-commerce sederhana yang terintegrasi dengan
            payment gateway.
            Memudahkan pelaku bisnis di Politeknik Negeri Sambas. Tersedia berbagai macam produk dengan kualitas terbaik
          </h5>
        </div>
        <a href="<?php echo e(route('guest.products')); ?>" class="btn btn-primary">
          <i class="mdi mdi-cart-outline me-2"></i>
          <span>Lihat Produk</span>
        </a>
      </div>
      <div class="col-lg" data-aos="fade-left" data-aos-duration="1200">
        <img src="<?php echo e(asset('img/landing-page.jpg')); ?>" alt="" class="img-fluid banner shadow">
      </div>
    </section>

    <section class="mt-3 pt-3 pt-lg-3 pt-md-4" data-aos="fade-up" data-aos-duration="1200">
      <h5 class="text-dark text-capitalize mb-4">Kategori Produk</h5>
      <div class="row mb-5">
        <?php if (isset($component)) { $__componentOriginale300d578bad826c4775f3f8859f88898a150e59c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CategoryCard::class, ['name' => 'Makanan','icon' => 'food']); ?>
<?php $component->withName('category-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale300d578bad826c4775f3f8859f88898a150e59c)): ?>
<?php $component = $__componentOriginale300d578bad826c4775f3f8859f88898a150e59c; ?>
<?php unset($__componentOriginale300d578bad826c4775f3f8859f88898a150e59c); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginale300d578bad826c4775f3f8859f88898a150e59c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CategoryCard::class, ['name' => 'Makanan','icon' => 'beer']); ?>
<?php $component->withName('category-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale300d578bad826c4775f3f8859f88898a150e59c)): ?>
<?php $component = $__componentOriginale300d578bad826c4775f3f8859f88898a150e59c; ?>
<?php unset($__componentOriginale300d578bad826c4775f3f8859f88898a150e59c); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginale300d578bad826c4775f3f8859f88898a150e59c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CategoryCard::class, ['name' => 'Makanan','icon' => 'tshirt-crew']); ?>
<?php $component->withName('category-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale300d578bad826c4775f3f8859f88898a150e59c)): ?>
<?php $component = $__componentOriginale300d578bad826c4775f3f8859f88898a150e59c; ?>
<?php unset($__componentOriginale300d578bad826c4775f3f8859f88898a150e59c); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginale300d578bad826c4775f3f8859f88898a150e59c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CategoryCard::class, ['name' => 'Makanan','icon' => 'flower-tulip']); ?>
<?php $component->withName('category-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale300d578bad826c4775f3f8859f88898a150e59c)): ?>
<?php $component = $__componentOriginale300d578bad826c4775f3f8859f88898a150e59c; ?>
<?php unset($__componentOriginale300d578bad826c4775f3f8859f88898a150e59c); ?>
<?php endif; ?>
        <?php if (isset($component)) { $__componentOriginale300d578bad826c4775f3f8859f88898a150e59c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CategoryCard::class, ['name' => 'Makanan','icon' => 'hammer-wrench']); ?>
<?php $component->withName('category-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale300d578bad826c4775f3f8859f88898a150e59c)): ?>
<?php $component = $__componentOriginale300d578bad826c4775f3f8859f88898a150e59c; ?>
<?php unset($__componentOriginale300d578bad826c4775f3f8859f88898a150e59c); ?>
<?php endif; ?>
      </div>
    </section>

    <section class="" data-aos="fade-up" data-aos-duration="1000">
      <div class="d-flex justify-content-between align-items-center">
        <h5 class="text-dark text-capitalize mb-4">Produk Teratas</h5>
        <a href="<?php echo e(route('guest.products')); ?>" class="btn btn-primary btn-sm mb-4">Lihat Semua</a>
      </div>
      <?php if (isset($component)) { $__componentOriginale96be6e73177399ecc28bfca7687b53f2b97aa62 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GridCard::class, ['class' => 'mb-5 pb-5']); ?>
<?php $component->withName('grid-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
        <?php if (isset($component)) { $__componentOriginalb7c8a2c1fc2b8ded9c60b45d3eb870d1c3408e01 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductGrid::class, ['datas' => $topProducts]); ?>
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
    </section>
  </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/pages/home.blade.php ENDPATH**/ ?>