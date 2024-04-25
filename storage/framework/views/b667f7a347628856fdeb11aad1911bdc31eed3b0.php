<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
  <title><?php echo $__env->yieldContent('title'); ?> - Warung Digital</title>
</head>

<body>
	<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <?php echo $__env->yieldContent('content'); ?>
	
  <script src="<?php echo e(mix('js/app.js')); ?>" defer></script>
</body>

</html>
<?php /**PATH C:\laragon\www\warungdigital\resources\views/layouts/guest.blade.php ENDPATH**/ ?>