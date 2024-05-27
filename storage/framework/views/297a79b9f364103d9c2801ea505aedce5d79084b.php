<div class="card">
  <h5 class="card-header"><?php echo e($title); ?></h5>
  <div class="table-responsive text-nowrap">
    <table class="table table-hover table-responsive">
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
                <div class="avatar-wrapper me-3">
                  <div class="avatar rounded-2 bg-label-secondary">
                    <img src="<?php echo e(asset('storage/' . $data->image)); ?>" class="rounded-2">
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <span class="text-nowrap text-heading fw-medium"><?php echo e($data->name); ?></span>
                  <small class="d-lg-flex d-md-flex d-flex flex-row text-truncate d-sm-block d-flex">
                    <span class="fw-medium"><?php echo e(Str::limit($data->description, 40)); ?></span>
                  </small>
                </div>
              </div>
            </td>
            <td class="sorting_1">
              <div class="d-flex flex-column justify-content-start gap-2">
                <span class="fw-medium d-flex align-items-center">
                  <span class="fw-medium badge bg-label-primary rounded text-uppercase">
                    <?php echo e($data->category->name); ?>

                  </span>
                </span>
                <span class="fw-medium d-flex align-items-center">
                  <small class="text-dark">
                    <?php echo e($data->seller->full_name); ?>

                  </small>
                </span>
              </div>
            </td>
            <td>
              <span class="text-truncate text-dark">Rp <?php echo e(number_format($data->price, 0, ',', '.')); ?></span>
            </td>
            <td>
              <span class="text-truncate text-dark"><?php echo e($data->stock); ?> <?php echo e($data->unit); ?></span>
            </td>
            <td>
              <span
                class="fw-medium badge rounded-pill bg-label-info"><?php echo e(date('d M Y, H:i:s', strtotime($data->created_at))); ?>

                <?php echo e($data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM'); ?>

              </span>
            </td>
            <td>
              <div class="d-flex align-items-center">
                <?php if(Auth::user()->role_id != 1): ?>
                  <a class="me-2" href="<?php echo e(route('admin.edit.product', $data->uuid)); ?>">
                    <i class="mdi mdi-pencil-outline text-secondary"></i>
                  </a>
                <?php endif; ?>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <?php if (isset($component)) { $__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DropdownItem::class, ['label' => 'Detail','variant' => 'secondary','icon' => 'eye-outline','route' => route('admin.detail.product', $data->slug)]); ?>
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
                    <?php if(Auth::user()->role_id == 2): ?>
                      <form action="<?php echo e(route('admin.destroy.product', $data->slug)); ?>" method="POST">
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
    </table>
    <?php if (isset($component)) { $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Pagination::class, ['pages' => $datas]); ?>
<?php $component->withName('pagination'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966)): ?>
<?php $component = $__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966; ?>
<?php unset($__componentOriginal41fa1a726c2cdc888fd1699c1c531da853ade966); ?>
<?php endif; ?>
  </div>
</div>
<?php /**PATH C:\laragon\www\warungdigital\resources\views/components/products-tabel.blade.php ENDPATH**/ ?>