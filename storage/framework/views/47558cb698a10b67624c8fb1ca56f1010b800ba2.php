<?php
  $sellerCount = \App\Models\Seller::all()->count();
  $activeSeller = \App\Models\Seller::where('status', 'active')->count();
  $inactiveSeller = \App\Models\Seller::where('status', 'inactive')->count();
  $pendingSeller = \App\Models\Seller::where('status', 'pending')->count();
  $sellerPercentage = round((\App\Models\Seller::count() ?? 0 / \App\Models\Seller::count()) * 100, 2);
  $sellerPrePercentage = \App\Models\Seller::count();

  $sellerActivePercentage = round(
      (\App\Models\Seller::where('status', 'active')->count() ?? 0 / \App\Models\Seller::count()) * 100,
      2,
  );
  $sellerActivePrePercentage = \App\Models\Seller::where('status', 'active')->count();
  $sellerInactivePercentage = round(
      (\App\Models\Seller::where('status', 'inactive')->count() ?? 0 / \App\Models\Seller::count()) * 100,
      2,
  );
  $sellerInactivePrePercentage = \App\Models\Seller::where('status', 'inactive')->count();
  $sellerPendingPercentage = round(
      (\App\Models\Seller::where('status', 'pending')->count() ?? 0 / \App\Models\Seller::count()) * 100,
      2,
  );
  $sellerPendingPrePercentage = \App\Models\Seller::where('status', 'pending')->count();
?>


<?php $__env->startSection('title', 'Penjual'); ?>
<?php $__env->startSection('content'); ?>
  <h4 class="mb-1">Daftar Penjual</h4>
  <p class="mb-3">Seorang penjual akan menjual berbagai macam produk</p>
  <?php if (isset($component)) { $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BasicButton::class, ['label' => 'Tambah penjual','icon' => 'plus','class' => 'w-0 text-uppercase mb-4','variant' => 'primary','href' => route('admin.create.seller')]); ?>
<?php $component->withName('basic-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8)): ?>
<?php $component = $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8; ?>
<?php unset($__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8); ?>
<?php endif; ?>

  <div class="row g-4 mb-4">
    <?php if (isset($component)) { $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SellerCard::class, ['datas' => $sellers,'label' => 'Sesi','count' => $sellerCount,'description' => 'Jumlah Penjual','icon' => 'account-outline','variant' => 'primary','growth' => $sellerPercentage ? '+' . $sellerPercentage . '%' : '-' . $sellerPrePercentage . '%']); ?>
<?php $component->withName('seller-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8)): ?>
<?php $component = $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8; ?>
<?php unset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SellerCard::class, ['datas' => $sellers,'label' => 'Penjual Aktif','count' => $activeSeller,'icon' => 'account-check-outline','variant' => 'success','growth' => $sellerActivePercentage ? '+' . $sellerActivePercentage . '%' : '-' . $sellerActivePrePercentage . '%']); ?>
<?php $component->withName('seller-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8)): ?>
<?php $component = $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8; ?>
<?php unset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SellerCard::class, ['datas' => $sellers,'label' => 'Penjual Tidak Aktif','count' => $inactiveSeller,'icon' => 'account-off-outline','variant' => 'danger','growth' => $sellerInactivePercentage
          ? '+' . $sellerInactivePercentage . '%'
          : '-' . $sellerInactivePrePercentage . '%']); ?>
<?php $component->withName('seller-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8)): ?>
<?php $component = $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8; ?>
<?php unset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SellerCard::class, ['datas' => $sellers,'label' => 'Penjual Pending','count' => $pendingSeller,'icon' => 'account-search-outline','variant' => 'warning','growth' => $sellerPendingPercentage
          ? '+' . $sellerPendingPercentage . '%'
          : '-' . $sellerPendingPrePercentage . '%']); ?>
<?php $component->withName('seller-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8)): ?>
<?php $component = $__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8; ?>
<?php unset($__componentOriginal9049a18a59945f39a111fd2612c24a09679f82a8); ?>
<?php endif; ?>
  </div>

  <?php if (isset($component)) { $__componentOriginal0df6ad5cc98fac9acf20a54534b0d87f650a1863 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SellerTable::class, ['title' => 'Data Penjual','datas' => $sellers,'fields' => ['No', 'Penjual', 'Gender / Alamat', 'Status / Nomor HP', 'Bank', 'Dibuat Pada', 'Aksi']]); ?>
<?php $component->withName('seller-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0df6ad5cc98fac9acf20a54534b0d87f650a1863)): ?>
<?php $component = $__componentOriginal0df6ad5cc98fac9acf20a54534b0d87f650a1863; ?>
<?php unset($__componentOriginal0df6ad5cc98fac9acf20a54534b0d87f650a1863); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/admin/sellers/index.blade.php ENDPATH**/ ?>