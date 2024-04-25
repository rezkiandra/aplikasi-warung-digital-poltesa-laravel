<?php
  $totalOrders = \App\Models\Order::join('customers', 'customers.id', '=', 'orders.customer_id', 'left')
  ->orderBy('customer_id', 'desc')
  ->count();
?>

<div class="col-xl-4 col-md-6">
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="card-title m-0 me-2"><?php echo e($title); ?></h5>
    </div>
    <div class="card-body">
      <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
          <div class="d-flex align-items-center">
            <div class="avatar-wrapper me-3">
              <div class="avatar rounded-2 bg-label-secondary">
                <img src="<?php echo e(asset('storage/' . $data->image)); ?>" class="rounded-2">
              </div>
            </div>
            <div class="">
              <div class="d-flex flex-row align-items-start justify-content-start gap-1">
                <span class="text-dark text-capitalize fw-medium"><?php echo e($data->full_name); ?></span>
              </div>
              <small><?php echo e($data->user->email); ?></small>
            </div>
          </div>
          <div class="text-end">
            <h6 class="mb-0"><?php echo e($totalOrders); ?></h6>
            <small>Pesanan</small>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</div>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/top-customers-card.blade.php ENDPATH**/ ?>