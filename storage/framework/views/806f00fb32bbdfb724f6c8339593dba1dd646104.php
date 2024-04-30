<?php
  $customer = auth()->user()->customer ?? '';
  $seller = auth()->user()->seller ?? '';
  $fee = 0;
?>

<?php if(auth()->guard()->check()): ?>
  <?php if($customer): ?>
    <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'primary','message' => 'Biodata anda sudah lengkap dan dapat memesan produk.','icon' => 'alert-circle-outline']); ?>
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
  <?php elseif(!$customer && !$admin && !$seller): ?>
    <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'warning','message' => 'Lengkapi biodata anda terlebih dahulu di halaman dashboard.','icon' => 'alert-circle-outline']); ?>
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
<?php endif; ?>

<?php if(auth()->guard()->guest()): ?>
  <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'warning','message' => 'Anda belum login. Silahkan login terlebih dahulu untuk menggunakan layanan!','icon' => 'alert-circle-outline']); ?>
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

<div class="d-lg-flex d-md-flex d-flex justify-content-between align-items-start pt-1 pt-lg-3">
  <div class="position-absolute">
    <span class="badge bg-primary text-white d-lg-flex align-items-centers text-uppercase px-4">On Sale</span>
  </div>
  <div class="row">
    <div class="col-lg-4 col-md-6">
      <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="" class="img-fluid rounded shadow hover-shadow">
    </div>

    <div class="col-lg-5 px-lg-5 col-md-6 mt-lg-0 mt-3 mt-md-0">
      <h4 class="fw-medium"><?php echo e($product->name); ?></h4>
      <div class="d-flex d-lg-flex d-md-flex align-items-center gap-4">
        <p class="d-lg-flex d-flex align-items-center">
          <i class="mdi mdi-cart-outline me-2"></i>
          <span class="text-dark">Terjual</span>
          <span
            class="ms-1 text-secondary"><?php echo e(\App\Models\Order::where('product_id', $product->id)->sum('quantity')); ?></span>
        </p>
        <p class="d-lg-flex align-items-center gap-1">
          <i class="mdi mdi-star text-warning"></i>
          <span class="text-dark">4.5</span>
          <span class="text-secondary">(1.822 rating)</span>
        </p>
      </div>
      <h4 class="mb-3 fw-bold">
        Rp<?php echo e(number_format($product->price, 0, ',', '.')); ?>

      </h4>
      <hr class="bg-light">

      <div class="mb-1">
        <span class="text-secondary">Dipublish pada:</span>
        <span class="text-dark"><?php echo e(date('M d, H:i', strtotime($product->created_at))); ?>

          <?php echo e($product->created_at->format('H:i') > '12:00' ? 'PM' : 'AM'); ?>

        </span>
      </div>
      <div class="mb-1">
        <span class="text-secondary">Kondisi:<span>
            <span class="text-dark">Baru</span>
      </div>
      <div class="mb-1">
        <span class="text-secondary">Minimal pemesanan:<span>
            <span class="text-dark">1 Buah</span>
      </div>
      <div class="mb-1">
        <span class="text-secondary">Penjual:<span>
            <span class="badge bg-label-primary">Terverifikasi</span>
      </div>
      <hr class="bg-light">

      <div class="pb-3">
        <p class="text-secondary mb-1">Deskripsi:</p>
        <span class="text-dark text-capitalize"><?php echo e($product->description); ?></span>
      </div>
    </div>

    <div class="col-lg-3 mt-lg-0 mt-3">
      <div class="bg-white border rounded p-3 mb-3">
        <h6>Rincian Pesanan</h6>
        <div class="text-muted mb-3">
          <span class="">Kategori:</span>
          <span class="text-dark"><?php echo e($product->category->name); ?></span>
        </div>
        <div class="text-muted mb-3">
          <span class="">Stok:</span>
          <span class="text-dark" id="stock"><?php echo e($product->stock == 0 ? 'Habis' : $product->stock); ?></span>
        </div>
        <div class="mb-3">
          <div class="d-flex">
            <button class="btn btn-outline-primary" id="btn-decrement">-</button>
            <input type="number" name="quantity" id="quantity" class="form-control text-center" value="1"
              readonly min="1" max="<?php echo e($product->stock); ?>">
            <button class="btn btn-primary" id="btn-increment">+</button>
          </div>
        </div>
        <hr class="mx-n3">
        <h6>Detail Harga</h6>
        <dl class="row mb-0">
          <dt class="col-6 fw-normal text-heading">Sub Total</dt>
          <dd class="col-6 text-end" id="subtotal">Rp<?php echo e(number_format($product->price, 0, ',', '.')); ?></dd>

          <dt class="col-6 fw-normal text-heading">Biaya Layanan</dt>
          <dd class="col-6 text-end">
            <i class="mdi mdi-truck-fast-outline me-1"></i>
            Rp<?php echo e(number_format($fee, 0, ',', '.')); ?>

          </dd>
        </dl>
        <hr class="mx-n3 my-2">
        <dl class="row my-3">
          <dt class="col-6 text-heading">Total</dt>
          <dd class="col-6 fw-medium text-end mb-0 text-heading" id="total">
            Rp<?php echo e(number_format($product->price + $fee, 0, ',', '.')); ?>

        </dl>
        <div class="d-grid gap-2">
          <?php if($customer): ?>
            <form action="<?php echo e(route('cart.store')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
              <input type="hidden" name="quantity" id="newQuantityCart" value="1">
              <?php if($product->stock == 0): ?>
                <?php if (isset($component)) { $__componentOriginalbdca446458c2217070929c68d419f1fe63331342 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SubmitButton::class, ['label' => 'Keranjang','id' => 'btn-cart','type' => 'submit','class' => 'btn-outline-primary w-100 mb-2 disabled','icon' => 'cart-outline me-2','variant' => 'primary']); ?>
<?php $component->withName('submit-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['aria-disabled' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbdca446458c2217070929c68d419f1fe63331342)): ?>
<?php $component = $__componentOriginalbdca446458c2217070929c68d419f1fe63331342; ?>
<?php unset($__componentOriginalbdca446458c2217070929c68d419f1fe63331342); ?>
<?php endif; ?>
              <?php else: ?>
                <?php if (isset($component)) { $__componentOriginalbdca446458c2217070929c68d419f1fe63331342 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SubmitButton::class, ['label' => 'Keranjang','id' => 'btn-cart','type' => 'submit','class' => 'btn-outline-primary w-100 mb-2','icon' => 'cart-outline me-2','variant' => 'primary']); ?>
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
              <?php endif; ?>
            </form>
            <form action="<?php echo e(route('order.store')); ?>" method="POST">
              <?php echo csrf_field(); ?>
              <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
              <input type="hidden" name="quantity" id="newQuantityOrder" value="1">
              <input type="hidden" name="total_price" id="newTotalPriceOrder" value="<?php echo e($product->price + $fee); ?>">
              <?php if($product->stock == 0): ?>
                <?php if (isset($component)) { $__componentOriginalbdca446458c2217070929c68d419f1fe63331342 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SubmitButton::class, ['label' => 'Beli','id' => 'btn-buy','type' => 'submit','class' => 'btn-primary w-100 disabled','icon' => 'basket-outline me-2','variant' => 'primary']); ?>
<?php $component->withName('submit-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['aria-disabled' => 'true']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalbdca446458c2217070929c68d419f1fe63331342)): ?>
<?php $component = $__componentOriginalbdca446458c2217070929c68d419f1fe63331342; ?>
<?php unset($__componentOriginalbdca446458c2217070929c68d419f1fe63331342); ?>
<?php endif; ?>
              <?php else: ?>
                <?php if (isset($component)) { $__componentOriginalbdca446458c2217070929c68d419f1fe63331342 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SubmitButton::class, ['label' => 'Beli','id' => 'btn-buy','type' => 'submit','class' => 'btn-primary w-100','icon' => 'basket-outline me-2','variant' => 'primary']); ?>
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
              <?php endif; ?>
            </form>
          <?php else: ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $__env->startPush('scripts'); ?>
  <script>
    const stock = <?php echo e($product->stock); ?>

    const price = <?php echo e($product->price); ?>

    const fee = <?php echo e($fee); ?>


    // mengatur quantity
    $('#quantity').val(1);

    // min dan max quantity
    $('#quantity').attr('min', 1);
    $('#quantity').attr('max', <?php echo e($product->stock); ?>);

    // jika mengklik tombol decrement maka quantity akan berkurang dan total akan berkurang
    $(document).on('click', '#btn-decrement', function() {
      const quantity = $('#quantity').val();
      if (quantity <= 1) {
        return;
      }

      const newQuantity = parseInt(quantity) - 1;
      const subTotal = newQuantity * price;
      const total = newQuantity * price + fee ?? price + fee;

      $('#quantity').val(newQuantity);
      $('#newQuantityCart').val(newQuantity);
      $('#newQuantityOrder').val(newQuantity);
      $('#newTotalPriceOrder').val(total);
      $('#subtotal').html('Rp' + subTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
      $('#total').html('Rp' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
    });

    // jika mengklik tombol increment maka quantity akan bertambah dan total akan bertambah
    $(document).on('click', '#btn-increment', function() {
      const quantity = $('#quantity').val();
      if (quantity >= stock) {
        return;
      }

      const newQuantity = parseInt(quantity) + 1;
      const subTotal = newQuantity * price;
      const total = newQuantity * price + fee;

      $('#quantity').val(newQuantity);
      $('#newQuantityCart').val(newQuantity);
      $('#newQuantityOrder').val(newQuantity);
      $('#newTotalPriceOrder').val(total);
      $('#subtotal').html('Rp' + subTotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
      $('#total').html('Rp' + total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
    });
  </script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/components/detail-product.blade.php ENDPATH**/ ?>