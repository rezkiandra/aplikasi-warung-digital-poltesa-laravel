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
            <th class="text-truncate">Email Verifikasi</th>
            <th class="text-truncate">Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td class="text-truncate">
                <span class="badge bg-label-primary text-uppercase">#<?php echo e(Str::substr($data->uuid, 0, 4)); ?></span>
              </td>
              <td>
                <div class="d-flex align-items-center">
                  
                  <div>
                    <h6 class="mb-1 text-truncate"><?php echo e($data->name); ?></h6>
                    <small class="text-truncate badge bg-label-info rounded"><?php echo e($data->slug); ?></small>
                  </div>
                </div>
              </td>
              <td class="text-truncate"><?php echo e($data->email); ?></td>
              <td class="text-truncate">
                <?php if($data->role_id == 2): ?>
                  <span class="badge bg-label-info text-uppercase"><?php echo e($data->role->role_name); ?></span>
                <?php elseif($data->role_id == 3): ?>
                  <span class="badge bg-label-primary text-uppercase"><?php echo e($data->role->role_name); ?></span>
                <?php endif; ?>
              </td>
              <td class="text-truncate fw-medium"><?php echo e(date('M d, H:i', strtotime($data->created_at))); ?>

                <?php echo e($data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM'); ?></td>
              <td class="text-truncate"><?php echo e(date('M d, H:i', strtotime($data->email_verified_at))); ?>

                <?php echo e($data->created_at->format('H:i') > '12:00' ? 'PM' : 'AM'); ?></td>
              <td>
                <?php if($data->role_id == 1): ?>
                  <?php if($data->seller && $data->seller->status == 'active'): ?>
                    <span class="badge bg-label-success rounded-pill text-uppercase">
                      <?php echo e($data->seller->status); ?>

                    </span>
                  <?php elseif($data->seller && $data->seller->status == 'pending'): ?>
                    <span class="badge bg-label-warning rounded-pill text-uppercase">
                      <?php echo e($data->seller->status); ?>

                    </span>
                  <?php elseif($data->seller && $data->seller->status == 'inactive'): ?>
                    <span class="badge bg-label-danger rounded-pill text-uppercase">
                      <?php echo e($data->seller->status); ?>

                    </span>
                  <?php endif; ?>
                <?php elseif($data->role_id == 2): ?>
                  <?php if($data->seller && $data->seller->status == 'active'): ?>
                    <span class="badge bg-label-success rounded-pill text-uppercase">
                      <?php echo e($data->seller->status); ?>

                    </span>
                  <?php elseif($data->seller && $data->seller->status == 'pending'): ?>
                    <span class="badge bg-label-warning rounded-pill text-uppercase">
                      <?php echo e($data->seller->status); ?>

                    </span>
                  <?php elseif($data->seller && $data->seller->status == 'inactive'): ?>
                    <span class="badge bg-label-danger rounded-pill text-uppercase">
                      <?php echo e($data->seller->status); ?>

                    </span>
                  <?php endif; ?>
                <?php elseif($data->role_id == 3): ?>
                  <?php if($data->customer && $data->customer->status == 'active'): ?>
                    <span class="badge bg-label-success rounded-pill text-uppercase">
                      <?php echo e($data->customer->status); ?>

                    </span>
                  <?php elseif($data->customer && $data->customer->status == 'pending'): ?>
                    <span class="badge bg-label-warning rounded-pill text-uppercase">
                      <?php echo e($data->customer->status); ?>

                    </span>
                  <?php elseif($data->customer && $data->customer->status == 'inactive'): ?>
                    <span class="badge bg-label-danger rounded-pill text-uppercase">
                      <?php echo e($data->customer->status); ?>

                    </span>
                  <?php endif; ?>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        <tfoot class="table-light">
          <tr>
            <th class="text-truncate">UUID</th>
            <th class="text-truncate">User</th>
            <th class="text-truncate">Email</th>
            <th class="text-truncate">Role</th>
            <th class="text-truncate">Dibuat Pada</th>
            <th class="text-truncate">Email Verifikasi</th>
            <th class="text-truncate">Status</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/user-table-card.blade.php ENDPATH**/ ?>