<?php
  $alertMessage =
      'Anda memiliki kendali penuh terhadap aplikasi ini. Jadilah seorang administrator yang bertanggung jawab!!';
  // Greetings Card
  $message = 'Dashboard admin berisi informasi tentang transaksi, pengguna, penjual, dan produk';
  $greetings = 'Halo, ' . auth()->user()->name;
  $descriptionGreetings = 'Selamat datang di dashboard admin';
  $label = 'Total Pengguna';
  $value = \App\Models\User::count();
  $actionLabel = 'Selengkapnya';
  $route = route('admin.users');

  // Transaction Card
  $title = 'Data Master';
  $description = 'Total data master keseluruhan';

  // Transaction Item Card
  $totalSeller = \App\Models\Seller::count();
  $totalCustomer = \App\Models\Customer::count();
  $totalProduct = \App\Models\Products::count();
  $totalOrder = \App\Models\Order::count();

  // Top Card Content
  $topSellers = \App\Models\Order::selectRaw('seller_id, count(*) as total')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->join('sellers', 'products.seller_id', '=', 'sellers.id', 'left')
      ->where('orders.status', 'paid')
      ->groupBy('seller_id')
      ->selectRaw('SUM(orders.total_price) as total_price')
      ->orderBy('total_price', 'desc')
      ->take(5)
      ->get();

  $topCustomers = \App\Models\Order::selectRaw('customer_id, count(*) as total')
      ->where('orders.status', 'paid')
      ->groupBy('customer_id')
      ->orderBy('total', 'desc')
      ->take(5)
      ->get();

  $topProducts = \App\Models\Order::selectRaw('product_id, count(*) as total')
      ->join('products', 'orders.product_id', '=', 'products.id', 'left')
      ->where('orders.status', 'paid')
      ->groupBy('product_id')
      ->selectRaw('SUM(orders.quantity) as total')
      ->orderBy('total', 'desc')
      ->take(5)
      ->get();

  $users = \App\Models\User::with('seller', 'customer')->orderBy('role_id', 'asc')->paginate(8);
?>


<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startPush('styles'); ?>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginala426b5c7ddf0d9a3e246fc8c9c16bafcb85e59bf = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerDashboardCard::class, ['description' => $alertMessage]); ?>
<?php $component->withName('customer-dashboard-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginala426b5c7ddf0d9a3e246fc8c9c16bafcb85e59bf)): ?>
<?php $component = $__componentOriginala426b5c7ddf0d9a3e246fc8c9c16bafcb85e59bf; ?>
<?php unset($__componentOriginala426b5c7ddf0d9a3e246fc8c9c16bafcb85e59bf); ?>
<?php endif; ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionItemCard::class, ['label' => 'Penjual','value' => $totalSeller,'variant' => 'info','icon' => 'account-group-outline']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionItemCard::class, ['label' => 'Pelanggan','value' => $totalCustomer,'variant' => 'success','icon' => 'account-multiple-outline']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionItemCard::class, ['label' => 'Produk','value' => $totalProduct,'variant' => 'warning','icon' => 'package']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TransactionItemCard::class, ['label' => 'Pesanan','value' => $totalOrder,'variant' => 'danger','icon' => 'basket-outline']); ?>
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

    <?php if (isset($component)) { $__componentOriginal572d97b9c9bda7cc0369287a8488fa397cd3f9e3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BarGraphCard::class, ['height' => '300','title' => 'Transaksi Bulanan Tahun Ini (' . date('Y') . ')','id' => 'monthlyOrders']); ?>
<?php $component->withName('bar-graph-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal572d97b9c9bda7cc0369287a8488fa397cd3f9e3)): ?>
<?php $component = $__componentOriginal572d97b9c9bda7cc0369287a8488fa397cd3f9e3; ?>
<?php unset($__componentOriginal572d97b9c9bda7cc0369287a8488fa397cd3f9e3); ?>
<?php endif; ?>

    <?php if (isset($component)) { $__componentOriginal5d689d0efd7f7c0b8d44bda7e143fd11b0ffef95 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\TopSellersCard::class, ['datas' => $topSellers,'title' => 'Penjual Teratas 🎉']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TopCustomersCard::class, ['datas' => $topCustomers,'title' => 'Pelanggan Teratas 🎉']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\TopProductsCard::class, ['datas' => $topProducts,'title' => 'Produk Teratas 🎉']); ?>
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

<?php $__env->startPush('scripts'); ?>
  <script>
    var ctx = document.getElementById('monthlyOrders');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: <?php echo json_encode($data['labels'], 15, 512) ?>,
        datasets: [{
            label: 'Paid',
            data: <?php echo json_encode($data['paid'], 15, 512) ?>,
            backgroundColor: 'rgba(86, 202, 0, 0.5)',
            borderColor: 'rgba(86, 202, 0, 1)',
            borderWidth: 1,
            tension: 0
          },
          {
            label: 'Unpaid',
            data: <?php echo json_encode($data['unpaid'], 15, 512) ?>,
            backgroundColor: 'rgba(255, 180, 0, 0.5)',
            borderColor: 'rgba(255, 180, 0, 1)',
            borderWidth: 1,
            tension: 0
          },
          {
            label: 'Expire',
            data: <?php echo json_encode($data['expire'], 15, 512) ?>,
            backgroundColor: 'rgba(255, 76, 81, 0.5)',
            borderColor: 'rgba(255, 76, 81, 1)',
            borderWidth: 1,
            tension: 0
          },
          {
            label: 'Cancel',
            data: <?php echo json_encode($data['cancel'], 15, 512) ?>,
            backgroundColor: 'rgba(2, 11, 12, 0.5)',
            borderColor: 'rgba(2, 11, 12, 1)',
            borderWidth: 1,
            tension: 0
          },
        ],
      },
      options: {
        transitions: {
          show: {
            animations: {
              x: {
                from: 0
              },
              y: {
                from: 0
              }
            }
          },
          hide: {
            animations: {
              x: {
                to: 0
              },
              y: {
                to: 0
              }
            }
          }
        },
        animations: {
          tension: {
            duration: 5000,
            easing: 'easeInOutCubic',
            from: .2,
            to: 0,
            loop: true
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            min: 0,
            max: 30
          }
        },
        plugins: {
          legend: {
            display: true,
            position: 'top',
            fullSize: true,
            align: 'center',
            title: {
              display: false,
              text: 'Status Pesanan',
            }
          }
        }
      }
    });
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>