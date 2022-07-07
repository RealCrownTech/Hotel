<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<div class="row">
				<div class="col-md-12">
					<div class="card">											
						<div class="card-body">
							<h5 class="card-title">Booked Room</h5>
							<hr class="my-4">
							<div>
								<div class="row">
									<div class="mb-3 col-md-3">
										<!-- <input type="radio" name="room_number"> -->
										<label class="form-label" for="inputState">Room <?= $room_data['room_no'] ?></label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Select Room For Swap</h5>
							<hr class="my-4">
							<?= form_open('/swap/'.$lodge_data['lodge_no']) ?>
							<div class="col-12 col-lg-8">
								<div class="tab tab-vertical tab-primary">
									<ul class="nav nav-tabs" role="tablist">
										<?php foreach ($room_types as $value): ?>
											<li class="nav-item">
												<a class="nav-link <?php if($value['room_type_id'] == 1) {echo "active";} ?>" href="#vertical-icon-tab-<?= $value['room_type_id'] ?>" data-bs-toggle="tab" role="tab">
										            <i class="chevrons-right" data-feather="home"></i> <?= $value['title'] ?>
										        </a>
											</li>
										<?php endforeach ?>
									</ul>
									<div class="tab-content">
										<?php foreach ($room_types as $value): ?>
											<div class="tab-pane <?php if($value['room_type_id'] == 1) {echo "active";} ?>" id="vertical-icon-tab-<?= $value['room_type_id'] ?>" role="tabpanel">
												<h4 class="tab-title"><?= $value['title'] ?> - <?= '₦'.$value['price'] ?></h4>
												<div class="card mb-3 bg-light cursor-grab border">
													<div class="card-body p-3">
														<table id="datatables-swap" class="table table-striped my-0">
															<thead>																
																<tr>
																	<th>S/N</th>
																	<th>Select</th>
																	<th>Room No</th>
																</tr>
															</thead>
															<tbody>
																<?php $i = 1; foreach($rooms as $room): ?>
																	<?php if($value['room_type_id'] == $room['room_type_id']): ?>						
																		<tr>
																			<td><?= $i ?></td>
																			<td>
																				<?php if($room['room_status'] == 'Vacant'): ?>
																					<input type="radio" name="room_number" value="<?= $room['room_id'] ?>" <?php if($room_data['room_id'] == $room['room_id']) { echo 'checked'; } ?>>
																				<?php endif ?>				
																			</td>
																			<td>
																				<label class="form-label" for="inputState"><?= $room['room_no'] ?> <?php if($room['room_status'] == 'Occupied') {echo "<span class='text-danger'>(Occupied)</span>";} ?></label>
																			</td>
																		</tr>
																	<?php endif ?>
																<?php $i++; endforeach ?>
															</tbody>
														</table>
														<hr class="my-4">
														<input class="btn btn-primary btn-sm float-end" type="submit" name="save" value="Swap Now">
													</div>
												</div>
											</div>
										<?php endforeach ?>
									</div>
								</div>
							</div>
							<?= form_close() ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>

	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>