<?php
  $orders = \App\Models\Order::paginate(10);
  $totalOrders = \App\Models\Order::all()->count();
  $totalUnpaid = \App\Models\Order::where('status', 'unpaid')->count();
  $totalPaid = \App\Models\Order::where('status', 'paid')->count();
  $totalCancelled = \App\Models\Order::where('status', 'cancelled')->count();
?>


<?php $__env->startSection('title', 'Pesanan'); ?>
<?php $__env->startSection('content'); ?>
  <h4 class="mb-1">Daftar Pesanan</h4>
  <p class="mb-3">Sebuah pesanan akan diproses ketika pelanggan menyelesaikan pembelian</p>

  <?php if (isset($component)) { $__componentOriginala7536e6af717dbb06ae9708d7bac5367e0b9f92e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailOrder::class, []); ?>
<?php $component->withName('detail-order'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailOrderItem::class, ['label' => 'Jumlah','icon' => 'basket-outline','class' => 'border-end','variant' => 'info','condition' => $totalOrders]); ?>
<?php $component->withName('detail-order-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f)): ?>
<?php $component = $__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f; ?>
<?php unset($__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailOrderItem::class, ['label' => 'Selesai','icon' => 'basket-check-outline','class' => 'border-end','variant' => 'success','condition' => $totalPaid]); ?>
<?php $component->withName('detail-order-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f)): ?>
<?php $component = $__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f; ?>
<?php unset($__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailOrderItem::class, ['label' => 'Belum Bayar','icon' => 'basket-off-outline','class' => 'border-end','variant' => 'danger','condition' => $totalUnpaid]); ?>
<?php $component->withName('detail-order-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f)): ?>
<?php $component = $__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f; ?>
<?php unset($__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailOrderItem::class, ['label' => 'Dibatalkan','icon' => 'basket-remove-outline','variant' => 'dark','condition' => $totalCancelled]); ?>
<?php $component->withName('detail-order-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f)): ?>
<?php $component = $__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f; ?>
<?php unset($__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f); ?>
<?php endif; ?>
   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala7536e6af717dbb06ae9708d7bac5367e0b9f92e)): ?>
<?php $component = $__componentOriginala7536e6af717dbb06ae9708d7bac5367e0b9f92e; ?>
<?php unset($__componentOriginala7536e6af717dbb06ae9708d7bac5367e0b9f92e); ?>
<?php endif; ?>

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

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/orders/index.blade.php ENDPATH**/ ?>