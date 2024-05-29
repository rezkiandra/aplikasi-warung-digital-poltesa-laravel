<div class="row g-4">
  <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-xl-4 col-lg-6 col-md-6">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <p class="mb-0">Total
              <?php echo e(\App\Models\User::where('role_id', $data->id)->count()); ?> pengguna
            </p>
            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
              <li class="avatar">
                <?php if(\App\Models\User::where('role_id', $data->id)->count() >= 6): ?>
                  <span class="avatar-initial rounded-circle pull-up bg-lighter text-body" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" data-bs-original-title="3 more">+3
                  </span>
                <?php elseif(\App\Models\User::where('role_id', $data->id)->count() == 5): ?>
                  <span class="avatar-initial rounded-circle pull-up bg-lighter text-body" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" data-bs-original-title="2 more">+2
                  </span>
                <?php elseif(\App\Models\User::where('role_id', $data->id)->count() == 4): ?>
                  <span class="avatar-initial rounded-circle pull-up bg-lighter text-body" data-bs-toggle="tooltip"
                    data-bs-placement="bottom" data-bs-original-title="1 more">+1
                  </span>
                <?php elseif(\App\Models\User::where('role_id', $data->id)->count() <= 3): ?>
                  <span class="avatar-initial rounded-circle pull-up bg-lighter text-body" data-bs-toggle="tooltip"
                    data-bs-placement="bottom"
                    data-bs-original-title="<?php echo e(\App\Models\User::where('role_id', $data->id)->count()); ?>">
                    <?php echo e(\App\Models\User::where('role_id', $data->id)->count()); ?>

                  </span>
                <?php endif; ?>
              </li>
            </ul>
          </div>
          <div class="d-flex justify-content-between align-items-end">
            <div class="role-heading">
              <div class="d-flex align-items-center justify-content-center mb-2 gap-2">
                <?php if($data->role_name == 'Admin'): ?>
                  <div class="avatar-initial bg-label-danger rounded px-1">
                    <i class="mdi mdi-laptop mdi-24px"></i>
                  </div>
                <?php elseif($data->role_name == 'Seller'): ?>
                  <div class="avatar-initial bg-label-info rounded px-1">
                    <i class="mdi mdi-store-outline mdi-24px"></i>
                  </div>
                <?php elseif($data->role_name == 'Customer'): ?>
                  <div class="avatar-initial bg-label-warning rounded px-1">
                    <i class="mdi mdi-account-outline mdi-24px"></i>
                  </div>
                <?php elseif($data->role_name == 'Super Admin'): ?>
                  <div class="avatar-initial bg-label-primary rounded px-1">
                    <i class="mdi mdi-shield-crown-outline mdi-24px"></i>
                  </div>
                <?php elseif($data->role_name == 'Maintainer'): ?>
                  <div class="avatar-initial bg-label-success rounded px-1">
                    <i class="mdi mdi-bug-check-outline mdi-24px"></i>
                  </div>
                <?php elseif($data->role_name == 'Developer'): ?>
                  <div class="avatar-initial bg-label-dark rounded px-1">
                    <i class="mdi mdi-code-block-tags mdi-24px"></i>
                  </div>
                <?php else: ?>
                  <div class="avatar-initial bg-label-secondary rounded px-1">
                    <i class="mdi mdi-chart-donut mdi-24px"></i>
                  </div>
                <?php endif; ?>
                <h5 class="mb-0"><?php echo e($data->role_name); ?></h5>
              </div>
              <a href="<?php echo e(route('admin.edit.role', $data->slug)); ?>" class="role-edit-modal">
                <span>Edit Role</span>
              </a>
            </div>
            <a href="javascript:void(0);" class="text-muted">
              <i class="mdi mdi-trash-can mdi-20px"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <div class="col-lg-4 col-12 col-md-6">
    <div class="card h-100">
      <div class="row h-100">
        <div class="col-4">
          <div class="d-flex align-items-center h-100 justify-content-center">
            <img src="<?php echo e(asset('materio/assets/img/illustrations/misc-under-maintenance.png')); ?>" class="img-fluid"
              alt="Image">
          </div>
        </div>
        <div class="col-8">
          <div class="card-body text-sm-end text-center ps-sm-0">
            <?php if (isset($component)) { $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BasicButton::class, ['label' => 'Tambah','icon' => 'plus','class' => 'w-0 text-uppercase mb-5','variant' => 'primary','href' => route('admin.create.role')]); ?>
<?php $component->withName('basic-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8)): ?>
<?php $component = $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8; ?>
<?php unset($__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8); ?>
<?php endif; ?>
            <p class="mb-0">Tambah role, jika perlu</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div><?php /**PATH C:\laragon\www\warungdigital\resources\views/components/role/roles-card.blade.php ENDPATH**/ ?>