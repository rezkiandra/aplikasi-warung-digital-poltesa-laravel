<?php
  $products = \App\Models\Products::paginate(10);
  $totalProducts = \App\Models\Products::count();
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();

  $totalOrders = \App\Models\Order::all()->count();
  $totalTopSale = \App\Models\Order::join('products', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $totalDiscount = 0;
  $totalOutOfStock = \App\Models\Products::where('stock', '=', 0)->count();
?>


<?php $__env->startSection('title', 'Produk'); ?>
<?php $__env->startSection('content'); ?>
  <h4 class="mb-1">Daftar Produk</h4>
  <p class="mb-3">Sebuah produk akan dibeli oleh pelanggan</p>
  <?php if(Auth::user()->role_id == 2): ?>
    <?php if (isset($component)) { $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BasicButton::class, ['label' => 'Tambah Produk','icon' => 'plus','class' => 'w-0 text-uppercase mb-4','variant' => 'primary','href' => route('admin.create.product')]); ?>
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
  <?php endif; ?>

  <?php if (isset($component)) { $__componentOriginal4b67e79e8bcd65da7e2e7af1084618cdc76bc064 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductSeparator::class, []); ?>
<?php $component->withName('product-separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductCard::class, ['datas' => $products,'condition' => $totalProducts,'label' => 'Produk','icon' => 'cart-outline','variant' => 'primary','class' => 'border-end','description' => 'Jumlah Produk']); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5)): ?>
<?php $component = $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5; ?>
<?php unset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductCard::class, ['datas' => $products,'condition' => $totalTopSale,'label' => 'Produk Paling Laku','icon' => 'shopping-outline','variant' => 'info','class' => 'border-end']); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5)): ?>
<?php $component = $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5; ?>
<?php unset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductCard::class, ['datas' => $products,'condition' => $totalDiscount,'label' => 'Produk Diskon','icon' => 'wallet-giftcard','variant' => 'success','class' => 'border-end']); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5)): ?>
<?php $component = $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5; ?>
<?php unset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductCard::class, ['datas' => $products,'condition' => $totalOutOfStock,'label' => 'Produk Habis','icon' => 'sale-outline','variant' => 'dark']); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5)): ?>
<?php $component = $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5; ?>
<?php unset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5); ?>
<?php endif; ?>
   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4b67e79e8bcd65da7e2e7af1084618cdc76bc064)): ?>
<?php $component = $__componentOriginal4b67e79e8bcd65da7e2e7af1084618cdc76bc064; ?>
<?php unset($__componentOriginal4b67e79e8bcd65da7e2e7af1084618cdc76bc064); ?>
<?php endif; ?>

  <?php if (isset($component)) { $__componentOriginal42c34a2cee95a541f23e2bf4c5fd2cd07a02f245 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductsTabel::class, ['title' => 'Data Produk','datas' => $products,'fields' => ['no', 'produk', 'kategori / penjual', 'harga', 'stok', 'Publish Pada', 'Aksi']]); ?>
<?php $component->withName('products-tabel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal42c34a2cee95a541f23e2bf4c5fd2cd07a02f245)): ?>
<?php $component = $__componentOriginal42c34a2cee95a541f23e2bf4c5fd2cd07a02f245; ?>
<?php unset($__componentOriginal42c34a2cee95a541f23e2bf4c5fd2cd07a02f245); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/products/index.blade.php ENDPATH**/ ?>