<div class="card mb-4">
  <h5 class="card-header">
    <div class="d-flex align-items-center">
      <a href="<?php echo e($route); ?>">
        <i class="tf-icons mdi mdi-arrow-left me-2 fs-4"></i>
      </a>
      <?php echo e($title); ?>

    </div>
  </h5>
  <div class="card-body">
    <form action="<?php echo e($action); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php echo $__env->make('components.input-form-label', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php echo $__env->make('components.submit-button', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </form>
  </div>
</div>
<?php /**PATH C:\laragon\www\warungdigital\resources\views/components/bank/create-bank.blade.php ENDPATH**/ ?>