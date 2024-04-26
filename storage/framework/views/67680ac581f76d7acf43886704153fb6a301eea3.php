<?php
  // Greetings Card
  $message = 'Dashboard penjual berisi informasi produk penjual dan transaksi';
  $greetings = 'Halo, ' . auth()->user()->name;
  $descriptionGreetings = 'Selamat datang di dashboard customer';
  $label = 'Total Pesanan';
  $value = \App\Models\Order::where('customer_id', auth()->user()->customer->id)->count();
  $actionLabel = 'Selengkapnya';
  $route = route('customer.orders');

  // Transaction Card
  $title = 'Pesanan';
  $description = 'Total pesanan dibulan ini';

  // Earnings Card
  $spent = \App\Models\Order::where('customer_id', auth()->user()->customer->id)
      ->where('status', 'paid')
      ->get();
  $titleSpent = 'Total Pengeluaran';
  $spentValue = 'Rp' . number_format($spent->sum('total_price'), 2, '.', ',');
  $descriptionSpent = 'Total pengeluaran dibulan ini';

  // Transaction Item Card
  $totalOrders = \App\Models\Order::where('customer_id', auth()->user()->customer->id)->count();
  $totalPaid = \App\Models\Order::where('customer_id', auth()->user()->customer->id)
      ->where('status', 'paid')
      ->count();
  $totalUnpaid = \App\Models\Order::where('customer_id', auth()->user()->customer->id)
      ->where('status', 'unpaid')
      ->count();
  $totalCancelled = \App\Models\Order::where('customer_id', auth()->user()->customer->id)
      ->where('status', 'cancelled')
      ->count();

  $topProducts = \App\Models\Order::selectRaw('product_id, sum(quantity) as total')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('orders.customer_id', auth()->user()->customer->id)
      ->where('orders.status', 'paid')
      ->groupBy('product_id')
      ->orderBy('total', 'desc')
      ->take(5)
      ->get();

  $orders = \App\Models\Order::where('customer_id', auth()->user()->customer->id)->paginate(8);
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
<?php $component = $__env->getContainer()->make(App\View\Components\EarningsCard::class, ['title' => $titleSpent,'description' => $descriptionSpent,'earnings' => $spentValue]); ?>
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
    

    
    
    <?php if (isset($component)) { $__componentOriginal4980b8428731110d8ba140e84171140e339b1ec2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TopProductsCard::class, ['datas' => $topProducts,'title' => 'Pembelian Produk Teratas']); ?>
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

    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.four-card','data' => []]); ?>
<?php $component->withName('four-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
      <?php if (isset($component)) { $__componentOriginalb3dcfc1c5f48c14f32a36a87486cee280756d469 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GraphCardContent::class, []); ?>
<?php $component->withName('graph-card-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3dcfc1c5f48c14f32a36a87486cee280756d469)): ?>
<?php $component = $__componentOriginalb3dcfc1c5f48c14f32a36a87486cee280756d469; ?>
<?php unset($__componentOriginalb3dcfc1c5f48c14f32a36a87486cee280756d469); ?>
<?php endif; ?>
      <?php if (isset($component)) { $__componentOriginalb3dcfc1c5f48c14f32a36a87486cee280756d469 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\GraphCardContent::class, []); ?>
<?php $component->withName('graph-card-content'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb3dcfc1c5f48c14f32a36a87486cee280756d469)): ?>
<?php $component = $__componentOriginalb3dcfc1c5f48c14f32a36a87486cee280756d469; ?>
<?php unset($__componentOriginalb3dcfc1c5f48c14f32a36a87486cee280756d469); ?>
<?php endif; ?>
     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginalfe0365ba02bbe2291b7618b4c143e2452e826909 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\OrderTableCard::class, ['datas' => $orders]); ?>
<?php $component->withName('order-table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfe0365ba02bbe2291b7618b4c143e2452e826909)): ?>
<?php $component = $__componentOriginalfe0365ba02bbe2291b7618b4c143e2452e826909; ?>
<?php unset($__componentOriginalfe0365ba02bbe2291b7618b4c143e2452e826909); ?>
<?php endif; ?>
   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/customer/dashboard.blade.php ENDPATH**/ ?>