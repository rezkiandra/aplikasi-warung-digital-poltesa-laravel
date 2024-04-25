<div class="col-sm-6 col-xl-3">
	<div class="card">
		<div class="card-body">
			<div class="d-flex justify-content-between">
				<div class="me-1">
					<p class="text-heading mb-2"><?php echo e($label); ?></p>
					<div class="d-flex align-items-center">
						<h4 class="mb-2 me-1 display-6"><?php echo e(\App\Models\User::all()->count()); ?></h4>
						<p class="text-success mb-2">0</p>
					</div>
					<p class="mb-0">Total User</p>
				</div>
				<div class="avatar">
					<div class="avatar-initial bg-label-<?php echo e($variant); ?> rounded">
						<i class="mdi mdi-<?php echo e($icon); ?> mdi-24px"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php /**PATH C:\laragon\www\warungdigital\resources\views/components/user/user-card.blade.php ENDPATH**/ ?>