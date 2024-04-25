<div class="card mb-4">
  <h5 class="card-header">
    <div class="d-flex align-items-center">
      <a href="<?php echo e(route('admin.roles')); ?>">
        <i class="tf-icons mdi mdi-arrow-left me-2 fs-4"></i>
      </a>
      <?php echo e($title); ?>

    </div>
  </h5>
  <div class="card-body">
    <form action="<?php echo e($route); ?>" method="POST">
      <?php echo csrf_field(); ?>
      <?php echo method_field('PUT'); ?>
			
      <?php echo $__env->make('components.input-form-label', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
      <?php if (isset($component)) { $__componentOriginalbdca446458c2217070929c68d419f1fe63331342 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SubmitButton::class, ['label' => 'Submit','type' => 'submit','variant' => 'primary','icon' => 'check-circle-outline']); ?>
<?php $component->withName('submit-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbdca446458c2217070929c68d419f1fe63331342)): ?>
<?php $component = $__componentOriginalbdca446458c2217070929c68d419f1fe63331342; ?>
<?php unset($__componentOriginalbdca446458c2217070929c68d419f1fe63331342); ?>
<?php endif; ?>
    </form>
  </div>
</div>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/role/edit-role.blade.php ENDPATH**/ ?>