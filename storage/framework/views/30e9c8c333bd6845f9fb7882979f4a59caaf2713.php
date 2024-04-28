<?php
  $id = '#';
  if ($user->customer) {
      $image = asset('storage/' . $user->customer->image);
  } elseif ($user->seller) {
      $image = asset('storage/' . $user->seller->image);
  } else {
      $image = asset('materio/assets/img/favicon/favicon.ico');
  }
  $username = $user->name;
  $email = $user->email;
  $role = $user->role->role_name;
  $type = 'button';
  $href = route('admin.edit.user', $user->uuid);
  $variant = 'primary';
  $icon = 'pencil-outline';
  $label = 'Edit Pengguna';
  $class = 'btn-sm';

  $totalProducts = \App\Models\Products::where('seller_id', $user->id)->count();
  $totalEarnings = number_format(
      \App\Models\Order::join('products', 'orders.product_id', '=', 'products.id', 'left')
          ->join('sellers', 'products.seller_id', '=', 'sellers.id', 'left')
          ->where('sellers.id', $user->id)
          ->sum('products.price'),
      2,
      ',',
      '.',
  );
  $user_id = Hash::make($user->uuid);
  $user_id = Str::substr($user_id, 0, 10);
  $user_id = Str::replace('$', '', $user_id);
  $user_id = Str::upper($user_id);
?>

<?php $__env->startSection('title', 'Detail User'); ?>
<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginale114a3941ffeb1a91b2a9dbe363caa4315c3186f = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailBreadcrumbs::class, ['id' => 'User ID #' . $user_id,'created' => date('d F, H:i', strtotime($user->created_at)) > '12.00'
      ? date('d F, H:i:s', strtotime($user->created_at)) . ' PM'
      : date('d F, H:i:s', strtotime($user->created_at)) . ' AM']); ?>
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
        <?php if (isset($component)) { $__componentOriginal138eed1919b7f6316b18a06a462a3888514b57bc = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\DetailUser::class, ['id' => $id . $user_id,'image' => $image,'username' => $username,'email' => $email,'role' => $role,'type' => $type,'href' => $href,'variant' => $variant,'icon' => $icon,'label' => $label,'class' => $class]); ?>
<?php $component->withName('detail-user'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['totalProducts' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($totalProducts),'totalEarnings' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($totalEarnings)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal138eed1919b7f6316b18a06a462a3888514b57bc)): ?>
<?php $component = $__componentOriginal138eed1919b7f6316b18a06a462a3888514b57bc; ?>
<?php unset($__componentOriginal138eed1919b7f6316b18a06a462a3888514b57bc); ?>
<?php endif; ?>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/admin/users/detail.blade.php ENDPATH**/ ?>