<div class="card">
  <div class="card-datatable table-responsive">
    <table class="dt-table table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Pelanggan</th>
          <th>Produk</th>
          <th>Total</th>
          <th>Status</th>
          <th>Tanggal Pemesanan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td class="text-primary">
              
              <span
                class="badge rounded p-1 bg-label-primary text-uppercase">#<?php echo e(Str::substr($data->uuid, 0, 5)); ?></span>
            </td>
            <td>
              <div class="d-flex justify-content-start align-items-center user-name">
                <div class="avatar-wrapper me-3">
                  <div class="avatar avatar-sm">
                    <img src="<?php echo e(asset('storage/' . $data->customer->image)); ?>" alt="Avatar" class="rounded">
                  </div>
                </div>
                <div class="d-flex flex-column">
                  <a href="pages-profile-user.html" class="text-truncate text-heading">
                    <span class="fw-medium"><?php echo e($data->customer->full_name); ?></span>
                  </a>
                  <small class="text-truncate"><?php echo e($data->customer->user->email); ?></small>
                </div>
              </div>
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
                  <small class="text-truncate">Rp <?php echo e(number_format($data->product->price, 0, ',', '.')); ?> -
                    <?php echo e($data->quantity); ?> pcs</small>
                </div>
              </div>
            </td>
            <td>
              <span class="mb-0 w-px-100 d-flex align-items-center">
                <span class="fw-medium">Rp <?php echo e(number_format($data->total_price, 0, ',', '.')); ?></span>
              </span>
            </td>
            <td>
              <h6
                class="mb-0 w-px-100 d-flex align-items-center <?php if($data->status == 'unpaid'): ?> text-warning <?php elseif($data->status == 'canceled'): ?> text-dark <?php elseif($data->status == 'paid'): ?> text-success <?php endif; ?> text-uppercase">
                <i class="mdi mdi-circle fs-tiny me-1"></i>
                <?php echo e($data->status); ?>

              </h6>
            </td>
            <td class="">
              <span class="badge bg-label-info"><?php echo e(date('d M Y, H:i', strtotime($data->updated_at))); ?>

                <?php echo e($data->updated_at->format('H:i') > '12:00' ? 'PM' : 'AM'); ?></span>
            </td>
            <td>
              <div class="d-lg-flex flex-row gap-1">
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="mdi mdi-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <?php if($data->status == 'unpaid'): ?>
                      <?php if (isset($component)) { $__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DropdownItem::class, ['label' => 'Bayar','variant' => 'primary','icon' => 'wallet-outline','route' => route('midtrans.checkout', $data->uuid)]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\DropdownItem::class, ['label' => 'Batal','variant' => 'danger','icon' => 'trash-can-outline','route' => route('midtrans.cancelled', $data->uuid)]); ?>
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
                    <?php elseif($data->status == 'paid'): ?>
                      <?php if (isset($component)) { $__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DropdownItem::class, ['label' => 'Detail','variant' => 'dark','icon' => 'eye-outline','route' => route('midtrans.detail', $data->uuid)]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\DropdownItem::class, ['label' => 'Cetak','variant' => 'warning','icon' => 'file-outline','route' => route('midtrans.detail', $data->uuid)]); ?>
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
                    <?php elseif($data->status == 'cancelled'): ?>
                      <?php if (isset($component)) { $__componentOriginal449bfa6e40fc6b9502e7641b2b70c69491540e98 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DropdownItem::class, ['label' => 'Detail','variant' => 'dark','icon' => 'eye-outline','route' => route('midtrans.detail', $data->uuid)]); ?>
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
                      <?php if(auth()->user()->role_id === 3): ?>
                        <form action="<?php echo e(route('order.update', $data->uuid)); ?>" method="POST">
                          <?php echo csrf_field(); ?>
                          <?php echo method_field('PUT'); ?>
                          <button type="submit" class="dropdown-item waves-effect text-primary">
                            <i class="mdi mdi-cart-outline text-primary me-1"></i>Beli Kembali
                          </button>
                        </form>
                      <?php endif; ?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
      <tfoot>
        <tr>
          <th>ID</th>
          <th>Pelanggan</th>
          <th>Produk</th>
          <th>Total</th>
          <th>Status</th>
          <th>Tanggal Pemesanan</th>
          <th>Aksi</th>
        </tr>
      </tfoot>
    </table>
  </div>
</div>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/order-tabel.blade.php ENDPATH**/ ?>