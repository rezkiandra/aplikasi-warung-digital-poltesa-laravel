<div class="card">
  <h5 class="card-header"><?php echo e($title); ?></h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <th><?php echo e($field); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <th>Actions</th>
      </thead>
      <tbody>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <td class="fw-medium"><?php echo e($data->$field); ?></td>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <td>
              <?php if (isset($component)) { $__componentOriginal634cb215daa8a5d76bf72fea622aab6dc555e11f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DropdownTable::class, []); ?>
<?php $component->withName('dropdown-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
                
                
               <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal634cb215daa8a5d76bf72fea622aab6dc555e11f)): ?>
<?php $component = $__componentOriginal634cb215daa8a5d76bf72fea622aab6dc555e11f; ?>
<?php unset($__componentOriginal634cb215daa8a5d76bf72fea622aab6dc555e11f); ?>
<?php endif; ?>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
      <tfoot class="table-border-bottom-0">
        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <th><?php echo e($field); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tfoot>
    </table>
  </div>
</div>
<?php /**PATH C:\laragon\www\warungdigital\resources\views/components/customer/customer-table.blade.php ENDPATH**/ ?>