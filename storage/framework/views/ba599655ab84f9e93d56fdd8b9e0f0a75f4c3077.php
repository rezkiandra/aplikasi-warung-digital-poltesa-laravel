<?php
  $gender = [
      'laki-laki' => 'laki-laki',
      'perempuan' => 'perempuan',
  ];
  $bank = \App\Models\BankAccount::pluck('bank_name', 'id')->toArray();
?>


<?php $__env->startSection('title', 'Add Biodata'); ?>
<?php $__env->startSection('content'); ?>
  <div class="col-lg-8">
    <?php if (isset($component)) { $__componentOriginalceb32ab743a10e309928ba02699759a8f4b56f39 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\EditForm::class, ['title' => 'Edit biodata','action' => route('seller.update.biodata', $seller->uuid)]); ?>
<?php $component->withName('edit-form'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
      <div class="row">
        <div class="col-lg-4">
          <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Nama Lengkap','name' => 'full_name','type' => 'text','value' => $seller->full_name]); ?>
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

        <div class="col-lg-4">
          <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Nomor HP','name' => 'phone_number','type' => 'text','value' => $seller->phone_number]); ?>
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

        <div class="col-lg-4">
          <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <select name="gender" id="gender" class="form-select text-capitalize">
              <option value="<?php echo e($seller->gender); ?>"><?php echo e($seller->gender); ?></option>
              <?php $__currentLoopData = $gender; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key == $seller->gender): ?>
                  <?php continue; ?>
                <?php endif; ?>
                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
           <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85)): ?>
<?php $component = $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85; ?>
<?php unset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85); ?>
<?php endif; ?>
        </div>


        <div class="col-lg-4">
          <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <select name="bank_account_id" id="bank_account_id" class="form-select">
              <option value="<?php echo e($seller->bank_account_id); ?>">
                <?php echo e(\App\Models\BankAccount::find($seller->bank_account_id)->bank_name); ?></option>
              <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($key == $seller->bank_account_id): ?>
                  <?php continue; ?>
                <?php endif; ?>
                <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
           <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85)): ?>
<?php $component = $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85; ?>
<?php unset($__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85); ?>
<?php endif; ?>
        </div>

        <div class="col-lg-4">
          <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Nomor Rekening','name' => 'account_number','type' => 'text','value' => $seller->account_number]); ?>
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

        <div class="col-lg-4">
          <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
            <?php if (isset($component)) { $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Gambar','name' => 'image','type' => 'file','value' => $seller->image]); ?>
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

      <div class="col-lg-12">
        <?php if (isset($component)) { $__componentOriginal9556ea61bc573b9b221bcf3ee1d728254f4eca85 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\FormFloating::class, []); ?>
<?php $component->withName('form-floating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
          <?php if (isset($component)) { $__componentOriginale1bb2929f8b9df6873fa722ef130c57617d11754 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Alamat','name' => 'address','type' => 'textarea','value' => $seller->address]); ?>
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

      <?php if (isset($component)) { $__componentOriginalbdca446458c2217070929c68d419f1fe63331342 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\SubmitButton::class, ['label' => 'Submit','type' => 'submit','variant' => 'primary','icon' => 'check-circle-outline']); ?>
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
<?php if (isset($__componentOriginalceb32ab743a10e309928ba02699759a8f4b56f39)): ?>
<?php $component = $__componentOriginalceb32ab743a10e309928ba02699759a8f4b56f39; ?>
<?php unset($__componentOriginalceb32ab743a10e309928ba02699759a8f4b56f39); ?>
<?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/seller/biodata/edit.blade.php ENDPATH**/ ?>