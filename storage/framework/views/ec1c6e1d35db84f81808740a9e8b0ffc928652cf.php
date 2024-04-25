<div class="form-check">
  <input class="form-check-input" type="<?php echo e($type); ?>" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>" />
  <label class="form-check-label <?php echo e($class); ?>" for="<?php echo e($name); ?>">
    <?php echo e($label); ?>

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
  </label>
</div>
<?php /**PATH C:\laragon\www\warungdigital\resources\views/components/form-check.blade.php ENDPATH**/ ?>