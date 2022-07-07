<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3">Customer Profile</h1>

			<div class="row">
				<div class="col-md-4 col-xl-4">
					<div class="card mb-3">
						<div class="card-body text-center">
							<h5 class="card-title mb-0">Profile Details</h5>
							<hr class="my-4">
							<img src="<?= base_url() ?>/public/assets/img/avatars/me.png" alt="<?= $clientele['first_name'] ?> <?= $clientele['last_name'] ?>" class="img-fluid rounded-circle mb-2" width="128" height="128" />
							<h5 class="card-title mb-0"><?= $clientele['first_name'] ?> <?= $clientele['last_name'] ?></h5>
							<div class="text-muted mb-2"><?= $clientele['occupation'] ?></div>

							<div>
								<a class="btn btn-primary btn-sm" href="<?= base_url()?>/editClient/<?= $clientele['client_id'] ?>">Edit Profile</a>
							</div>
						</div>
						<hr class="my-0" />
						<div class="card-body">
							<h5 class="h6 card-title">About</h5>
							<ul class="list-unstyled mb-0">
								<li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Address <a href="javascript:void(0)"><?= $clientele['address'] ?></a></li>
							</ul>
						</div>
						<hr class="my-0" />
						<div class="card-body">
							<h5 class="h6 card-title">Contact</h5>
							<ul class="list-unstyled mb-0">
								<li class="mb-1"><span data-feather="at-sign" class="feather-sm me-1"></span> <a href="mailto:<?= $clientele['client_email'] ?>"><?= $clientele['client_email'] ?></a></li>
								<li class="mb-1"><span data-feather="phone" class="feather-sm me-1"></span> <a href="tel:<?= $clientele['mobile'] ?>"><?= $clientele['mobile'] ?></a></li>	
							</ul>
						</div>
						<hr class="my-0" />
						<div class="card-body">
							<h5 class="h6 card-title">Next Of Kin</h5>
							<ul class="list-unstyled mb-0">
								<li class="mb-1"><span data-feather="user" class="feather-sm me-1"></span> Name <a href="javascript:void(0)"><?= $clientele['kin_name'] ?></a></li>
								<li class="mb-1"><span data-feather="phone" class="feather-sm me-1"></span> Phone <a href="tel:<?= $clientele['kin_mobile'] ?>"><?= $clientele['kin_mobile'] ?></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-md-8 col-xl-8">
					<div class="card">
						<div class="card-body h-100">
							<h5 class="card-title mb-0">Booking History</h5>
							<hr class="my-4">
							<table id="datatables-dashboard-projects" class="table table-striped table-responsive">
								<thead>
									<tr>
										<th>Lodge No</th>
										<th>Room Occupied</th>
										<th>Check-In Date</th>
										<th>Check-Out Date</th>
										<th>Total Amount</th>
										<th>Actions</th>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($lodge_data)): ?>
									<?php foreach($lodge_data as $data): ?>
									<tr>
										<td><?= $data['lodge_no'] ?></td>
										<td>
											<?php foreach ($room_types as $cl): ?>
												<?php if( $data['room_type_id'] == $cl['room_type_id']): ?>
													<?= $cl['title']; ?>
												<?php endif; ?>
											<?php endforeach ?> 
											-
											<?php foreach ($rooms as $cl): ?>
												<?php if( $data['room_id'] == $cl['room_id']): ?>
													Room <?= $cl['room_no']; ?>
												<?php endif; ?>
											<?php endforeach ?>												
										</td>
										<td><?= date('d-M-Y', strtotime($data['check_in_date'])) ?></td>
										<td><?= date('d-M-Y', strtotime($data['check_out_date'])) ?></td>
										<td class="text-end">
											<?php foreach($sum_all_transactions as $trans): ?>
												<?php if($data['lodge_no'] == $trans['lodge_no']): ?>
													₦<?= number_format($trans['amount'] - $data['discount']); ?>
												<?php endif ?>
											<?php endforeach ?>
										</td>
										<td>
											<a href="<?= base_url() ?>/invoice/<?= $data['lodge_no']; ?>" class="btn btn-sm btn-primary"><i data-feather='eye'></i></a>
											<a href="<?= base_url() ?>/receipt/<?= $data['lodge_no']; ?>" class="btn btn-sm btn-success"><i data-feather='file-text'></i></a>
											<?php if ($data['checked_out'] != 1): ?>
												<a href="<?= base_url() ?>/swap/<?= $data['lodge_no']; ?>" class="btn btn-sm btn-warning"><i data-feather='repeat'></i></a>
											<?php endif ?>

										</td>
									</tr>
								<?php endforeach ?>
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