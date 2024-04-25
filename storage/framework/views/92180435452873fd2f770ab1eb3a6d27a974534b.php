<?php $__env->startSection('title', 'Beranda'); ?>

<?php $__env->startSection('content'); ?>
  <h1 class="text-3xl text-red-500">bagaimana menjadi seorang backend developer</h1>
  <?php if(auth()->guard()->check()): ?>
    <p><?php echo e(Auth::user()->email); ?></p>
    <a href="<?php echo e(route('logout')); ?>">Logout</a>
  <?php endif; ?>

  <?php if(auth()->guard()->guest()): ?>
    <a href="<?php echo e(route('login')); ?>">Login</a>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/pages/home.blade.php ENDPATH**/ ?>