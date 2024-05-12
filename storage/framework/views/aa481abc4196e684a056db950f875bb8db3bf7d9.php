<div class="card-body">
  <div class="customer-avatar-section">
    <div class="d-flex align-items-center flex-column">
      <img class="img-fluid rounded mb-3 mt-3" src="<?php echo e($image); ?>" height="120" width="120" alt="User avatar">
      <div class="customer-info text-center mb-4">
        <h5 class="mb-1 text-capitalize"><?php echo e($name); ?></h5>
        <span><?php echo e($id); ?></span>
      </div>
    </div>
  </div>
  <div class="d-flex justify-content-around flex-wrap mb-4">
    <div class="d-flex align-items-center gap-2">
      <div class="avatar me-1">
        <div class="avatar-initial rounded-3 bg-label-primary"><i class="mdi mdi mdi-cart-plus mdi-20px"></i>
        </div>
      </div>
      <div>
        <h5 class="mb-0"><?php echo e($totalOrder); ?></h5>
        <span><?php echo e($labelOrder); ?></span>
      </div>
    </div>
    <div class="d-flex align-items-center gap-2">
      <div class="avatar me-1">
        <div class="avatar-initial rounded-3 bg-label-primary"><i class="mdi mdi-currency-usd mdi-20px"></i>
        </div>
      </div>
      <div>
        <h5 class="mb-0"><?php echo e($spentCost); ?></h5>
        <span><?php echo e($labelCost); ?></span>
      </div>
    </div>
  </div>

  <div class="info-container">
    <h5 class="border-bottom text-uppercase pb-3">DETAILS</h5>
    <ul class="list-unstyled mb-4">
      <li class="mb-2">
        <span class="h6 me-1">Username:</span>
        <span class="text-capitalize"><?php echo e($username); ?></span>
      </li>
      <li class="mb-2">
        <span class="h6 me-1">Email:</span>
        <span><?php echo e($email); ?></span>
      </li>
      <li class="mb-2">
        <span class="h6 me-1">Status:</span>
        <span
          class="badge text-capitalize <?php if($status == 'active'): ?> bg-label-success <?php elseif($status == 'inactive'): ?> bg-label-danger <?php else: ?> bg-label-warning <?php endif; ?> rounded-pill"><?php echo e($status); ?></span>
      </li>
      <li class="mb-2">
        <span class="h6 me-1">Nomor Telepon:</span>
        <span><?php echo e($phone); ?></span>
      </li>

      <li>
        <span class="h6 me-1">Alamat:</span>
        <span class="text-capitalize"><?php echo e($address); ?></span>
      </li>
    </ul>
    <div class="d-flex justify-content-center gap-3">
      <?php echo $__env->make('components.basic-button', [
          'label' => 'Edit Details',
          'href' => $href,
          'variant' => 'primary w-100',
          'icon' => 'pencil-outline me-2',
      ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
</div>
<?php /**PATH C:\laragon\www\warungdigital\resources\views/components/detail-form.blade.php ENDPATH**/ ?>