<div class="col-md-12 mb-4 mb-lg-0">
  <div class="card">
    <h5 class="card-header"><?php echo e($title); ?></h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover table-responsive">
        <thead>
          <th>Produk</th>
          <th>Kategori / Penjual</th>
          <th>Harga</th>
          <th>Stok</th>
        </thead>
        <tbody>
          <?php $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td class="sorting_1">
                <div class="d-flex justify-content-start align-items-center product-name">
                  <div class="avatar-wrapper me-3">
                    <div class="avatar rounded-2 bg-label-secondary">
                      <img src="<?php echo e(asset('storage/' . $data->image)); ?>" class="rounded-2">
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    <span class="text-nowrap text-heading fw-medium"><?php echo e($data->name); ?></span>
                    <small class="d-flex flex-row text-truncate d-none d-sm-block d-flex">
                      <span class="fw-medium"><?php echo e(Str::limit($data->description, 30)); ?></span>
                    </small>
                  </div>
                </div>
              </td>
              <td class="sorting_1">
                <div class="d-flex flex-column justify-content-start product-name">
                  <span class="fw-medium d-flex align-items-center">
                    <span class="d-flex justify-content-center align-items-center text-dark">
                      <?php echo e($data->category->name); ?>

                    </span>
                  </span>
                  <?php if(Auth::user()->role_id == 1): ?>
                    <small class="fw-medium d-flex align-items-center">
                      <?php echo e($data->seller->full_name); ?> - <?php echo e($data->seller->user->email); ?>

                    </small>
                  <?php endif; ?>
                </div>
              </td>
              <td>
                <span class="fw-medium">Rp <?php echo e(number_format($data->price, 0, ',', '.')); ?></span>
              </td>
              <td>
                <span class="fw-medium"><?php echo e($data->stock); ?> pcs</span>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/products-seller-detail.blade.php ENDPATH**/ ?>