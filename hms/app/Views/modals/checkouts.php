<div class="modal fade" id="CheckOutModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Check Out Guest</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?= form_open('/checkOutGuest') ?>
			<div class="modal-body m-3">
				<input type="hidden" name="lodge_no" id="lodge_id_modal" value=''>
				Are you sure to check out guest
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-success" name="save" value="Proceed">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>