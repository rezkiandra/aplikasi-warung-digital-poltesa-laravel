<small class="text-danger">
  <?php if($errors->has($name)): ?>
    <i class="mdi mdi-alert-circle-outline"></i>
  <?php endif; ?>
  <?php echo e($errors->first($name)); ?>

</small>
<?php /**PATH C:\laragon\www\warungdigital\resources\views/components/validation-error.blade.php ENDPATH**/ ?>