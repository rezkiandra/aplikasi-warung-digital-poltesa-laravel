<?php
  $fee = 0;
?>

<?php $__env->startSection('title', 'Keranjang'); ?>
<?php $__env->startSection('content'); ?>
  <h4 class="mb-1">Keranjang Produk</h4>
  <p class="mb-3">Daftar produk yang ada di keranjang belanja anda</p>

  <div class="card p-3">
    <div class="col-lg-12 mb-4">
      <h5>Keranjang produk saya (<?php echo e($carts->count()); ?> item)</h5>
      <ul class="list-group mb-4">
        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="list-group-item" data-price="<?php echo e($cart->product->price); ?>" data-product-id="<?php echo e($cart->product_id); ?>">
            <div class="">
              <input type="hidden" name="customer_id" value="<?php echo e($cart->customer_id); ?>">
              <input type="hidden" name="product_id" value="<?php echo e($cart->product_id); ?>">
              <div class="row">
                <div class="col-md-8 d-flex align-items-start gap-3">
                  <img src="<?php echo e(asset('storage/' . $cart->product->image)); ?>" alt="google home" width="150"
                    class="rounded cursor-pointer"
                    onclick="window.location.href='<?php echo e(route('customer.detail.product', $cart->product->slug)); ?>'">
                  <div class="d-lg-flex flex-column justify-content-start gap-0">
                    <h6 class="me-3 mb-1 mb-lg-2">
                      <a href="<?php echo e(route('customer.detail.product', $cart->product->slug)); ?>"
                        class="text-heading"><?php echo e($cart->product->name); ?></a>
                    </h6>
                    <div class="text-muted mb-1 mb-lg-2 d-lg-flex flex-row align-items-center small">
                      <span class="me-lg-1 me-0">Dijual:</span>
                      <span
                        class="badge bg-label-primary rounded-pill mt-2 mt-sm-0 text-capitalize"><?php echo e($cart->product->seller->full_name); ?></span>
                    </div>
                    <div class="text-muted mb-1 mb-lg-2 d-lg-flex align-items-center small">
                      <span class="me-lg-1 me-0">Stok:</span>
                      <span class="me-1 text-primary"><?php echo e($cart->product->stock); ?></span>
                      <span class="badge bg-label-info rounded-pill mt-2 mt-sm-0">Stok tersedia</span>
                    </div>
                    <div class="d-flex gap-1">
                      <form action="<?php echo e(route('cart.destroy', $cart->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-sm btn-outline-danger">
                          <i class="mdi mdi-trash-can-outline text-danger"></i>
                        </button>
                      </form>
                      <input type="number" name="quantity" class="form-control form-control-sm mb-2" id="quantity"
                        value="<?php echo e($cart->quantity); ?>" min="1" max="<?php echo e($cart->product->stock); ?>">
                    </div>
                  </div>
                </div>
                <div class="col-md-4 d-flex flex-column align-items-end justify-content-center">
                  <div class="mt-lg-0 mt-2">
                    
                    <span class="text-body"
                      id="totalPrice">Rp<?php echo e(number_format($cart->product->price * $cart->quantity + $fee, 0, '.', '.')); ?>

                    </span>
                  </div>
                  <form action="<?php echo e(route('order.store')); ?>" method="POST" id="form">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="product_id" value="<?php echo e($cart->product_id); ?>">
                    <input type="hidden" name="quantity" id="quantity" value="<?php echo e($cart->quantity); ?>">
                    <input type="hidden" name="total_price"
                      value="<?php echo e($cart->product->price * $cart->quantity + $fee); ?>">
                    <?php if (isset($component)) { $__componentOriginalbdca446458c2217070929c68d419f1fe63331342 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SubmitButton::class, ['label' => 'Beli Sekarang','id' => 'btn-buy','type' => 'submit','variant' => 'outline-primary btn-sm']); ?>
<?php $component->withName('submit-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbdca446458c2217070929c68d419f1fe63331342)): ?>
<?php $component = $__componentOriginalbdca446458c2217070929c68d419f1fe63331342; ?>
<?php unset($__componentOriginalbdca446458c2217070929c68d419f1fe63331342); ?>
<?php endif; ?>
                  </form>
                </div>
              </div>
            </div>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </ul>
    </div>
  </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
  <script>
    // mengatur quantity dalam cart menggunakan ajax
    $('input[name="quantity"]').on('change', function(event) {
      event.preventDefault();

      const customer_id = $('input[name="customer_id"]').val();
      const product_id = $('input[name="product_id"]').val();
      const quantity = $(this).val();

      $.ajax({
        url: "<?php echo e(route('cart.update')); ?>",
        method: 'POST',
        data: {
          customer_id: customer_id,
          product_id: product_id,
          quantity: quantity,
          _token: "<?php echo e(csrf_token()); ?>",
          _method: 'PUT',
        },
      })
    })

    // menghitung total price
    $(document).ready(function() {
      $('input[name="quantity"]').on('change', function() {
        const price = $(this).parents('li').data('price');
        const quantity = $(this).val();
        const totalPrice = price * quantity + 1;

        $(this).parents('li').find('#totalPrice').html('Rp' + totalPrice.toString().replace(
          /\B(?=(\d{3})+(?!\d))/g, '.'));
      })
    })
  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/customer/cart.blade.php ENDPATH**/ ?>