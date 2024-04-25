

<?php $__env->startSection('title', 'Success Payment'); ?>

<?php $__env->startSection('content'); ?>
  <h1>Success Payment</h1>
  <h3>Product Detail</h3>
  <p><?php echo e($order->product->name); ?></p>
  <p><?php echo e($order->product->description); ?></p>
  <p>Rp<?php echo e(number_format($order->product->price, 0, ',', '.')); ?></p>
  <p><?php echo e($order->quantity); ?> pcs</p>

  <h3>Customer Detail</h3>
  <p>Name: <?php echo e($order->customer->full_name); ?></p>
  <p>Email: <?php echo e($order->customer->user->email); ?></p>
  <p>Phone: <?php echo e($order->customer->phone_number); ?></p>
  <p>Address: <?php echo e($order->customer->address); ?></p>

  <h3>Transaction Detail</h3>
  <p>Status: <?php echo e($order->status); ?></p>
  <p>Total: Rp<?php echo e(number_format($order->total_price, 0, ',', '.')); ?></p>
  <p>Fee: Rp<?php echo e(number_format($order->fee, 0, ',', '.')); ?></p>
  <p>Payment Method: <?php echo e($order->payment_method); ?></p>
  <p>Snap Token: <?php echo e($order->snap_token); ?></p>
  <p>Transaction Date: <?php echo e(date('M d, H:i', strtotime($order->created_at))); ?></p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/customer/success-payment.blade.php ENDPATH**/ ?>