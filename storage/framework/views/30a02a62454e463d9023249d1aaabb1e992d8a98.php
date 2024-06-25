
<?php $__env->startSection('title', 'Pelanggan'); ?>
<?php $__env->startSection('content'); ?>
  <h4 class="mb-1">Daftar Pelanggan</h4>
  <p class="mb-3">Seorang pelanggan akan membeli berbagai macam produk yang tersedia</p>
  <?php if (isset($component)) { $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BasicButton::class, ['label' => 'Tambah pelanggan','icon' => 'plus','class' => 'w-0 text-uppercase mb-4','variant' => 'primary','href' => route('admin.create.customer')]); ?>
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
    <?php if (isset($component)) { $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerCard::class, ['datas' => $customers,'label' => 'Sesi','description' => 'Jumlah Pelanggan','icon' => 'account-outline','variant' => 'primary','condition' => $customerCount]); ?>
<?php $component->withName('customer-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['count' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($customerCount)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3)): ?>
<?php $component = $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3; ?>
<?php unset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerCard::class, ['datas' => $customers,'label' => 'Pelanggan Aktif','icon' => 'account-check-outline','variant' => 'success','condition' => $activeCustomer]); ?>
<?php $component->withName('customer-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['count' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($activeCustomer)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3)): ?>
<?php $component = $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3; ?>
<?php unset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerCard::class, ['datas' => $customers,'label' => 'Pelanggan Tidak Aktif','icon' => 'account-off-outline','variant' => 'danger','condition' => $inactiveCustomer]); ?>
<?php $component->withName('customer-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['count' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($inactiveCustomer)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3)): ?>
<?php $component = $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3; ?>
<?php unset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerCard::class, ['datas' => $customers,'label' => 'Pelanggan Pending','icon' => 'account-search-outline','variant' => 'warning','condition' => $pendingCustomer]); ?>
<?php $component->withName('customer-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['count' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pendingCustomer)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3)): ?>
<?php $component = $__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3; ?>
<?php unset($__componentOriginala863cd47245cc584b2bc16239844e17d2d05b0e3); ?>
<?php endif; ?>
  </div>
  <?php if (isset($component)) { $__componentOriginalc6ba6500e6bfea952115c941efc7d1759239a6d5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerTable::class, ['title' => 'Data Pelanggan','datas' => $customers,'fields' => ['No', 'NIK / NIM', 'Pelanggan', 'Gender / Alamat', 'Status / Nomor HP', 'Dibuat Pada', 'Aksi']]); ?>
<?php $component->withName('customer-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc6ba6500e6bfea952115c941efc7d1759239a6d5)): ?>
<?php $component = $__componentOriginalc6ba6500e6bfea952115c941efc7d1759239a6d5; ?>
<?php unset($__componentOriginalc6ba6500e6bfea952115c941efc7d1759239a6d5); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/customers/index.blade.php ENDPATH**/ ?>