<?php
  $products = \App\Models\Products::where('seller_id', $seller->id)
      ->orderBy('id', 'desc')
      ->paginate(5);
  $totalProducts = \App\Models\Products::where('seller_id', $seller->id)->count();
  $totalEarnings = number_format(
      \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
          ->join('sellers', 'products.seller_id', '=', 'sellers.id', 'left')
          ->where('sellers.id', $seller->id)
          ->sum('total_price'),
      0,
      ',',
      '.',
  );

  $totalOrders = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->join('sellers', 'products.seller_id', '=', 'sellers.id', 'left')
      ->where('sellers.id', $seller->id)
      ->count();

  $username = \App\Models\User::where('id', $seller->user_id)->first()->name;
  $email = \App\Models\User::where('id', $seller->user_id)->first()->email;
  $seller_id = Hash::make($seller->uuid);
  $seller_id = Str::substr($seller_id, 0, 10);
  $seller_id = Str::replace('$', '', $seller_id);
  $seller_id = Str::upper($seller_id);
?>

<?php $__env->startSection('title', 'Detail Penjual'); ?>
<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginale114a3941ffeb1a91b2a9dbe363caa4315c3186f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailBreadcrumbs::class, ['id' => 'Seller ID #' . $seller_id,'created' => date('d F, H:i', strtotime($seller->created_at)) > '12.00'
      ? date('d F, H:i:s', strtotime($seller->created_at)) . ' PM'
      : date('d F, H:i:s', strtotime($seller->created_at)) . ' AM']); ?>
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
    <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
      <div class="card mb-4">
        <?php if (isset($component)) { $__componentOriginal34646d07716c22cb42a594afac6c2c121cba48cf = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailForm::class, ['image' => asset('storage/' . $seller->image),'name' => $seller->full_name,'id' => '#' . $seller_id,'phone' => $seller->phone_number,'address' => $seller->address,'status' => $seller->status,'totalOrder' => $totalProducts,'labelOrder' => 'Produk','spentCost' => 'Rp' . $totalEarnings,'labelCost' => 'Pendapatan','username' => $username,'email' => $email,'type' => 'button','href' => route('admin.edit.seller', $seller->uuid),'variant' => 'primary','icon' => 'pencil-outline','label' => 'Edit Details','class' => 'btn-sm']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\DetailCard::class, ['title' => 'Pesanan','count' => $totalOrders,'countDescription' => 'items pesanan','icon' => 'star-outline','variant' => 'warning']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\DetailCard::class, ['title' => 'Produk','count' => $totalProducts,'countDescription' => 'items produk','icon' => 'cart-outline','variant' => 'info']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\DetailCard::class, ['title' => 'Produk','count' => $totalProducts,'countDescription' => 'items produk','icon' => 'cart-outline','variant' => 'info']); ?>
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
      <?php if (isset($component)) { $__componentOriginal5f11842853e2096a673fe4741c25fade360a7941 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductsSellerDetail::class, ['datas' => $products,'title' => 'Produk terbaru']); ?>
<?php $component->withName('products-seller-detail'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5f11842853e2096a673fe4741c25fade360a7941)): ?>
<?php $component = $__componentOriginal5f11842853e2096a673fe4741c25fade360a7941; ?>
<?php unset($__componentOriginal5f11842853e2096a673fe4741c25fade360a7941); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal88651d395edd0be47347d8b81654314be4dbf2d1)): ?>
<?php $component = $__componentOriginal88651d395edd0be47347d8b81654314be4dbf2d1; ?>
<?php unset($__componentOriginal88651d395edd0be47347d8b81654314be4dbf2d1); ?>
<?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/admin/sellers/detail.blade.php ENDPATH**/ ?>