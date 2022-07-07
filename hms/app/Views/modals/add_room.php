<div class="modal fade" id="AddNewRoom" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Add New Room</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?= form_open('/createRoom') ?>
			<div class="modal-body m-3">
				<div class="col-12 col-lg-12">
					<div class="form-floating mb-3">
						<input type="text" class="form-control" id="floatingInput1" name="room_no" value="<?= set_value('room_no') ?>">
						<label for="floatingInput1">Room Number</label>
						<span class="text-danger"><?= display_error($validation, 'room_no') ?></span>
					</div>
				</div>
				<div class="col-12 col-lg-12">
					<div class="form-floating mb-3">
						<select class="form-select" id="floatingSelect" aria-label="Floating label select" name="room_type">
							<option value="">--Choose--</option>
							<?php if(!empty($room_types)): ?>
							<?php foreach ($room_types as $row): ?>
					            <option value="<?= $row['room_type_id']; ?>" <?php if(set_value('room_type') == $row['room_type_id']) { echo 'selected'; } ?>><?= $row['title']; ?></option>
				            <?php endforeach; ?>
				            <?php endif ?>
			            </select>
						<label for="floatingSelect">Room Type</label>
						<span class="text-danger"><?= display_error($validation, 'room_type') ?></span>
					</div>
				</div>
				<div class="col-12 col-lg-12">
					<div class="form-floating">
						<select class="form-select" id="floatingSelect" aria-label="Floating label select" name="room_status">
				            <option value="">--Choose--</option>
				            <option value="Vacant"  <?php if(set_value('room_status') == 'Vacant') { echo 'selected'; } ?>>Vacant</option>
				            <option value="Occupied"  <?php if(set_value('room_status') == 'Occupied') { echo 'selected'; } ?>>Occupied</option>
				            <option value="Reserved"  <?php if(set_value('room_status') == 'Reserved') { echo 'selected'; } ?>>Reserved</option>
			            </select>
						<label for="floatingSelect">Status</label>
						<span class="text-danger"><?= display_error($validation, 'room_status') ?></span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-success" name="save">
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>