<div class="modal fade" id="editFoodItem" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Food Item</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?php $attributes = ['id' => 'foodEditForm']; echo form_open('', $attributes) ?>
			<div class="modal-body m-3">
				<div class="col-12 col-lg-12">
					<input type="hidden" class="food_id_edit" name="food_id">
					<div class="form-floating mb-3">
						<input type="text" class="form-control food_name_edit" id="floatingInput1" name="food_name_edit" value="<?= set_value('food_name_edit') ?>">
						<label for="floatingInput1">Food Name</label>
						<span class="text-danger"><?= display_error($validation, 'food_name_edit') ?></span>
					</div>
				</div>
				<div class="col-12 col-lg-12">
					<div class="form-floating mb-3">
						<input type="text" class="form-control food_price_edit" id="floatingInput1" name="food_price_edit" value="<?= set_value('food_price_edit') ?>">
						<label for="floatingInput1">Food Price</label>
						<span class="text-danger"><?= display_error($validation, 'food_price_edit') ?></span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-success" name="save_edit" value="Save">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>