<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Delete</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?php $attributes = ['id' => 'deleteForm']; echo form_open('', $attributes) ?>
			<div class="modal-body m-3">
				<div class="col-12 col-lg-12">
					<input type="hidden" class="delete_id" name="delete_id">
					<div class="form-floating mb-3">
						Are you sure you want to delete?
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-danger" name="delete" value="Delete">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>