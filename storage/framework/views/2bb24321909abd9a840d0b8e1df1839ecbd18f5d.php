<div class="col-md-12 col-lg-4">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title mb-1 text-capitalize"><?php echo e($greetings); ?> 🎉</h4>
      <p class="pb-0"><?php echo e($description); ?></p>
      <h4 class="text-primary mb-1"><?php echo e($value); ?></h4>
      <p class="mb-2 pb-1"><?php echo e($label); ?></p>
      <a href="<?php echo e($route); ?>" class="btn btn-sm btn-primary waves-effect waves-light"><?php echo e($actionLabel); ?></a>
    </div>
    <img src="<?php echo e(asset('materio/assets/img/icons/misc/triangle-light.png')); ?>"
      class="scaleX-n1-rtl position-absolute bottom-0 end-0" width="166" alt="triangle background"
      data-app-light-img="icons/misc/triangle-light.png" data-app-dark-img="icons/misc/triangle-dark.png">
    <img src="<?php echo e(asset('materio/assets/img/illustrations/trophy.png')); ?>"
      class="scaleX-n1-rtl position-absolute bottom-0 end-0 me-4 mb-4 pb-2" width="83" alt="view sales">
  </div>
</div>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/greetings-card.blade.php ENDPATH**/ ?>