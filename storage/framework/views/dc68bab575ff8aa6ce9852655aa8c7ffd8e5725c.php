<div class="col-md-12">
  <div class="card">
    <div class="card-datatable table-responsive">
      <table class="dt-table table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Product</th>
            <th>Total</th>
            <th>Date</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td class="text-primary">
                
                <span class="badge rounded p-1 bg-label-primary text-uppercase">#<?php echo e(Str::substr($data->uuid, 0, 5)); ?></span>
              </td>
              <td>
                <div class="d-flex justify-content-start align-items-center user-name">
                  <div class="avatar-wrapper me-3">
                    <div class="avatar avatar-sm">
                      <img src="<?php echo e(asset('storage/' . $data->product->image)); ?>" alt="Avatar" class="rounded">
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    <a href="pages-profile-user.html" class="text-truncate text-heading">
                      <span class="fw-medium"><?php echo e($data->product->name); ?></span>
                    </a>
                    <small class="text-truncate">Rp<?php echo e(number_format($data->product->price, 0, ',', '.')); ?> -
                      <?php echo e($data->quantity); ?> pcs</small>
                  </div>
                </div>
              </td>
              <td>
                <span class="mb-0 w-px-100 d-flex align-items-center">
                  <span class="fw-medium">Rp<?php echo e(number_format($data->total_price, 0, ',', '.')); ?></span>
                </span>
              </td>
              <td class="">
                <span class="badge bg-label-info"><?php echo e(date('d M Y, H:i', strtotime($data->updated_at))); ?></span>
              </td>
              <td>
                <h6
                  class="mb-0 w-px-100 d-flex align-items-center <?php if($data->status == 'unpaid'): ?> text-warning <?php elseif($data->status == 'canceled'): ?> text-dark <?php elseif($data->status == 'paid'): ?> text-success <?php endif; ?> text-capitalize">
                  <i class="mdi mdi-circle fs-tiny me-1"></i>
                  <?php echo e($data->status); ?>

                </h6>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/orders-customer-detail.blade.php ENDPATH**/ ?>