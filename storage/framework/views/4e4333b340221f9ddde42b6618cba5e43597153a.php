<?php
  // Greetings Card
  $message = 'Dashboard admin berisi informasi tentang transaksi, pengguna, penjual, dan produk';
  $greetings = 'Halo, ' . auth()->user()->name;
  $descriptionGreetings = 'Selamat datang di dashboard admin';
  $label = 'Total Pengguna';
  $value = \App\Models\User::count();
  $actionLabel = 'Selengkapnya';

  // Transaction Card
  $title = 'Data Master';
  $description = 'Total data master dibulan ini';

  // Transaction Item Card
  $totalSeller = \App\Models\Seller::count();
  $totalCustomer = \App\Models\Customer::count();
  $totalProduct = \App\Models\Products::count();
  $totalOrder = \App\Models\Order::count();

  // Top Card Content
  $sellers = \App\Models\Seller::take(5)->get();
  $customers = \App\Models\Customer::take(5)->get();
  $products = \App\Models\Products::take(5)->get();
  $users = \App\Models\User::where('role_id', '!=', 1)->take(8)->get();
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
<?php $component = $__env->getContainer()->make(App\View\Components\GreetingsCard::class, ['greetings' => $greetings,'description' => $descriptionGreetings,'label' => $label,'value' => $value,'actionLabel' => $actionLabel]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionItemCard::class, ['label' => 'Seller','value' => $totalSeller,'variant' => 'info','icon' => 'account-group-outline']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionItemCard::class, ['label' => 'Customer','value' => $totalCustomer,'variant' => 'success','icon' => 'account-multiple-outline']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionItemCard::class, ['label' => 'Product','value' => $totalProduct,'variant' => 'warning','icon' => 'package']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionItemCard::class, ['label' => 'Order','value' => $totalOrder,'variant' => 'danger','icon' => 'basket-outline']); ?>
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

    

    <?php if (isset($component)) { $__componentOriginal5d689d0efd7f7c0b8d44bda7e143fd11b0ffef95 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TopSellersCard::class, ['datas' => $sellers,'title' => 'Penjual Teratas']); ?>
<?php $component->withName('top-sellers-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5d689d0efd7f7c0b8d44bda7e143fd11b0ffef95)): ?>
<?php $component = $__componentOriginal5d689d0efd7f7c0b8d44bda7e143fd11b0ffef95; ?>
<?php unset($__componentOriginal5d689d0efd7f7c0b8d44bda7e143fd11b0ffef95); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginalb9783c6f7c28aed40cbc0e3f994fe6ef23b75a4c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TopCustomersCard::class, ['datas' => $customers,'title' => 'Pelanggan Teratas']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TopProductsCard::class, ['datas' => $products,'title' => 'Penjualan Produk Teratas']); ?>
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

    <?php if (isset($component)) { $__componentOriginal6eefcb7fa1bcb53edb319a43e172c5a5ad5f4c5a = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UserTableCard::class, ['datas' => $users]); ?>
<?php $component->withName('user-table-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6eefcb7fa1bcb53edb319a43e172c5a5ad5f4c5a)): ?>
<?php $component = $__componentOriginal6eefcb7fa1bcb53edb319a43e172c5a5ad5f4c5a; ?>
<?php unset($__componentOriginal6eefcb7fa1bcb53edb319a43e172c5a5ad5f4c5a); ?>
<?php endif; ?>
   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>