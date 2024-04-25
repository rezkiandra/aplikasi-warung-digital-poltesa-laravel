<div class="mt-3">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#basicModal">
		Launch modal
	</button>

	<!-- Modal -->
	<div class="modal fade show" id="basicModal" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="exampleModalLabel1">Modal title</h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col mb-4 mt-2">
							<div class="form-floating form-floating-outline">
								<input type="text" id="nameBasic" class="form-control" placeholder="Enter Name">
								<label for="nameBasic">Name</label>
							</div>
						</div>
					</div>
					<div class="row g-2">
						<div class="col mb-2">
							<div class="form-floating form-floating-outline">
								<input type="email" id="emailBasic" class="form-control" placeholder="xxxx@xxx.xx">
								<label for="emailBasic">Email</label>
							</div>
						</div>
						<div class="col mb-2">
							<div class="form-floating form-floating-outline">
								<input type="date" id="dobBasic" class="form-control">
								<label for="dobBasic">DOB</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal">
						Close
					</button>
					<button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
				</div>
			</div>
		</div>
	</div>
</div><?php /**PATH C:\laragon\www\warungdigital\resources\views/components/edit-modal.blade.php ENDPATH**/ ?>