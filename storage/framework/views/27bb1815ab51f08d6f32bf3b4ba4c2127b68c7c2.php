<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-theme="theme-default"
  data-assets-path="<?php echo e(asset('materio/assets')); ?>" data-template="vertical-menu-template-free"
  class="light-style layout-menu-fixed layout-compact" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('materio/assets/img/favicon/favicon.ico')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('materio/assets/vendor/fonts/materialdesignicons.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('materio/assets/vendor/libs/node-waves/node-waves.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('materio/assets/vendor/css/core.css')); ?>"
      class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?php echo e(asset('materio/assets/vendor/css/theme-default.css')); ?>"
      class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?php echo e(asset('materio/assets/css/demo.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('materio/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('materio/assets/vendor/libs/apex-charts/apex-charts.css')); ?>" />

    <script src="<?php echo e(asset('materio/assets/vendor/js/helpers.js')); ?>"></script>
    <script src="<?php echo e(asset('materio/assets/js/config.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('styles'); ?>

    <title><?php echo $__env->yieldContent('title'); ?> - Warung Digital</title>
  </head>

  <body>
    <?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        
        <?php echo $__env->make('components.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        
        <div class="layout-page">

          
          <?php echo $__env->make('components.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

          
          <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
              <?php echo $__env->yieldContent('content'); ?>
            </div>
            <?php echo $__env->make('components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="content-backdrop fade"></div>
      <div class="layout-overlay layout-menu-toggle"></div>
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
    <?php echo $__env->yieldPushContent('scripts'); ?>
  </body>

</html>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/layouts/authenticated.blade.php ENDPATH**/ ?>