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
										<th>Check-In Date</th>
										<th>Lodge ID</th>
										<th>Guest</th>
										<th>Room Occupied</th>
										<th>Check-Out Date</th>
										<th>Amount</th>
										<th>Paid With</th>
										<?php if(in_array('editLodge', $user_permission) || in_array('viewLodge', $user_permission) || in_array('deleteLodge', $user_permission)): ?>
											<th>Actions</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($lodges)): ?>
										<?php $i = 1; foreach ($lodges as $row): ?>
											<tr>
												<td><?= date('d-M-Y',strtotime($row['check_in_date'])); ?></td>
												<td><?= $row['lodge_no']; ?></td>
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
												<td><?= date('d-M-Y',strtotime($row['check_out_date'])); ?></td>
												<td class="text-end">
													<?php foreach($sum_all_transactions as $trans): ?>
														<?php if($row['lodge_no'] == $trans['lodge_no']): ?>
															₦<?= number_format($trans['amount'] - $row['discount']); ?>
														<?php endif ?>
													<?php endforeach ?>	
												</td>
												<td><?= $row['payment_option']; ?></td>
												<?php if(in_array('editLodge', $user_permission) || in_array('viewLodge', $user_permission) || in_array('deleteLodge', $user_permission)): ?>
													<td>
														<a href="<?= base_url() ?>/invoice/<?= $row['lodge_no']; ?>" class="btn btn-sm btn-primary"><i data-feather='eye'></i></a>
														<a href="<?= base_url() ?>/receipt/<?= $row['lodge_no']; ?>" class="btn btn-sm btn-success"><i data-feather='file-text'></i></a>
														<a href="<?= base_url() ?>/receipt/<?= $row['lodge_no']; ?>" class="btn btn-sm btn-warning"><i data-feather='database'></i></a>
													</td>
												<?php endif ?>
											</tr>
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
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>