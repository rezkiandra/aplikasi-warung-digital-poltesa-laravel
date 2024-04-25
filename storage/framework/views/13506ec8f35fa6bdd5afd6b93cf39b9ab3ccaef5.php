<?php
  if (Auth::user()->customer) {
      $customer_id = Auth::user()->customer->id;
  } else {
      $customer_id = null;
  }

  $countOrder = \App\Models\Order::where('customer_id', $customer_id)->count();
  $countUnpaid = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'unpaid')->count();
  $countPaid = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'paid')->count();
  $countCancelled = \App\Models\Order::where('customer_id', $customer_id)->where('status', 'cancelled')->count();
?>



<?php $__env->startSection('title', 'Orders'); ?>
<?php $__env->startSection('content'); ?>
  <h4 class="mb-1">Orders</h4>
  <p class="mb-3">List of orders</p>

  <?php if (isset($component)) { $__componentOriginala7536e6af717dbb06ae9708d7bac5367e0b9f92e = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailOrder::class, []); ?>
<?php $component->withName('detail-order'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginale6969076d4a8770d4356b03ef5c1f0fb4d210e4f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailOrderItem::class, ['label' => 'Total Orders','icon' => 'wallet-giftcard','class' => 'border-end','variant' => 'primary','condition' => $countOrder]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\DetailOrderItem::class, ['label' => 'Unpaid','icon' => 'wallet-outline','class' => 'border-end','variant' => 'danger','condition' => $countUnpaid]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\DetailOrderItem::class, ['label' => 'Completed','icon' => 'check-all','class' => 'border-end','variant' => 'success','condition' => $countPaid]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\DetailOrderItem::class, ['label' => 'Cancelled','icon' => 'alert-circle-outline','variant' => 'dark','condition' => $countCancelled]); ?>
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

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/customer/orders.blade.php ENDPATH**/ ?>