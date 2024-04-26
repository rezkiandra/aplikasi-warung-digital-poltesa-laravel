<?php
  $gender = [
      'laki-laki' => 'laki-laki',
      'perempuan' => 'perempuan',
  ];
  $bank = \App\Models\BankAccount::pluck('bank_name', 'id')->toArray();
  $currentSeller = \App\Models\Seller::where('user_id', Auth::user()->id)->first();
?>


<?php $__env->startSection('title', 'Biodata'); ?>
<?php $__env->startSection('content'); ?>
  <?php if(!$currentSeller): ?>
    <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'warning','message' => 'Biodata anda belum dilengkapi. Silahkan lengkapi terlebih dahulu!','icon' => 'account-off-outline']); ?>
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
    <?php if (isset($component)) { $__componentOriginal2f5fe581eb9b2c453c66c3c24186f5ca3109252c = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CreateForm::class, ['title' => 'Add biodata','action' => route('seller.store.biodata'),'route' => route('seller.biodata')]); ?>
<?php $component->withName('create-form'); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Nama Lengkap','name' => 'full_name','type' => 'text','value' => old('full_name')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Nomor HP','name' => 'phone_number','type' => 'text','value' => old('phone_number')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Jenis Kelamin','name' => 'gender','type' => 'select','value' => old('gender'),'options' => $gender,'select' => '- Pilih jenis kelamin']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Bank','name' => 'bank_account_id','type' => 'select','value' => old('bank_account_id'),'options' => $bank,'select' => '- Pilih bank']); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Nomor Rekening','name' => 'account_number','type' => 'text','value' => old('account_number')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Gambar','name' => 'image','type' => 'file','value' => old('image')]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Alamat','name' => 'address','type' => 'textarea','height' => '130px','value' => old('address')]); ?>
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
<?php if (isset($__componentOriginal2f5fe581eb9b2c453c66c3c24186f5ca3109252c)): ?>
<?php $component = $__componentOriginal2f5fe581eb9b2c453c66c3c24186f5ca3109252c; ?>
<?php unset($__componentOriginal2f5fe581eb9b2c453c66c3c24186f5ca3109252c); ?>
<?php endif; ?>
  <?php else: ?>
    <?php $__currentLoopData = $seller; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if (isset($component)) { $__componentOriginald4c8f106e1e33ab85c5d037c2504e2574c1b0975 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Alert::class, ['type' => 'primary','message' => 'Biodata anda sudah lengkap. Anda juga bisa mengedit biodata!','icon' => 'account-outline']); ?>
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
      <div class="row gap-lg-0 gap-4">
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body d-flex flex-column justify-content-center">
              <div class="text-center">
                <img src="<?php echo e(asset('storage/' . $data->image)); ?>" alt="" class="img-fluid rounded-circle"
                  width="200">
              </div>
              <div class="mt-3 text-center fw-medium text-capitalize">
                <h5 class="mb-3"><?php echo e($data->full_name); ?></h5>
                <p class="mb-1"><?php echo e($data->gender); ?></p>
                <p class="mb-1"><?php echo e($data->phone_number); ?></p>
                <p class="mb-1"><?php echo e($data->address); ?></p>
                <p class="mb-1 text-lowercase"><?php echo e($data->user->email); ?></p>
                <p class="mb-3"><?php echo e($data->account_number); ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <?php if (isset($component)) { $__componentOriginalceb32ab743a10e309928ba02699759a8f4b56f39 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\EditForm::class, ['title' => 'Edit biodata','action' => route('seller.update.biodata', $data->uuid)]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Nama Lengkap','name' => 'full_name','type' => 'text','value' => $data->full_name]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Nomor HP','name' => 'phone_number','type' => 'text','value' => $data->phone_number]); ?>
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
                    <option value="<?php echo e($data->gender); ?>"><?php echo e($data->gender); ?></option>
                    <?php $__currentLoopData = $gender; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($key == $data->gender): ?>
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
                    <option value="<?php echo e($data->bank_account_id); ?>">
                      <?php echo e(\App\Models\BankAccount::find($data->bank_account_id)->bank_name); ?></option>
                    <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($key == $data->bank_account_id): ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Nomor Rekening','name' => 'account_number','type' => 'text','value' => $data->account_number]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Gambar','name' => 'image','type' => 'file','value' => $data->image]); ?>
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
<?php $component = $__env->getContainer()->make(App\View\Components\InputFormLabel::class, ['label' => 'Alamat','name' => 'address','type' => 'textarea','height' => '140px','value' => $data->address]); ?>
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
      </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.authenticated', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USER\Desktop\warungdigital\resources\views/seller/biodata/index.blade.php ENDPATH**/ ?>