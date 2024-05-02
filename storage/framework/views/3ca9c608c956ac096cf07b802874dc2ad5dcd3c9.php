<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free" class="light-style layout-menu-fixed layout-compact" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link rel="icon" type="image/x-icon" href="<?php echo e(asset('materio/assets/img/favicon/favicon.ico')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('materio/assets/vendor/fonts/materialdesignicons.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('materio/assets/vendor/libs/node-waves/node-waves.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('materio/assets/vendor/css/core.css')); ?>" class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?php echo e(asset('materio/assets/vendor/css/theme-default.css')); ?>" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?php echo e(asset('materio/assets/css/demo.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('materio/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />
  <link rel="stylesheet" href="<?php echo e(asset('materio/assets/vendor/css/pages/page-auth.css')); ?>" />

  <script src="<?php echo e(asset('materio/js/helpers.js')); ?>"></script>
  <script src="<?php echo e(asset('materio/assets/js/config.js')); ?>"></script>
  <title><?php echo $__env->yieldContent('title'); ?> - Warung Digital</title>
  <style>
    * {
      font-family: Poppins;
    }
  </style>
</head>

<body>
  <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  
  <div class="position-relative">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner py-4">
        
        <?php echo $__env->yieldContent('content'); ?>
        
      </div>
			<img src="<?php echo e(asset('materio/assets/img/illustrations/tree-3.png')); ?>" alt="auth-tree" class="authentication-image-object-left d-lg-block" />
			<img src="<?php echo e(asset('materio/assets/img/illustrations/auth-basic-mask-light.png')); ?>" class="authentication-image d-lg-block" alt="triangle-bg" data-app-light-img="illustrations/auth-basic-mask-light.png" data-app-dark-img="illustrations/auth-basic-mask-dark.png" />
			<img src="<?php echo e(asset('materio/assets/img/illustrations/tree.png')); ?>" alt="auth-tree" class="authentication-image-object-right d-lg-block" />
    </div>
  </div>
  

  <script src="<?php echo e(asset('materio/assets/vendor/libs/jquery/jquery.js')); ?>"></script>
  <script src="<?php echo e(asset('materio/assets/vendor/libs/popper/popper.js')); ?>"></script>
  <script src="<?php echo e(asset('materio/assets/vendor/js/bootstrap.js')); ?>"></script>
  <script src="<?php echo e(asset('materio/assets/vendor/libs/node-waves/node-waves.js')); ?>"></script>
  <script src="<?php echo e(asset('materio/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>
  <script src="<?php echo e(asset('materio/assets/vendor/js/menu.js')); ?>"></script>
  <script src="<?php echo e(asset('materio/assets/vendor/libs/apex-charts/apexcharts.js')); ?>"></script>
  <script src="<?php echo e(asset('materio/assets/js/main.js')); ?>"></script>
  <script src="<?php echo e(asset('materio/assets/js/dashboards-analytics.js')); ?>"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/layouts/auth.blade.php ENDPATH**/ ?>