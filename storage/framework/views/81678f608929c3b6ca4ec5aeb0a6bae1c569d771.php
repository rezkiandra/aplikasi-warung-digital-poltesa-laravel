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
              <span class="fw-medium"><?php echo e($data->name); ?></span>
            </td>
            <td>
              <span class="fw-medium"><?php echo e($data->email); ?></span>
            </td>
            <?php if($data->role->role_name == 'Admin'): ?>
              <td>
                <span class="fw-medium bg-label-danger rounded d-flex align-items-center justify-content-center">
                  <i class="mdi mdi-laptop mdi-24px me-2"></i>
                  <?php echo e($data->role->role_name); ?>

                </span>
              </td>
            <?php elseif($data->role->role_name == 'Seller'): ?>
              <td>
                <span class="fw-medium bg-label-info rounded d-flex align-items-center justify-content-center">
                  <i class="mdi mdi-store-outline mdi-24px me-2"></i>
                  <?php echo e($data->role->role_name); ?>

                </span>
              </td>
            <?php elseif($data->role->role_name == 'Customer'): ?>
              <td>
                <span class="fw-medium bg-label-primary rounded d-flex align-items-center justify-content-center">
                  <i class="mdi mdi-account-outline mdi-24px me-2"></i>
                  <?php echo e($data->role->role_name); ?>

                </span>
              </td>
            <?php endif; ?>
            <td><span
                class="badge rounded-pill bg-label-success me-2"><?php echo e(date('d F Y, H:i:s', strtotime($data->created_at))); ?>

              </span>
            </td>
            <td>
              <span
                class="badge rounded-pill bg-label-info me-2"><?php echo e(date('d F Y, H:i:s', strtotime($data->updated_at))); ?>

              </span>
            </td>
            <td>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                  <i class="mdi mdi-dots-vertical"></i>
                </button>
                <div class="dropdown-menu">
                  <?php if (isset($component)) { $__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DropdownItem::class, ['label' => 'Edit','variant' => 'warning','icon' => 'pencil-outline','route' => route('admin.edit.user', $data->id)]); ?>
<?php $component->withName('dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98)): ?>
<?php $component = $__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98; ?>
<?php unset($__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98); ?>
<?php endif; ?>
                  <?php if (isset($component)) { $__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DropdownItem::class, ['label' => 'Detail','variant' => 'secondary','icon' => 'eye-outline','route' => route('admin.detail.user', $data->id)]); ?>
<?php $component->withName('dropdown-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98)): ?>
<?php $component = $__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98; ?>
<?php unset($__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98); ?>
<?php endif; ?>
                  <form action="<?php echo e(route('admin.destroy.user', $data->id)); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <?php if (isset($component)) { $__componentOriginald4808ebc7c3433bc77b986e62d0056fde61922a0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DeleteButton::class, []); ?>
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
<?php /**PATH C:\laragon\www\warungdigital\resources\views/components/user/user-table.blade.php ENDPATH**/ ?>