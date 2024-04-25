<div class="card">
  <h5 class="card-header"><?php echo e($title); ?></h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover">
      <thead>
        <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <th><?php echo e($field); ?></th>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </thead>
      <tbody>
        <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td><?php echo e($loop->iteration); ?></td>
            <td>
              <span class="fw-medium"><?php echo e($data->bank_name); ?></span>
            </td>
            <td>
              <span class="fw-medium"><?php echo e(\App\Models\Seller::where('bank_account_id', $data->id)->count()); ?></span>
            </td>
            <td>
              <span class="badge rounded bg-label-info me-2">
                <?php echo e(date('d M Y, H:i', strtotime($data->created_at))); ?>

                <?php echo e($data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM'); ?>

              </span>
            </td>
            <td>
              <div class="d-flex align-items-center">
                <a class="me-2" href="<?php echo e(route('admin.edit.bank', $data->slug)); ?>">
                  <i class="mdi mdi-pencil-outline text-secondary"></i>
                </a>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    
                    <form action="<?php echo e(route('admin.destroy.bank', $data->slug)); ?>" method="POST">
                      <?php echo csrf_field(); ?>
                      <?php echo method_field('DELETE'); ?>
                      <?php if (isset($component)) { $__componentOriginald4808ebc7c3433bc77b986e62d0056fde61922a0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DeleteButton::class, ['label' => 'Delete']); ?>
<?php $component->withName('delete-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4808ebc7c3433bc77b986e62d0056fde61922a0)): ?>
<?php $component = $__componentOriginald4808ebc7c3433bc77b986e62d0056fde61922a0; ?>
<?php unset($__componentOriginald4808ebc7c3433bc77b986e62d0056fde61922a0); ?>
<?php endif; ?>
                    </form>
                  </div>
                </div>
              </div>
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
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/bank/bank-table.blade.php ENDPATH**/ ?>