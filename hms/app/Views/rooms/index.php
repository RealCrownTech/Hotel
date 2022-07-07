<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<div class="row">

<!---------------------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------ROOM TYPE SECTION--------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------------->

				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Room Type</h5>
							<button class="btn btn-md btn-primary float-end" data-bs-toggle="modal" data-bs-target="#AddNewRoomType"><i data-feather="plus"></i> Add New</button>

							<!-- Start Add Room Type Modal-->
							<?= $this->include('modals/add_room_type'); ?>
							<!-- End Add Room Type Modal-->

							<hr class="my-4">
							<!-- Start Room Type Table-->
							<table id="#datatables-dashboard-projects" class="table table-striped table-responsive">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Type</th>
										<th>Price</th>
										<th>Adult</th>
										<th>Kids</th>
										<?php if(in_array('editRoom', $user_permission) || in_array('viewRoom', $user_permission) || in_array('deleteRoom', $user_permission)): ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($room_types)): ?>
										<?php $i = 1; foreach ($room_types as $row): ?>
											<tr>
												<input type="hidden" name="room_type_id" class="room_type_id" value="<?= $row['room_type_id']; ?>">
												<td><?= $i ?></td>
												<td><?= $row['title']; ?></td>
												<td>₦<?= number_format($row['price']); ?></td>
												<td><?= $row['adult']; ?></td>
												<td><?= $row['kid']; ?></td>
												<?php if(in_array('editRoom', $user_permission) || in_array('viewRoom', $user_permission) || in_array('deleteRoom', $user_permission)): ?>
													<td>
														<?php if(in_array('viewRoom', $user_permission)): ?>											
															<a href="javascript:void(0)" class="btn btn-sm btn-warning view_room_type"><i data-feather="eye"></i></a>
														<?php endif ?>
														<?php if(in_array('editRoom', $user_permission)): ?>
															<a href="javascript:void(0)" class="btn btn-sm btn-info edit_room_type"><i data-feather="edit"></i></a>
														<?php endif ?>
														<?php if(in_array('deleteRoom', $user_permission)): ?>
															<a href="javascript:void(0)" class="btn btn-sm btn-danger deleteRoomType"><i data-feather="trash-2"></i></a>
														<?php endif ?>
													</td>
												<?php endif ?>
											</tr>										
										<?php $i++; endforeach; ?>
									<?php endif ?>
								</tbody>
							</table>
							<!-- End Room Type Table-->

							<!-- Start View Room Type Canvas-->
							<?= $this->include('offcanvas/view_room_type'); ?>
							<!-- End View room Type Canvas -->

							<!-- Start Edit Room Type Canvas -->
							<?= $this->include('offcanvas/edit_room_type'); ?>
							<!-- End Edit Room Type Canvas -->

							<!-- Start Delete Modal-->
							<?= $this->include('modals/delete'); ?>
							<!-- Delete Modal-->

						</div>
					</div>
				</div>

<!---------------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------ROOM SECTION--------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------------->

				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Rooms</h5>
							<button class="btn btn-md btn-primary float-end" data-bs-toggle="modal" data-bs-target="#AddNewRoom"><i data-feather="plus"></i> Add New</button>

							<!-- Start Add Room Modal-->
							<?= $this->include('modals/add_room'); ?>
							<!-- End Add Room Modal-->

							<hr class="my-4">
							<!-- Start Room Table-->
							<table id="#datatables-fixed-header" class="table table-striped table-responsive">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Room No</th>
										<th>Type</th>
										<th>Status</th>
										<?php if(in_array('editRoom', $user_permission) || in_array('viewRoom', $user_permission) || in_array('deleteRoom', $user_permission)): ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($rooms)): ?>
										<?php $i = 1; foreach ($rooms as $row): ?>
											<tr>
												<input type="hidden" name="room_id" class="room_id" value="<?= $row['room_id']; ?>">
												<td><?= $i ?></td>
												<td class="room_no"><?= $row['room_no']; ?></td>
												<td>
													<?php foreach ($room_types as $cl): ?>
														<?php if( $row['room_type_id'] == $cl['room_type_id']): ?>
															<?= $cl['title']; ?>
														<?php endif; ?>
													<?php endforeach ?> 
												</td>
												<?php if ($row['room_status'] == 'Vacant'): ?>
													<td><span class="badge bg-success"><?= $row['room_status']; ?></span></td>
												<?php endif; ?>
												<?php if ($row['room_status'] == 'Occupied'): ?>
													<td><span class="badge bg-danger"><?= $row['room_status']; ?></span></td>
												<?php endif; ?>
												<?php if ($row['room_status'] == 'Reserved'): ?>
													<td><span class="badge bg-warning"><?= $row['room_status']; ?></span></td>
												<?php endif; ?>
												<?php if(in_array('editRoom', $user_permission) || in_array('viewRoom', $user_permission) || in_array('deleteRoom', $user_permission)): ?>
													<td>
														<?php if(in_array('editRoom', $user_permission)): ?>
															<a href="javascript:void(0)" class="btn btn-sm btn-info edit_room"><i data-feather="edit"></i></a>
														<?php endif ?>
														<?php if(in_array('deleteRoom', $user_permission)): ?>
															<a href="javascript:void(0)" class="btn btn-sm btn-danger deleteRoom"><i data-feather="trash-2"></i></a>
														<?php endif ?>
													</td>
												<?php endif ?>
											</tr>
										<?php $i++; endforeach; ?>
									<?php endif ?>
								</tbody>
							</table>
							<!-- End Room Table-->

							<!-- Start Edit Room Type Canvas -->
							<?= $this->include('offcanvas/edit_room'); ?>
							<!-- End Edit Room Type Canvas -->

						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<script type="text/javascript">
		jquery_3_2_1(document).ready(function () {
			$(document).on('click', '.edit_room', function(){
				var room_id = $(this).closest('tr').find('.room_id').val();
				$.ajax({
					method: 'POST',
					url: 'ajax.room/edit',
					data: {'room_id':room_id},
					success: function (response) {
						//console.log(response);
						$.each(response, function (key, roomvalue) {
							$('#editRoomLabel').text('Edit Room ' + roomvalue['room_no']);
							$('.room_id_edit').val(roomvalue['room_id']);
							$('.room_no_edit').val(roomvalue['room_no']);
							$('.room_type_edit').val(roomvalue['room_type_id']);
							$('.room_status_edit').val(roomvalue['room_status']);
							$('#roomform').attr('action', '<?= base_url() ?>/editRoom/'+roomvalue['room_id']);
							$('#editRoomCanvas').offcanvas('show');							
						});
					}
				});
			});

			$(document).on('click', '.deleteRoom', function(){
				var delete_id = $(this).closest('tr').find('.room_id').val();
				$('#deleteModal').modal('show');
				$('#deleteForm').attr('action', '<?= base_url() ?>/deleteroom/'+delete_id);
			});

			$(document).on('click', '.deleteRoomType', function(){
				var delete_id = $(this).closest('tr').find('.room_type_id').val();
				$('#deleteModal').modal('show');
				$('#deleteForm').attr('action', '<?= base_url() ?>/deleteroomtype/'+delete_id);
			});

			jquery_3_2_1(document).on('click', '.edit_room_type', function(){
				var room_type_id = $(this).closest('tr').find('.room_type_id').val();
				$.ajax({
					method: 'POST',
					url: 'ajax.room_type/edit',
					data: {'room_type_id':room_type_id},
					success: function (response) {
						//console.log(response);
						$.each(response, function (key, roomvalue) {
							$('#editRoomTypeLabel').text('Edit '+roomvalue['title']);
							$('.id_edit').val(roomvalue['room_type_id']);
							$('.title_edit').val(roomvalue['title']);
							$('.price_edit').val(roomvalue['price']);
							$('.adult_edit').val(roomvalue['adult']);
							$('.kid_edit').val(roomvalue['kid']);
							if (roomvalue['air_condition'] == 1) {
								$('.ac_edit').prop('checked', 'true');
							}
							if (roomvalue['free_wifi'] == 1) {
								$('.fw_edit').prop('checked', 'true');
							}
							if (roomvalue['breakfast'] == 1) {
								$('.bf_edit').prop('checked', 'true');
							}
							if (roomvalue['double_bed'] == 1) {
								$('.db_edit').prop('checked', 'true');
							}
							if (roomvalue['newspaper'] == 1) {
								$('.np_edit').prop('checked', 'true');
							}
							if (roomvalue['coffee_maker'] == 1) {
								$('.cm_edit').prop('checked', 'true');
							}
							$('#roomtypeform').attr('action', '<?= base_url() ?>/editRoomType/'+roomvalue['room_type_id']);
							$('#editRoomTypeCanvas').offcanvas('show');
						});
					}
				});
			});

			jquery_3_2_1(document).on('click', '.view_room_type', function(){
				var room_type_id = $(this).closest('tr').find('.room_type_id').val();
				$.ajax({
					method: 'POST',
					url: 'ajax.room_type/edit',
					data: {'room_type_id':room_type_id},
					success: function (response) {
						// console.log(response);
						$.each(response, function (key, roomvalue) {							
							var room_price = '₦'+roomvalue['price'];
							$('#viewRoomTypeLabel').text(roomvalue['title']);
							$('.rt_price').text(room_price);
							$('.rt_adult').text(roomvalue['adult']);
							$('.rt_kid').text(roomvalue['kid']);
							if (roomvalue['air_condition'] == 1) {$('.rt_air_condition').html('<i class="feather-sm me-1" data-feather="corner-down-right"></i> Air Conditioner')}else{$('.rt_air_condition').html('')};
							if (roomvalue['free_wifi'] == 1) {$('.rt_free_wifi').html('<i class="feather-sm me-1" data-feather="corner-down-right"></i> Free Wifi')};
							if (roomvalue['double_bed'] == 1) {$('.rt_double_bed').html('<i class="feather-sm me-1" data-feather="corner-down-right"></i> Double Bed')};
							if (roomvalue['breakfast'] == 1) {$('.rt_breakfast').html('<i class="feather-sm me-1" data-feather="corner-down-right"></i> Breakfast')};
							if (roomvalue['newspaper'] == 1) {$('.rt_newspaper').html('<i class="feather-sm me-1" data-feather="corner-down-right"></i> Newspaper')};
							if (roomvalue['coffee_maker'] == 1) {$('.rt_coffee_maker').html('<i class="feather-sm me-1" data-feather="corner-down-right"></i> Coffee Maer')};
							$('#viewRoomTypeCanvas').offcanvas('show');
						});
					}
				});
			});
		});
	</script>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>