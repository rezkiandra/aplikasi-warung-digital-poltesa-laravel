<?php
  $categories = \App\Models\ProductCategory::pluck('name', 'id')->toArray();
?>



<?php $__env->startSection('title', 'Tambah Produk'); ?>

<?php $__env->startSection('content'); ?>
  <?php if (isset($component)) { $__componentOriginal2f5fe581eb9b2c453c66c3c24186f5ca3109252c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CreateForm::class, ['title' => 'Tambah produk baru','action' => route('seller.store.product'),'route' => route('seller.products')]); ?>
<?php $component->withName('create-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="row">
      <div class="col-lg-3">
        <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
          <?php if (isset($component)) { $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Nama Produk','name' => 'name','type' => 'text','placeholder' => 'Baju kemeja, Kue ulang tahun, dsb','value' => old('name')]); ?>
<?php $component->withName('input-form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754)): ?>
<?php $component = $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754; ?>
<?php unset($__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85)): ?>
<?php $component = $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85; ?>
<?php unset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85); ?>
<?php endif; ?>
      </div>

      <div class="col-lg-3">
        <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
          <?php if (isset($component)) { $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Harga','name' => 'price','type' => 'text','value' => old('price')]); ?>
<?php $component->withName('input-form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754)): ?>
<?php $component = $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754; ?>
<?php unset($__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85)): ?>
<?php $component = $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85; ?>
<?php unset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85); ?>
<?php endif; ?>
      </div>

      <div class="col-lg-3">
        <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
          <?php if (isset($component)) { $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Stok','name' => 'stock','type' => 'text','value' => old('stock')]); ?>
<?php $component->withName('input-form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754)): ?>
<?php $component = $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754; ?>
<?php unset($__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85)): ?>
<?php $component = $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85; ?>
<?php unset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85); ?>
<?php endif; ?>
      </div>

      <div class="col-lg-3">
        <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
          <?php if (isset($component)) { $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Kategori Produk','name' => 'category_id','type' => 'select','options' => $categories,'select' => 'Pilih Kategori']); ?>
<?php $component->withName('input-form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754)): ?>
<?php $component = $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754; ?>
<?php unset($__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85)): ?>
<?php $component = $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85; ?>
<?php unset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85); ?>
<?php endif; ?>
      </div>

      <div class="col-lg-6">
        <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
          <?php if (isset($component)) { $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Deskripsi','name' => 'description','type' => 'textarea','value' => old('description'),'placeholder' => 'Produk ini menggunakan bahan premium...']); ?>
<?php $component->withName('input-form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754)): ?>
<?php $component = $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754; ?>
<?php unset($__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85)): ?>
<?php $component = $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85; ?>
<?php unset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85); ?>
<?php endif; ?>
      </div>

      <div class="col-lg-6">
        <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
          <?php if (isset($component)) { $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Gambar','name' => 'image','type' => 'file']); ?>
<?php $component->withName('input-form-label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754)): ?>
<?php $component = $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754; ?>
<?php unset($__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754); ?>
<?php endif; ?>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85)): ?>
<?php $component = $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85; ?>
<?php unset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85); ?>
<?php endif; ?>
      </div>
    </div>

    <?php if (isset($component)) { $__componentOriginalbdca446458c2217070929c68d419f1fe63331342 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SubmitButton::class, ['label' => 'Simpan','type' => 'submit','variant' => 'primary','icon' => 'check-circle-outline']); ?>
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
   <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal2f5fe581eb9b2c453c66c3c24186f5ca3109252c)): ?>
<?php $component = $__componentOriginal2f5fe581eb9b2c453c66c3c24186f5ca3109252c; ?>
<?php unset($__componentOriginal2f5fe581eb9b2c453c66c3c24186f5ca3109252c); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/seller/products/create.blade.php ENDPATH**/ ?>