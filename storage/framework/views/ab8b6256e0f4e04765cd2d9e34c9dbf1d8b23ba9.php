<div class="card mb-4">
  <h5 class="card-header">
    <div class="d-flex align-items-center">
      <a href="<?php echo e(route('admin.levels')); ?>">
        <i class="tf-icons mdi mdi-arrow-left me-2 fs-4"></i>
      </a>
      <?php echo e($title); ?>

    </div>
  </h5>
  <div class="card-body">
    <form action="<?php echo e($route); ?>" method="POST">
      <?php echo csrf_field(); ?>
			<?php echo method_field('PUT'); ?>
      <div class="form-floating form-floating-outline <?php echo e($class); ?>">
        <input type="<?php echo e($type); ?>" class="form-control" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>"
          placeholder="<?php echo e($placeholder); ?>" value="<?php echo e($value); ?>" />
        <label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
        <?php if (isset($component)) { $__componentOriginalc98491cb9bb70c86f130d42eb4cfbfb99411b399 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ValidationError::class, ['name' => $name]); ?>
<?php $component->withName('validation-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc98491cb9bb70c86f130d42eb4cfbfb99411b399)): ?>
<?php $component = $__componentOriginalc98491cb9bb70c86f130d42eb4cfbfb99411b399; ?>
<?php unset($__componentOriginalc98491cb9bb70c86f130d42eb4cfbfb99411b399); ?>
<?php endif; ?>
      </div>

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
<?php /**PATH C:\laragon\www\warungdigital\resources\views/components/level/edit-level.blade.php ENDPATH**/ ?>