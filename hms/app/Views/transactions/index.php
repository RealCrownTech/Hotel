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
										<th>Date</th>
										<th>Category</th>
										<th>Guest</th>
										<th>Bill ID</th>
										<th>Lodge ID</th>
										<th>Amount</th>
										<th>Paid With</th>
										<th>User</th>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($transaction_data)): ?>
										<?php $i = 1; foreach ($transaction_data as $row): ?>
											<tr>
												<td><?= date('d-M-Y',strtotime($row['date'])); ?></td>
												<td><?= $row['title']; ?></td>
												<td>
													<?php if($row['guest_id'] == '0'): ?>
														<?= 'Walk-In' ?>
													<?php else: ?>
														<?php foreach ($clients as $cl): ?>
															<?php if( $row['guest_id'] == $cl['client_id']): ?>
																<?= $cl['client_title']; ?>. <?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
															<?php endif; ?>
														<?php endforeach ?>
													<?php endif ?>
												</td>
												<td><?= $row['bill_no']; ?></td>
												<td><?= $row['lodge_no']; ?></td>
												<td class="text-end">₦<?= number_format($row['amount']); ?></td>
												<td><?= $row['paid_with'] ?></td>
												<td>
													<?php foreach ($staffs as $cl): ?>
														<?php if( $row['staff_id'] == $cl['user_id']): ?>
															<?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
														<?php endif; ?>
													<?php endforeach ?>
												</td>
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