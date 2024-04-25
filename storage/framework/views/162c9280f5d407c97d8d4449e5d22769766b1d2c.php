<div class="card mb-4 <?php echo e($class); ?>">
  <h5 class="card-header">
    <div class="d-flex align-items-center">
      <a href="<?php echo e($route); ?>">
        <i class="tf-icons mdi mdi-arrow-left me-2 fs-4"></i>
      </a>
      <?php echo e($title); ?>

    </div>
  </h5>
  <div class="card-body">
    <form action="<?php echo e($action); ?>" method="POST" enctype="multipart/form-data">
      <?php echo csrf_field(); ?>
			<?php echo method_field('PUT'); ?>
      <?php echo e($slot); ?>

    </form>
  </div>
</div>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/edit-form.blade.php ENDPATH**/ ?>