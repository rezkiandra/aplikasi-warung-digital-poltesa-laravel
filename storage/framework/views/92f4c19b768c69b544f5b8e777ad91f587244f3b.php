<?php
  $user_role = Auth::user()->role_id ?? '';
?>

<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="col-lg-2 col-md-4 col-6 pb-3 pb-lg-3">
    <div class="card h-100 cursor-pointer"
      <?php if($user_role == 1): ?> onclick="window.location.href='<?php echo e(route('admin.detail.product', $data->slug)); ?>'" 
      <?php elseif($user_role == 2): ?> onclick="window.location.href='<?php echo e(route('seller.detail.product', $data->slug)); ?>'"
      <?php elseif($user_role == 3): ?> onclick="window.location.href='<?php echo e(route('customer.detail.product', $data->slug)); ?>'"
      <?php else: ?> onclick="window.location.href='<?php echo e(route('guest.detail.product', $data->slug)); ?>'" <?php endif; ?>>
      <div class="position-absolute">
        <span class="badge bg-primary text-white d-lg-flex align-items-centers text-uppercase px-4">On Sale</span>
      </div>
      <img class="card-img-top img-fluid" alt="Card image cap" src="<?php echo e(asset('storage/' . $data->image)); ?>" width="100%">
      <div class="card-body d-flex flex-column justify-content-between">
        <small class="card-title text-dark fw-medium mb-3"><?php echo e($data->name); ?></small>
        <div class="card-text d-flex align-items-center justify-content-between">
          <small class="badge rounded p-1 bg-label-primary">
            Rp<?php echo e(number_format($data->price, 0, ',', '.')); ?>

          </small>
          <small class="d-flex align-items-center">
            <span>Terjual <?php echo e(\App\Models\Order::where('product_id', $data->id)->sum('quantity')); ?></span>
          </small>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/grid-card-item.blade.php ENDPATH**/ ?>