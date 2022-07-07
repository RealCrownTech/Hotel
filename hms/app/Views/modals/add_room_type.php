<div class="modal fade" id="AddNewRoomType" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add Room Type</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?= form_open('/createRoomType') ?>
			<div class="modal-body m-3">
				<div class="col-12 col-lg-12">
					<div class="form-floating mb-3">
						<input type="text" class="form-control" id="floatingInput1" name="title" value="<?= set_value('title') ?>">
						<label for="floatingInput1">Title</label>
						<span class="text-danger"><?= display_error($validation, 'title') ?></span>
					</div>
				</div>
				<div class="col-12 col-lg-12">
					<div class="form-floating mb-3">
						<input type="text" class="form-control" id="floatingInput1" name="price" value="<?= set_value('price') ?>">
						<label for="floatingInput1">Price</label>
						<span class="text-danger"><?= display_error($validation, 'price') ?></span>
					</div>
				</div>
				<div class="row g-2">
					<div class="col-md">
						<div class="form-floating mb-3">
							<input type="text" class="form-control" id="floatingInput1" name="adult" value="<?= set_value('adult') ?>">
							<label for="floatingInput1">Adult Capacity</label>
							<span class="text-danger"><?= display_error($validation, 'adult') ?></span>
						</div>
					</div>
					<div class="col-md">
						<div class="form-floating mb-3">
							<input type="text" class="form-control" id="floatingInput1" name="kid"  value="<?= set_value('kid') ?>">
							<label for="floatingInput1">Kid Capacity</label>
							<span class="text-danger"><?= display_error($validation, 'kid') ?></span>
						</div>
					</div>
				</div>
				<!-- <hr class="my-1">
				<h5>Amenities</h5> -->
				<!-- <div class="row">
					<div class="col-md">
						<div class="mb-2">
							<div class="input-group">
								<div class="input-group-text">
									<input type="checkbox" name="air_condition" value="1"  <?php if(set_value('air_condition') == '1') { echo 'checked'; } ?>>
								</div>
								<input type="text" class="form-control" value="Air Conditioner" placeholder="Checkbox" readonly>
							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="mb-2">
							<div class="input-group">
								<div class="input-group-text">
									<input type="checkbox" name="free_wifi" value="1" <?php if(set_value('free_wifi') == '1') { echo 'checked'; } ?>>
								</div>
								<input type="text" class="form-control" value="Free Wifi" placeholder="Checkbox" readonly>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<div class="mb-2">
							<div class="input-group">
								<div class="input-group-text">
									<input type="checkbox" name="breakfast" value="1" <?php if(set_value('breakfast') == '1') { echo 'checked'; } ?>>
								</div>
								<input type="text" class="form-control" value="Breakfast" placeholder="Checkbox" readonly>
							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="mb-2">
							<div class="input-group">
								<div class="input-group-text">
									<input type="checkbox" name="newspaper" value="1" <?php if(set_value('newspaper') == '1') { echo 'checked'; } ?>>
								</div>
								<input type="text" class="form-control" value="Free Newspaper" placeholder="Checkbox" readonly>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md">
						<div class="mb-2">
							<div class="input-group">
								<div class="input-group-text">
									<input type="checkbox" name="double_bed" value="1" <?php if(set_value('double_bed') == '1') { echo 'checked'; } ?>>
								</div>
								<input type="text" class="form-control" value="Double Bed" placeholder="Checkbox" readonly>
							</div>
						</div>
					</div>
					<div class="col-md">
						<div class="mb-2">
							<div class="input-group">
								<div class="input-group-text">
									<input type="checkbox" name="coffee_maker" value="1" <?php if(set_value('coffee_maker') == '1') { echo 'checked'; } ?>>
								</div>
								<input type="text" class="form-control" value="Coffee Maker" placeholder="Checkbox" readonly>
							</div>
						</div>
					</div>
				</div> -->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-success" name="save" value="Submit">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>