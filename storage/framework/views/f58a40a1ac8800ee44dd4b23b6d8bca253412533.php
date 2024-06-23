<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('content'); ?>
  <?php echo $__env->make('components.auth.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/pages/auth/login.blade.php ENDPATH**/ ?>