<?php
  $user_role = auth()->user()->role_id ?? '';
  if (Auth::check() && Auth::user()->role_id == 3) {
      $wishlistUUID = \App\Models\Wishlist::where('customer_id', auth()->user()->customer->id)
          ->pluck('uuid')
          ->toArray();
  }
?>

<h5 class="fw-medium mt-2 mt-lg-5 mb-3 text-uppercase">Produk Serupa</h5>
<div class="row row-cols-1 row-cols-md-3 g-3 mb-5 pb-0 pb-lg-5">
  <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-2 col-md-4 col-6 pb-3 pb-lg-3">
      <div class="card h-100 cursor-pointer"
        <?php if($user_role == 1): ?> onclick="window.location.href='<?php echo e(route('admin.detail.product', $data->slug)); ?>'" 
          <?php elseif($user_role == 2): ?> onclick="window.location.href='<?php echo e(route('seller.detail.product', $data->slug)); ?>'"
          <?php elseif($user_role == 3): ?> onclick="window.location.href='<?php echo e(route('customer.detail.product', $data->slug)); ?>'"
          <?php else: ?> onclick="window.location.href='<?php echo e(route('guest.detail.product', $data->slug)); ?>'" <?php endif; ?>>
        <div class="position-absolute end-0 top-0 p-2">
          <?php if(auth()->guard()->check()): ?>
            <?php if(Auth::user()->customer->wishlist->contains('product_id', $data->id)): ?>
              <form action="<?php echo e(route('wishlist.destroy', $wishlistUUID)); ?>" method="POST" class="bg-white rounded-circle">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button type="submit" class="btn small p-1">
                  <i class="mdi mdi-heart text-danger"></i>
                </button>
              </form>
            <?php else: ?>
              <form action="<?php echo e(route('wishlist.store')); ?>" method="POST" class="bg-white rounded-circle">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="customer_id" value="<?php echo e(Auth::user()->customer->id); ?>">
                <input type="hidden" name="product_id" value="<?php echo e($data->id); ?>">
                <button type="submit" id="wishlist" class="btn small p-1">
                  <i class="mdi mdi-heart-outline text-dark"></i>
                </button>
              </form>
            <?php endif; ?>
          <?php endif; ?>

          <?php if(auth()->guard()->guest()): ?>
            <form action="<?php echo e(route('wishlist.store')); ?>" class="text-dark bg-white rounded-circle p-1" method="POST">
              <?php echo csrf_field(); ?>
              <button type="submit" id="wishlist" class="btn small p-1">
                <i class="mdi mdi-heart-outline text-dark"></i>
              </button>
            </form>
          <?php endif; ?>
        </div>
        <img class="card-img-top img-fluid" alt="Card image cap" src="<?php echo e(asset('storage/' . $data->image)); ?>"
          width="100%">
        <div class="p-2 d-flex flex-column justify-content-between">
          <div class="d-lg-flex align-items-center justify-content-between mt-1">
            <small class="card-title text-dark fw-medium"><?php echo e($data->name); ?></small>
            <small class="card-title text-dark fw-medium">
              Rp <?php echo e(number_format($data->price, 0, ',', '.')); ?>

            </small>
          </div>
          
        </div>
      </div>
    </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<?php $__env->startPush('scripts'); ?>
  <script>
    const customerId = <?php echo e(Auth::user()->customer->id ?? ''); ?>

    const productId = <?php echo e($data->id); ?>


    $(document).on('click', '#wishlist', function() {
      $.ajax({
        url: "<?php echo e(route('wishlist.store')); ?>",
        method: "POST",
        data: {
          customer_id: customerId,
          product_id: productId
        },
        success: function(response) {
          if (response == 'success') {
            $('#wishlist').toggleClass('text-danger')
          }
        }
      });
    });
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/related-products.blade.php ENDPATH**/ ?>