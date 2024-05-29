
<?php $__env->startSection('title', 'Bank'); ?>
<?php $__env->startSection('content'); ?>
  <h4 class="mb-1">Bank</h4>
  <p class="mb-3">Sebuah bank akan menyediakan berbagai macam pihak untuk melakukan transaksi</p>

  <?php if (isset($component)) { $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BasicButton::class, ['label' => 'Tambah bank','icon' => 'plus','class' => 'w-0 text-uppercase mb-4','variant' => 'primary','href' => route('admin.create.bank')]); ?>
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
  <?php if (isset($component)) { $__componentOriginal5a610cb5deba35b23613e68f34470c6198a48097 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BankTable::class, ['title' => 'Data Bank','fields' => ['No', 'Nama Bank', 'Total Penjual', 'Dibuat Pada', 'Aksi'],'datas' => $banks]); ?>
<?php $component->withName('bank-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5a610cb5deba35b23613e68f34470c6198a48097)): ?>
<?php $component = $__componentOriginal5a610cb5deba35b23613e68f34470c6198a48097; ?>
<?php unset($__componentOriginal5a610cb5deba35b23613e68f34470c6198a48097); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/bank_account/index.blade.php ENDPATH**/ ?>