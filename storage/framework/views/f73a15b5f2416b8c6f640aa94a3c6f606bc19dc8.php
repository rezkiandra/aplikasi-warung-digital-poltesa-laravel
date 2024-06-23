|<?php
  $users = \App\Models\User::orderBy('role_id', 'asc')->paginate(10);
  $totalUsers = \App\Models\User::count();
  $totalAdmins = \App\Models\User::join('roles', 'users.role_id', '=', 'roles.id', 'left')
      ->where('roles.role_name', 'Admin')
      ->count();
  $totalSellers = \App\Models\User::join('roles', 'users.role_id', '=', 'roles.id', 'left')
      ->where('roles.role_name', 'Seller')
      ->count();
  $totalCustomers = \App\Models\User::join('roles', 'users.role_id', '=', 'roles.id', 'left')
      ->where('roles.role_name', 'Customer')
      ->count();
?>


<?php $__env->startSection('title', 'Pengguna'); ?>
<?php $__env->startSection('content'); ?>
  <h4 class="mb-1">Daftar Pengguna</h4>
  <p class="mb-3">Seorang pengguna akan menjadi sebagai admin, penjual, atau pelanggan</p>
  <?php if (isset($component)) { $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BasicButton::class, ['label' => 'Tambah Pengguna','icon' => 'plus','class' => 'w-0 text-uppercase mb-4','variant' => 'primary','href' => route('admin.create.user')]); ?>
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

  <div class="row g-4 mb-4">
    <?php if (isset($component)) { $__componentOriginal45f42def1456c65b347578c00f2092c071446f71 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UserCard::class, ['datas' => $users,'label' => 'Sesi','icon' => 'account-group-outline','variant' => 'primary','condition' => $totalUsers,'description' => 'Jumlah Pengguna']); ?>
<?php $component->withName('user-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71)): ?>
<?php $component = $__componentOriginal45f42def1456c65b347578c00f2092c071446f71; ?>
<?php unset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal45f42def1456c65b347578c00f2092c071446f71 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UserCard::class, ['datas' => $users,'label' => 'Role Admin','icon' => 'laptop','variant' => 'danger','condition' => $totalAdmins]); ?>
<?php $component->withName('user-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71)): ?>
<?php $component = $__componentOriginal45f42def1456c65b347578c00f2092c071446f71; ?>
<?php unset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal45f42def1456c65b347578c00f2092c071446f71 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UserCard::class, ['datas' => $users,'label' => 'Role Seller','icon' => 'store-outline','variant' => 'info','condition' => $totalSellers]); ?>
<?php $component->withName('user-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71)): ?>
<?php $component = $__componentOriginal45f42def1456c65b347578c00f2092c071446f71; ?>
<?php unset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71); ?>
<?php endif; ?>
    <?php if (isset($component)) { $__componentOriginal45f42def1456c65b347578c00f2092c071446f71 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UserCard::class, ['datas' => $users,'label' => 'Role Customer','icon' => 'account-outline','variant' => 'warning','condition' => $totalCustomers]); ?>
<?php $component->withName('user-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71)): ?>
<?php $component = $__componentOriginal45f42def1456c65b347578c00f2092c071446f71; ?>
<?php unset($__componentOriginal45f42def1456c65b347578c00f2092c071446f71); ?>
<?php endif; ?>
  </div>

  <?php if (isset($component)) { $__componentOriginalea7c908e1e7ad25ac2b61d9323ede8915a60b9cf = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\UserTable::class, ['title' => 'Data Pengguna','datas' => $users,'fields' => ['No', 'Username / Email - Slug', 'Role', 'Dibuat Pada', 'Aksi']]); ?>
<?php $component->withName('user-table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalea7c908e1e7ad25ac2b61d9323ede8915a60b9cf)): ?>
<?php $component = $__componentOriginalea7c908e1e7ad25ac2b61d9323ede8915a60b9cf; ?>
<?php unset($__componentOriginalea7c908e1e7ad25ac2b61d9323ede8915a60b9cf); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/users/index.blade.php ENDPATH**/ ?>