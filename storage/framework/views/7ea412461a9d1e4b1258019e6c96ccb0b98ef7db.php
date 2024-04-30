<div class="col-12">
  <div class="card">
    <div class="table-responsive">
      <table class="table">
        <thead class="table-light">
          <tr>
            <th class="text-truncate">UUID</th>
            <th class="text-truncate">User</th>
            <th class="text-truncate">Email</th>
            <th class="text-truncate">Role</th>
            <th class="text-truncate">Dibuat Pada</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td class="text-truncate">
                <?php if($data->role_id == 1): ?>
                  <span class="badge bg-label-danger text-uppercase">#<?php echo e(Str::substr($data->uuid, 0, 4)); ?></span>
                <?php elseif($data->role_id == 2): ?>
                  <span class="badge bg-label-info text-uppercase">#<?php echo e(Str::substr($data->uuid, 0, 4)); ?></span>
                <?php elseif($data->role_id == 3): ?>
                  <span class="badge bg-label-primary text-uppercase">#<?php echo e(Str::substr($data->uuid, 0, 4)); ?></span>
                <?php endif; ?>
              </td>
              <td>
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-sm me-3">
                    <?php if($data->seller): ?>
                      <img src="<?php echo e(asset('storage/' . $data->seller->image)); ?>" alt="Avatar" class="rounded">
                    <?php elseif($data->customer): ?>
                      <img src="<?php echo e(asset('storage/' . $data->customer->image)); ?>" alt="Avatar" class="rounded">
                    <?php else: ?>
                      <img src="<?php echo e(asset('materio/assets/img/favicon/favicon.ico')); ?>" alt="Avatar" class="rounded">
                    <?php endif; ?>
                  </div>
                  <div>
                    <h6 class="mb-1 text-truncate"><?php echo e($data->name); ?></h6>
                    <?php if($data->role_id == 1): ?>
                      <small class="text-truncate badge bg-label-danger rounded"><?php echo e($data->slug); ?></small>
                    <?php elseif($data->role_id == 2): ?>
                      <small class="text-truncate badge bg-label-info rounded"><?php echo e($data->slug); ?></small>
                    <?php elseif($data->role_id == 3): ?>
                      <small class="text-truncate badge bg-label-primary rounded"><?php echo e($data->slug); ?></small>
                    <?php endif; ?>
                  </div>
                </div>
              </td>
              <td class="text-truncate"><?php echo e($data->email); ?></td>
              <td class="text-truncate">
                <?php if($data->role_id == 1): ?>
                  <span class="badge bg-label-danger text-uppercase"><?php echo e($data->role->role_name); ?></span>
                <?php elseif($data->role_id == 2): ?>
                  <span class="badge bg-label-info text-uppercase"><?php echo e($data->role->role_name); ?></span>
                <?php elseif($data->role_id == 3): ?>
                  <span class="badge bg-label-primary text-uppercase"><?php echo e($data->role->role_name); ?></span>
                <?php endif; ?>
              </td>
              <td class="text-truncate fw-medium"><?php echo e(date('M d, H:i', strtotime($data->created_at))); ?>

                <?php echo e($data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM'); ?></td>
              
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        
      </table>
    </div>
  </div>
</div>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/user-table-card.blade.php ENDPATH**/ ?>