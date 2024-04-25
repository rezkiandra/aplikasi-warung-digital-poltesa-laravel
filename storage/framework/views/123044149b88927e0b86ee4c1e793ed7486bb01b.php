<div class="col-sm-6 col-xl-3">
  <div class="card">
    <div class="card-body">
      <div class="d-flex justify-content-between">
        <div class="me-1">
          <p class="text-heading mb-2"><?php echo e($label); ?></p>
          <div class="d-flex align-items-center">
            <h4 class="mb-2 me-2 display-6"><?php echo e($count); ?></h4>
            <p class="text-<?php echo e($growth > 0 ? 'success' : 'danger'); ?> mb-2"><?php echo e($growth); ?></p>
          </div>
          <p class="mb-0"><?php echo e($description); ?></p>
        </div>
        <div class="avatar">
          <div class="avatar-initial bg-label-<?php echo e($variant); ?> rounded">
            <i class="mdi mdi-<?php echo e($icon); ?> mdi-24px"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/seller/seller-card.blade.php ENDPATH**/ ?>