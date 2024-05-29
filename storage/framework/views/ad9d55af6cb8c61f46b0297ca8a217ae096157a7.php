
<?php $__env->startSection('title', 'Detail Kategori'); ?>
<?php $__env->startSection('content'); ?>
  <div class="card mb-4 col-lg-6">
    <div class="card-body">
      <a href="<?php echo e(route('admin.product_category')); ?>">
        <i class="tf-icons mdi mdi-arrow-left me-2 fs-4"></i>
      </a>
      <div class="d-flex justify-content-between flex-wrap my-2 py-3">
        <div class="d-flex align-items-center me-4 mt-3 gap-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-danger rounded">
              <i class="mdi mdi-laravel mdi-24px"></i>
            </div>
          </div>
          <div>
            <h4 class="mb-0"><?php echo e($category->name); ?></h4>
            <span>Nama Kategori</span>
          </div>
        </div>
        <div class="d-flex align-items-center me-4 mt-3 gap-3">
          <div class="avatar">
            <div class="avatar-initial bg-label-info rounded">
              <i class="mdi mdi-tailwind mdi-24px"></i>
            </div>
          </div>
          <div>
            <h4 class="mb-0"><?php echo e(\App\Models\Products::where('category_id', $category->id)->count()); ?></h4>
            <span>Jumlah Produk</span>
          </div>
        </div>
      </div>
      <h5 class="pb-3 border-bottom mb-3">Detail Kategori</h5>
      <div class="info-container">
        <ul class="list-unstyled mb-4">
          <li class="mb-3 h5">
            <span>ID:</span>
            <span>#<?php echo e($category->id); ?></span>
          </li>
          <li class="mb-3">
            <span class="h6">Dibuat pada:</span>
            <span class="badge bg-label-success rounded">
              <?php echo e(date('d M Y, H:i', strtotime($category->created_at))); ?>

              <?php echo e($category->created_at->format('H:i') > '12:00' ? 'PM' : 'AM'); ?>

            </span>
          </li>
          <li class="mb-3">
            <span class="h6">Diupdated pada:</span>
            <span class="badge bg-label-info rounded">
              <?php echo e(date('d M Y, H:i', strtotime($category->updated_at))); ?>

              <?php echo e($category->updated_at->format('H:i') > '12:00' ? 'PM' : 'AM'); ?>

            </span>
          </li>
        </ul>
        <div class="d-flex justify-content-center align-items-center gap-3 mt-5">
          <?php if (isset($component)) { $__componentOriginal884241e53d2640b5f4918f6ac6f391c8aaea60a8 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\BasicButton::class, ['label' => 'Edit','icon' => 'pencil-outline','href' => route('admin.edit.category', $category->slug),'variant' => 'primary']); ?>
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
          <form action="<?php echo e(route('admin.destroy.category', $category->slug)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" class="btn btn-outline-danger">
              <i class="mdi mdi-trash-can-outline text-danger me-2"></i>Delete
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\warungdigital\resources\views/admin/product_category/detail.blade.php ENDPATH**/ ?>