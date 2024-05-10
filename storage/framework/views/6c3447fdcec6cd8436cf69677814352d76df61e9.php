<?php
  $totalOrder = \App\Models\Order::where('customer_id', $customer->id)->count();
  $spentCost = number_format(\App\Models\Order::where('customer_id', $customer->id)->where('orders.status', 'paid')->sum('total_price'), 0, ',', '.');
  $totalCarts = \App\Models\ProductsCart::where('customer_id', $customer->id)->count();
  $totalWishlist = \App\Models\Wishlist::where('customer_id', $customer->id)->count();
  $orders = \App\Models\Order::where('customer_id', $customer->id)
      ->take(6)
      ->orderBy('updated_at', 'desc')
      ->get();

  $username = \App\Models\User::where('id', $customer->user_id)->first()->name;
  $email = \App\Models\User::where('id', $customer->user_id)->first()->email;
  $customer_id = Hash::make($customer->uuid);
  $customer_id = Str::substr($customer_id, 0, 10);
  $customer_id = Str::replace('$', '', $customer_id);
  $customer_id = Str::upper($customer_id);
?>


<?php $__env->startSection('title', 'Detail Pelanggan'); ?>
<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginale114a3941ffeb1a91b2a9dbe363caa4315c3186f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailBreadcrumbs::class, ['id' => 'Customer ID #' . $customer_id,'created' => date('d F, H:i', strtotime($customer->created_at)) > '12.00'
      ? date('d F, H:i:s', strtotime($customer->created_at)) . ' PM'
      : date('d F, H:i:s', strtotime($customer->created_at)) . ' AM']); ?>
<?php $component->withName('detail-breadcrumbs'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale114a3941ffeb1a91b2a9dbe363caa4315c3186f)): ?>
<?php $component = $__componentOriginale114a3941ffeb1a91b2a9dbe363caa4315c3186f; ?>
<?php unset($__componentOriginale114a3941ffeb1a91b2a9dbe363caa4315c3186f); ?>
<?php endif; ?>

  <div class="row">
    <div class="col-xl-4 col-lg-5 col-md-5">
      <div class="card mb-4">
        <?php if (isset($component)) { $__componentOriginal34646d07716c22cb42a594afac6c2c121cba48cf = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailForm::class, ['image' => asset('storage/' . $customer->image),'name' => $customer->full_name,'id' => '#' . $customer_id,'phone' => $customer->phone_number,'address' => $customer->address,'status' => $customer->status,'totalOrder' => $totalOrder,'labelOrder' => 'Pesanan','spentCost' => 'Rp ' . $spentCost,'labelCost' => 'Pembelian','username' => $username,'email' => $email,'type' => 'button','href' => route('admin.edit.customer', $customer->uuid),'variant' => 'primary','icon' => 'pencil-outline','label' => 'Edit Details','class' => 'btn-sm']); ?>
<?php $component->withName('detail-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal34646d07716c22cb42a594afac6c2c121cba48cf)): ?>
<?php $component = $__componentOriginal34646d07716c22cb42a594afac6c2c121cba48cf; ?>
<?php unset($__componentOriginal34646d07716c22cb42a594afac6c2c121cba48cf); ?>
<?php endif; ?>
      </div>
    </div>

    <?php if (isset($component)) { $__componentOriginal88651d395edd0be47347d8b81654314be4dbf2d1 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailCardContent::class, []); ?>
<?php $component->withName('detail-card-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
      <?php if (isset($component)) { $__componentOriginal975c49134212f8552006a5fffb48497b4f040dbf = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailCard::class, ['title' => 'Wishlist','count' => $totalWishlist,'countDescription' => 'items produk','icon' => 'star-outline','variant' => 'warning']); ?>
<?php $component->withName('detail-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal975c49134212f8552006a5fffb48497b4f040dbf)): ?>
<?php $component = $__componentOriginal975c49134212f8552006a5fffb48497b4f040dbf; ?>
<?php unset($__componentOriginal975c49134212f8552006a5fffb48497b4f040dbf); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal975c49134212f8552006a5fffb48497b4f040dbf = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailCard::class, ['title' => 'Keranjang','count' => $totalCarts,'countDescription' => 'items produk','icon' => 'cart-outline','variant' => 'info']); ?>
<?php $component->withName('detail-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal975c49134212f8552006a5fffb48497b4f040dbf)): ?>
<?php $component = $__componentOriginal975c49134212f8552006a5fffb48497b4f040dbf; ?>
<?php unset($__componentOriginal975c49134212f8552006a5fffb48497b4f040dbf); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal9ccc8442136a95f4c36f6104667ad031ae28c517 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\OrdersCustomerDetail::class, ['datas' => $orders]); ?>
<?php $component->withName('orders-customer-detail'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ccc8442136a95f4c36f6104667ad031ae28c517)): ?>
<?php $component = $__componentOriginal9ccc8442136a95f4c36f6104667ad031ae28c517; ?>
<?php unset($__componentOriginal9ccc8442136a95f4c36f6104667ad031ae28c517); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88651d395edd0be47347d8b81654314be4dbf2d1)): ?>
<?php $component = $__componentOriginal88651d395edd0be47347d8b81654314be4dbf2d1; ?>
<?php unset($__componentOriginal88651d395edd0be47347d8b81654314be4dbf2d1); ?>
<?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/admin/customers/detail.blade.php ENDPATH**/ ?>