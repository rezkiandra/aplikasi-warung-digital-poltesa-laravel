<div class="card-body">
  <div class="customer-avatar-section">
    <div class="d-flex align-items-center flex-column">
      <img class="img-fluid rounded mb-3 mt-4" src="<?php echo e($image); ?>" height="120" width="120" alt="User avatar">
      <div class="customer-info text-center mb-4">
        <h5 class="mb-1"><?php echo e($username); ?></h5>
        <span><?php echo e($id); ?></span>
      </div>
    </div>
  </div>

  <div class="info-container">
    <h5 class="border-bottom text-uppercase pb-3">DETAILS</h5>
    <ul class="list-unstyled mb-4">
      <li class="mb-2">
        <span class="h6 me-1">Email:</span>
        <span><?php echo e($email); ?></span>
      </li>
      <li class="mb-2">
        <span class="h6 me-1">Role:</span>
        <span
          class="badge text-capitalize <?php if($role == 'Admin'): ?> bg-label-danger <?php elseif($role == 'Seller'): ?> bg-label-info <?php elseif($role == 'Customer'): ?> bg-label-primary <?php endif; ?> rounded-pill"><?php echo e($role); ?></span>
      </li>
    </ul>
    <div class="d-flex justify-content-center">
      <?php echo $__env->make('components.basic-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
  </div>
</div>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/detail-user.blade.php ENDPATH**/ ?>