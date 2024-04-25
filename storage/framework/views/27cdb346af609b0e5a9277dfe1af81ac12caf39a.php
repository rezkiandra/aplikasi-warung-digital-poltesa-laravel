<?php
  $totalProducts = \App\Models\Seller::join('products', 'sellers.id', '=', 'products.seller_id', 'left')->count();
?>

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
            <td class="sorting_1">
              <div class="d-flex justify-content-start align-items-center product-name">
                <div class="d-flex flex-column">
                  <span class="text-nowrap text-heading fw-medium text-capitalize"><?php echo e($data->name); ?></span>
                  <small class="text-truncate d-none d-sm-block">
                    <span class="fw-medium"><?php echo e($data->email); ?> - <span
                        class="badge rounded-pill bg-label-primary"><?php echo e($data->slug); ?></span></span>
                  </small>
                </div>
              </div>
            </td>
            <td class="sorting_1">
              <div class="d-flex justify-content-start align-items-center product-name">
                <div class="d-flex flex-column">
                  <span class="text-nowrap text-heading fw-medium text-capitalize">
                    <?php if($data->role->role_name == 'Admin'): ?>
                      <i class="mdi mdi-laptop text-danger mdi-20px me-1"></i>
                    <?php elseif($data->role->role_name == 'Seller'): ?>
                      <i class="mdi mdi-store-outline text-info mdi-20px me-1"></i>
                    <?php elseif($data->role->role_name == 'Customer'): ?>
                      <i class="mdi mdi-account-outline text-primary mdi-20px me-1"></i>
                    <?php endif; ?>
                    <?php echo e($data->role->role_name); ?>

                  </span>
                </div>
              </div>
            </td>
            <td class="sorting_1">
              <div class="d-flex justify-content-start align-items-center product-name">
                <div class="d-flex flex-column">
                  <span
                    class="fw-medium badge rounded-pill bg-label-info"><?php echo e(date('M d, H:i', strtotime($data->created_at))); ?>

                    <?php echo e($data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM'); ?>

                  </span>
                </div>
              </div>
            </td>
            <td>
              <div class="d-flex align-items-center">
                <?php if($data->role_id != 1): ?>
                  <a class="me-2" href="<?php echo e(route('admin.edit.user', $data->uuid)); ?>">
                    <i class="mdi mdi-pencil-outline text-secondary"></i>
                  </a>
                <?php endif; ?>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <?php if (isset($component)) { $__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DropdownItem::class, ['label' => 'Detail','variant' => 'secondary','icon' => 'eye-outline','route' => route('admin.detail.user', $data->slug)]); ?>
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
                    <?php if($data->role_id == 1): ?>
                      <form action="<?php echo e(route('admin.destroy.user', $data->uuid)); ?>" method="POST">
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
                    <?php endif; ?>
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
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/user/user-table.blade.php ENDPATH**/ ?>