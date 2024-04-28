<?php if($type == 'select'): ?>
  <select class="form-select text-capitalize" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>">
    <option selected disabled><?php echo e($select); ?></option>
    <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($key); ?>" <?php if(old($name) == $key): ?> selected <?php endif; ?>><?php echo e($value); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
<?php elseif($label == 'Password Lama'): ?>
  <input type="<?php echo e($type); ?>" class="form-control" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>"
    placeholder="<?php echo e($placeholder); ?>" value="<?php echo e($value); ?>" disabled />
<?php elseif($type == 'textarea'): ?>
  <textarea type="<?php echo e($type); ?>" class="form-control" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>"
    placeholder="<?php echo e($placeholder); ?>" style="height: <?php echo e($height); ?>" <?php echo e($value); ?>><?php echo e($value); ?></textarea>
<?php else: ?>
  <input type="<?php echo e($type); ?>" class="form-control" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>"
    placeholder="<?php echo e($placeholder); ?>" value="<?php echo e($value); ?>" <?php echo e($attributes); ?> />
<?php endif; ?>
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
<label for="<?php echo e($name); ?>"><?php echo e($label); ?></label>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/input-form-label.blade.php ENDPATH**/ ?>