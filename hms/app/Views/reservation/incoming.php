<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<div class="row">
				<!-- <div class="col-md-12">
					<div class="card">											
						<div class="card-body">
							<h5 class="card-title">Filter</h5>
							<hr class="my-4">
							<div>
								<div class="row">
									<div class="mb-3 col-md-3">
										<label class="form-label" for="inputState">Guest<span class="font-13 text-danger">*</span></label>
										<select id="inputState" class="form-control">
						                     <option selected>--Choose--</option>
						                     <option>Rilwan Adelaja</option>
						                     <option>Precious Adesoji</option>
						                     <option>Nonso Blessing</option>
						                </select>
									</div>
									<div class="col-12 col-xl-3">
										<div class="mb-3 mb-xl-0">
											<label class="form-label">Date From<span class="font-13 text-danger">*</span></label>
											<input class="form-control" type="text" name="datesingle" />
										</div>
									</div>
									<div class="col-12 col-xl-3">
										<div class="mb-3 mb-xl-0">
											<label class="form-label">Date To<span class="font-13 text-danger">*</span></label>
											<input class="form-control" type="text" name="check_out_date" />
										</div>
									</div>
									<div class="mb-3 col-xl-2">
										<label class="form-label">Action</label> <br>
										<input type="submit" class="btn btn-success" value="Search" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->

				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<table id="datatables-fixed-header" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th>Reservation Date</th>
										<th>Reservation ID</th>
										<th>Guest</th>
										<th>Room Occupied</th>
										<th>Arrival Date</th>
										<th>Departure Date</th>
										<th>Total Amount</th>
										<th>Balance Amount</th>
										<th>Paid With</th>
										<?php if(in_array('editReservation', $user_permission) || in_array('viewReservation', $user_permission) || in_array('deleteReservation', $user_permission)): ?>
											<th>Actions</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($reservations)): ?>
										<?php $i = 1; foreach ($reservations as $row): ?>
											<tr>
												<input type="hidden" class="reservation_id" value="<?= $row['reservation_no']; ?>">
												<td><?= date('d-M-Y',strtotime($row['reservation_date'])); ?></td>
												<td><?= $row['reservation_no']; ?></td>
												<td>
													<?php foreach ($clients as $key => $cl): ?>
														<?php if( $row['client_id'] == $cl['client_id']): ?>
															<?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
														<?php endif; ?>
													<?php endforeach ?>
												</td>
												<td>
													<?php foreach ($room_types as $cl): ?>
														<?php if( $row['room_type_id'] == $cl['room_type_id']): ?>
															<?= $cl['title']; ?>
														<?php endif; ?>
													<?php endforeach ?> 
													-
													<?php foreach ($rooms as $cl): ?>
														<?php if( $row['room_id'] == $cl['room_id']): ?>
															Room <?= $cl['room_no']; ?>
														<?php endif; ?>
													<?php endforeach ?>													
												</td>

												<td><?= date('d-M-Y',strtotime($row['check_in_date'])); ?></td>
												<td><?= date('d-M-Y',strtotime($row['check_out_date'])); ?></td>
												<td class="text-end">
													<?= '₦'.number_format($row['total_amount']); ?>											
												</td>
												<td class="text-end">
													<?= '₦'.number_format($row['balance_amount']); ?>											
												</td>
												<td><?= $row['payment_option']; ?></td>
												<?php if(in_array('editReservation', $user_permission) || in_array('viewReservation', $user_permission) || in_array('deleteReservation', $user_permission)): ?>
													<td>
														<!-- <a href="<?= base_url() ?>/invoice/<?= $row['reservation_no']; ?>" class="btn btn-sm btn-primary"><i data-feather='eye'></i></a> -->
														<a href="<?= base_url() ?>/reservation_receipt/<?= $row['reservation_no']; ?>" class="btn btn-sm btn-success"><i data-feather='file-text'></i></a>
														<!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger check_out" data-bs-toggle="modal" data-bs-target="#CheckOutModal"><i data-feather='power'></i></a> -->
														<!-- <?php if(in_array('editReservation', $user_permission)): ?>
															<a href="<?= base_url() ?>/swap/<?= $row['reservation_no']; ?>" class="btn btn-sm btn-warning"><i data-feather='repeat'></i></a>
														<?php endif ?> -->
													<?php endif ?>
												</td>
											</tr>											
											<!-- Start Add Check Out Modal-->
											<?= $this->include('modals/checkouts'); ?>
											<!-- End Add Check Out Modal-->
										<?php $i++; endforeach; ?>
									<?php endif ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>

	<script type="text/javascript">
		jquery_3_2_1(document).ready(function () {
			$(document).on('click', '.check_out', function(){
				var reservation_no = $(this).closest('tr').find('.reservation_id').val();
				$('#reservation_id_modal').val(reservation_no);
			});
		});
	</script>

	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>