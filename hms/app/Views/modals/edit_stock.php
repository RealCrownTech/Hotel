<div class="modal fade" id="editStockItem" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Stock Item</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?php $attributes = ['id' => 'stockEditForm']; echo form_open('', $attributes) ?>
			<div class="modal-body m-3">
				<div class="col-12 col-lg-12">
					<input type="hidden" class="stock_id_edit" name="stock_id">
					<div class="form-floating mb-3">
						<input type="text" class="form-control stock_name_edit" id="floatingInput1" name="stock_name_edit" value="<?= set_value('stock_name_edit') ?>">
						<label for="floatingInput1">Stock Name</label>
						<span class="text-danger"><?= display_error($validation, 'stock_name_edit') ?></span>
					</div>
				</div>
				<div class="col-12 col-lg-12">
					<div class="form-floating mb-3">
						<input type="text" class="form-control stock_cost_edit" id="floatingInput1" name="cost_price_edit" value="<?= set_value('cost_price_edit') ?>">
						<label for="floatingInput1">Cost Price</label>
						<span class="text-danger"><?= display_error($validation, 'cost_price_edit') ?></span>
					</div>
				</div>
				<div class="col-12 col-lg-12">
					<div class="form-floating mb-3">
						<input type="text" class="form-control stock_selling_edit" id="floatingInput1" name="selling_price_edit" value="<?= set_value('selling_price_edit') ?>">
						<label for="floatingInput1">Selling Price</label>
						<span class="text-danger"><?= display_error($validation, 'selling_price_edit') ?></span>
					</div>
				</div>
				<div class="col-12 col-lg-12">
					<div class="form-floating mb-3">
						<input type="text" class="form-control stock_qty_edit" id="floatingInput1" name="quantity_edit" value="<?= set_value('quantity_edit') ?>">
						<label for="floatingInput1">Quantity</label>
						<span class="text-danger"><?= display_error($validation, 'quantity_edit') ?></span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-success" name="save" value="Save">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>