<?php
  // Greetings Card
  $message = 'Dashboard penjual berisi informasi produk penjual dan transaksi';
  $greetings = 'Halo, ' . auth()->user()->name;
  $descriptionGreetings = 'Selamat datang di dashboard seller';
  $label = 'Total Produk';
  $value = \App\Models\Products::where('seller_id', auth()->user()->seller->id)->count();
  $actionLabel = 'Selengkapnya';
  $route = route('seller.products');

  // Transaction Card
  $title = 'Transaksi';
  $description = 'Total transaksi dibulan ini';

  // Earnings Card
  $earnings = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->orderBy('orders.created_at', 'desc')
      ->take(5)
      ->get();
  $titleEarnings = 'Total Pendapatan';
  $earningsValue = 'Rp' . number_format($earnings->sum('total_price'), 2, '.', ',');
  $descriptionEarnings = 'Total pendapatan dibulan ini';

  // Transaction Item Card
  $totalOrders = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->count();
  $totalPaid = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->count();
  $totalUnpaid = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'unpaid')
      ->count();
  $totalCancelled = \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'cancelled')
      ->count();

  // Top Card Content
  // get top buying customers
  $topCustomers = \App\Models\Order::selectRaw('customer_id, count(*) as total')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->groupBy('customer_id')
      ->orderBy('total', 'desc')
      ->take(5)
      ->get();

  $topProducts = \App\Models\Order::selectRaw('product_id, sum(quantity) as total')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('products.seller_id', auth()->user()->seller->id)
      ->where('orders.status', 'paid')
      ->groupBy('product_id')
      ->orderBy('total', 'desc')
      ->take(5)
      ->get();

  $products = \App\Models\Products::where('seller_id', auth()->user()->seller->id)->paginate(6);
?>


<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.content-card','data' => []]); ?>
<?php $component->withName('content-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <?php if (isset($component)) { $__componentOriginal762af387888d73777fd7dc09ca774a195ec71e43 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GreetingsCard::class, ['greetings' => $greetings,'description' => $descriptionGreetings,'label' => $label,'value' => $value,'actionLabel' => $actionLabel,'route' => $route]); ?>
<?php $component->withName('greetings-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal762af387888d73777fd7dc09ca774a195ec71e43)): ?>
<?php $component = $__componentOriginal762af387888d73777fd7dc09ca774a195ec71e43; ?>
<?php unset($__componentOriginal762af387888d73777fd7dc09ca774a195ec71e43); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal6be6a6f593f4a75730d4c4dfa7fb83ab590bc6e0 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionsCard::class, ['title' => $title,'description' => $description]); ?>
<?php $component->withName('transactions-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
      <?php if (isset($component)) { $__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionItemCard::class, ['label' => 'Jumlah Pesanan','value' => $totalOrders,'variant' => 'info','icon' => 'account-group-outline']); ?>
<?php $component->withName('transaction-item-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172)): ?>
<?php $component = $__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172; ?>
<?php unset($__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionItemCard::class, ['label' => 'Pesanan Selesai','value' => $totalPaid,'variant' => 'success','icon' => 'account-multiple-outline']); ?>
<?php $component->withName('transaction-item-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172)): ?>
<?php $component = $__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172; ?>
<?php unset($__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionItemCard::class, ['label' => 'Pesanan Belum Dibayar','value' => $totalUnpaid,'variant' => 'warning','icon' => 'package']); ?>
<?php $component->withName('transaction-item-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172)): ?>
<?php $component = $__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172; ?>
<?php unset($__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionItemCard::class, ['label' => 'Pesanan Dibatalkan','value' => $totalCancelled,'variant' => 'danger','icon' => 'basket-outline']); ?>
<?php $component->withName('transaction-item-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172)): ?>
<?php $component = $__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172; ?>
<?php unset($__componentOriginal0a3b608f2cb7d83364075f4271355675a19a9172); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6be6a6f593f4a75730d4c4dfa7fb83ab590bc6e0)): ?>
<?php $component = $__componentOriginal6be6a6f593f4a75730d4c4dfa7fb83ab590bc6e0; ?>
<?php unset($__componentOriginal6be6a6f593f4a75730d4c4dfa7fb83ab590bc6e0); ?>
<?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginal03c2e6da6a642d1648f01f77a5dc9f80f8933d84 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\EarningsCard::class, ['title' => $titleEarnings,'description' => $descriptionEarnings,'earnings' => $earningsValue]); ?>
<?php $component->withName('earnings-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal03c2e6da6a642d1648f01f77a5dc9f80f8933d84)): ?>
<?php $component = $__componentOriginal03c2e6da6a642d1648f01f77a5dc9f80f8933d84; ?>
<?php unset($__componentOriginal03c2e6da6a642d1648f01f77a5dc9f80f8933d84); ?>
<?php endif; ?>
    

    
    <?php if (isset($component)) { $__componentOriginalb9783c6f7c28aed40cbc0e3f994fe6ef23b75a4c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TopCustomersCard::class, ['datas' => $topCustomers,'title' => 'Pelanggan Teratas']); ?>
<?php $component->withName('top-customers-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9783c6f7c28aed40cbc0e3f994fe6ef23b75a4c)): ?>
<?php $component = $__componentOriginalb9783c6f7c28aed40cbc0e3f994fe6ef23b75a4c; ?>
<?php unset($__componentOriginalb9783c6f7c28aed40cbc0e3f994fe6ef23b75a4c); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal4980b8428731110d8ba140e84171140e339b1ec2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TopProductsCard::class, ['datas' => $topProducts,'title' => 'Penjualan Produk Teratas']); ?>
<?php $component->withName('top-products-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4980b8428731110d8ba140e84171140e339b1ec2)): ?>
<?php $component = $__componentOriginal4980b8428731110d8ba140e84171140e339b1ec2; ?>
<?php unset($__componentOriginal4980b8428731110d8ba140e84171140e339b1ec2); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginala144b9ccba1c3788af5830dac49395e08912d6fe = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\ProductTableCard::class, ['datas' => $products]); ?>
<?php $component->withName('product-table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala144b9ccba1c3788af5830dac49395e08912d6fe)): ?>
<?php $component = $__componentOriginala144b9ccba1c3788af5830dac49395e08912d6fe; ?>
<?php unset($__componentOriginala144b9ccba1c3788af5830dac49395e08912d6fe); ?>
<?php endif; ?>
   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/seller/dashboard.blade.php ENDPATH**/ ?>