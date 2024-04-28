<?php
  $orders = \App\Models\Order::with('seller')->paginate(10);
?>


<?php $__env->startSection('title', 'Pesanan'); ?>
<?php $__env->startSection('content'); ?>
  <h4 class="mb-1">Pesanan</h4>
  <p class="mb-3">Daftar pesanan pelanggan yang membeli produk anda</p>

  <?php if (isset($component)) { $__componentOriginal79c7471b9786c5db07ee501d3736f97a6aa0e83b = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\OrderTabel::class, ['orders' => $orders]); ?>
<?php $component->withName('order-tabel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal79c7471b9786c5db07ee501d3736f97a6aa0e83b)): ?>
<?php $component = $__componentOriginal79c7471b9786c5db07ee501d3736f97a6aa0e83b; ?>
<?php unset($__componentOriginal79c7471b9786c5db07ee501d3736f97a6aa0e83b); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/seller/orders/index.blade.php ENDPATH**/ ?>