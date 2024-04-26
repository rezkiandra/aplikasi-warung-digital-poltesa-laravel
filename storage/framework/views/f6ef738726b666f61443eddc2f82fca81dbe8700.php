<?php
  $currentSeller = \App\Models\Seller::where('user_id', Auth::user()->id)->first();
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();

  $totalProductCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)->count();
  $productPercentageCurrentSeller = round(
      (\App\Models\Products::where('seller_id', Auth::user()->seller->id)->count() ??
          0 / \App\Models\ProductCategory::count()) *
          100,
      2,
  );

  $totalProductTopSaleCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)
      ->join('orders', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $productPercentageTopSaleCurrentSeller = round(
      (\App\Models\Products::where('seller_id', Auth::user()->seller->id)
          ->join('orders', 'products.id', '=', 'orders.product_id', 'left')
          ->where('orders.product_id', '>=', 20)
          ->count() ??
          0 / \App\Models\ProductCategory::count()) *
          100,
      2,
  );

  $totalProductDiscountCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)
      ->join('orders', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $productPercentageDiscountCurrentSeller = round(
      (\App\Models\Products::where('seller_id', Auth::user()->seller->id)
          ->join('orders', 'products.id', '=', 'orders.product_id', 'left')
          ->where('orders.product_id', '>=', 20)
          ->count() ??
          0 / \App\Models\ProductCategory::count()) *
          100,
      2,
  );

  $totalProductOutOfStockCurrentSeller = \App\Models\Products::where('stock', '=', 0)
      ->where('seller_id', Auth::user()->seller->id)
      ->count();
  $productPercentageOutOfStockCurrentSeller = round(
      (\App\Models\Products::where('stock', '=', 0)
          ->where('seller_id', Auth::user()->seller->id)
          ->count() ??
          0 / \App\Models\ProductCategory::count()) *
          100,
      2,
  );

  $productPrePercentageCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)->count();
  $productPrePercentageTopSaleCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)
      ->join('orders', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $productPrePercentageDiscountCurrentSeller = \App\Models\Products::where('seller_id', Auth::user()->seller->id)
      ->join('orders', 'products.id', '=', 'orders.product_id', 'left')
      ->where('orders.product_id', '>=', 20)
      ->count();
  $productPrePentageOutOfStockCurrentSeller = \App\Models\Products::where('stock', '=', 0)->count();
?>


<?php $__env->startSection('title', 'Products'); ?>

<?php $__env->startSection('content'); ?>
  <h4 class="mb-1">Product list</h4>
  <p class="mb-3">A product will be purchased by customers</p>
  <?php if($currentSeller->status == 'active'): ?>
    <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'primary','message' => 'Your account is active. And you can add new product','icon' => 'account-check-outline']); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BasicButton::class, ['label' => 'Add new product','icon' => 'plus','class' => 'w-0 text-uppercase mb-3','variant' => 'primary','href' => route('seller.create.product')]); ?>
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
  <?php elseif($currentSeller->status == 'pending'): ?>
    <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'warning','message' => 'Your account is pending. Please wait for the admin to approve your account.','icon' => 'account-search-outline']); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
  <?php elseif($currentSeller->status == 'inactive'): ?>
    <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'danger','message' => 'Your account is inactive. Please contact the admin to reactive your account.','icon' => 'account-off-outline']); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975)): ?>
<?php $component = $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975; ?>
<?php unset($__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975); ?>
<?php endif; ?>
  <?php endif; ?>

  <?php if (isset($component)) { $__componentOriginal4b67e79e8bcd65da7e2e7af1084618cdc76bc064 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductSeparator::class, []); ?>
<?php $component->withName('product-separator'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductCard::class, ['datas' => $products,'condition' => $totalProductCurrentSeller,'label' => 'Products','icon' => 'cart-outline','variant' => 'primary','percentage' => $productPercentageCurrentSeller
          ? '+' . $productPercentageCurrentSeller . '%'
          : '-' . $productPrePercentageCurrentSeller . '%','class' => 'border-end']); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['totalOrders' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Total products')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5)): ?>
<?php $component = $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5; ?>
<?php unset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductCard::class, ['datas' => $products,'condition' => $totalProductTopSaleCurrentSeller,'label' => 'Top Sale','icon' => 'shopping-outline','variant' => 'info','percentage' => $productPercentageTopSaleCurrentSeller
          ? '+' . $productPercentageTopSaleCurrentSeller . '%'
          : '-' . $productPrePercentageTopSaleCurrentSeller . '%','class' => 'border-end']); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['totalOrders' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Total top sale')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5)): ?>
<?php $component = $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5; ?>
<?php unset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductCard::class, ['datas' => $products,'condition' => $totalProductDiscountCurrentSeller,'label' => 'Discount','icon' => 'wallet-giftcard','variant' => 'success','percentage' => $productPercentageDiscountCurrentSeller
          ? '+' . $totalProductDiscountCurrentSeller . '%'
          : '-' . $productPrePercentageDiscountCurrentSeller . '%','class' => 'border-end']); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['totalOrders' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Total discount')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5)): ?>
<?php $component = $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5; ?>
<?php unset($__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal5e109b4b7def75bd69cfe491f655f877e39a59a5 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductCard::class, ['datas' => $products,'condition' => $totalProductOutOfStockCurrentSeller,'label' => 'Out of Stock','icon' => 'sale-outline','variant' => 'dark','percentage' => $productPercentageOutOfStockCurrentSeller
          ? '+' . $totalProductOutOfStockCurrentSeller . '%'
          : '-' . $productPrePentageOutOfStockCurrentSeller . '%']); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['totalOrders' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Total out of stock')]); ?>
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

  <?php if (isset($component)) { $__componentOriginal6c16c6e9de925c598ffb6e0e1874d16063528663 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductsTabelSeller::class, ['title' => 'List of products','datas' => $products]); ?>
<?php $component->withName('products-tabel-seller'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6c16c6e9de925c598ffb6e0e1874d16063528663)): ?>
<?php $component = $__componentOriginal6c16c6e9de925c598ffb6e0e1874d16063528663; ?>
<?php unset($__componentOriginal6c16c6e9de925c598ffb6e0e1874d16063528663); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/seller/products/index.blade.php ENDPATH**/ ?>