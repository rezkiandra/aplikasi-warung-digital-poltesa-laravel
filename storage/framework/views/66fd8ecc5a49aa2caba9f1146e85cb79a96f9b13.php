<?php
  $user_role = Auth::user()->role_id ?? '';
?>

<?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <div class="col-lg-2 col-md-4 col-6">
    <div class="card h-100 cursor-pointer"
      <?php if($user_role == 3): ?> onclick="window.location.href='<?php echo e(route('customer.detail.product', $data->slug)); ?>'"
      <?php else: ?> onclick="window.location.href='<?php echo e(route('guest.detail.product', $data->slug)); ?>'" <?php endif; ?>>
      <div class="position-absolute">
        <span class="badge bg-primary text-white d-lg-flex align-items-centers text-uppercase px-4">On Sale</span>
      </div>
      <img class="card-img-top img-fluid" alt="Card image cap" src="<?php echo e(asset('storage/' . $data->image)); ?>" width="100%">
      <div class="card-body d-flex flex-column justify-content-between">
        <p class="card-title fw-medium mb-3"><?php echo e($data->name); ?></p>
        <div class="card-text d-flex align-items-center justify-content-between">
          <small class="rounded p-1 bg-label-primary me-1">
            Rp<?php echo e(number_format($data->price, 0, ',', '.')); ?>

          </small>
          <small class="fw-medium d-flex align-items-center">
            <?php echo e(\App\Models\Order::where('product_id', $data->id)->count()); ?> Terjual
          </small>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/grid-product.blade.php ENDPATH**/ ?>