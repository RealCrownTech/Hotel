<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<div class="row mb-2 mb-xl-3">
				<div class="col-auto d-none d-sm-block">
					<h3><?= $page_name ?></h3>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-sm-3 col-xxl-3 d-flex">
					<div class="card flex-fill">
						<div class="card-body py-4">
							<div class="d-flex align-items-start">
								<div class="flex-grow-1">
									<h3 class="mb-2"><?= $occupied ?></h3>
									<p class="mb-2">Occupied Rooms</p>
									<!-- <div class="mb-0">
										<span class="badge badge-soft-success me-2"> +5.35% </span>
										<span class="text-muted">Since last week</span>
									</div> -->
								</div>
								<div class="d-inline-block ms-3">
									<div class="stat">
										<i class="align-middle text-success" data-feather="layers"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-3 col-xxl-3 d-flex">
					<div class="card flex-fill">
						<div class="card-body py-4">
							<div class="d-flex align-items-start">
								<div class="flex-grow-1">
									<h3 class="mb-2"><?= $vacant ?></h3>
									<p class="mb-2">Vacant Rooms</p>
									<!-- <div class="mb-0">
										<span class="badge badge-soft-danger me-2"> -4.25% </span>
										<span class="text-muted">Since last week</span>
									</div> -->
								</div>
								<div class="d-inline-block ms-3">
									<div class="stat">
										<i class="align-middle text-danger" data-feather="layers"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-3 col-xxl-3 d-flex">
					<div class="card flex-fill">
						<div class="card-body py-4">
							<div class="d-flex align-items-start">
								<div class="flex-grow-1">
									<h3 class="mb-2"><?= $reserved ?></h3>
									<p class="mb-2">Reserved Rooms</p>
									<!-- <div class="mb-0">
										<span class="badge badge-soft-success me-2"> +8.65% </span>
										<span class="text-muted">Since last week</span>
									</div> -->
								</div>
								<div class="d-inline-block ms-3">
									<div class="stat">
										<i class="align-middle text-info" data-feather="layers"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-3 col-xxl-3 d-flex">
					<div class="card flex-fill">
						<div class="card-body py-4">
							<div class="d-flex align-items-start">
								<div class="flex-grow-1">
									<h3 class="mb-2">
										<?php if(!empty($totalAmountToday)): ?> 
											<?= '₦'.number_format($totalAmountToday['amount']) ?>
										<?php else: ?>
											<?= '₦0' ?>
										<?php endif ?>
									</h3>
									<p class="mb-2">Today's Income</p>
									<!-- <div class="mb-0">
										<span class="badge badge-soft-success me-2"> +8.65% </span>
										<span class="text-muted">Since last week</span>
									</div> -->
								</div>
								<div class="d-inline-block ms-3">
									<div class="stat">
										<i class="align-middle text-info" data-feather="dollar-sign"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-body">
					<div id="fullcalendar"></div>
				</div>
			</div>

			<div class="row">
				<div class="col-12 col-lg-6 col-xl-6 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<h5 class="card-title mb-0">Rooms</h5>
						</div>
						<table id="datatables-dashboard-rooms" class="table table-striped my-0" style="width:100%">
							<thead>
								<tr>
									<th>Title</th>
									<th class="d-none d-xl-table-cell">Capacity</th>
									<th class="d-none d-xl-table-cell">Price</th>
									<th class="d-none d-md-table-cell">Room</th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($room_types)): ?>
									<?php foreach ($room_types as $value): ?>	
										<tr>
											<td><?= $value['title'] ?></td>
											<td class="d-none d-xl-table-cell">Adults: <?= $value['adult'] ?> <br> Kids: <?= $value['kid'] ?></td>
											<td class="d-none d-xl-table-cell">#<?= number_format($value['price']) ?></td>
											<td>
												<table class="table my-0">
													<thead>
														<th>Room No</th>
														<th>Status</th>
													</thead>
													<tbody>
														<?php if(!empty($rooms)): ?>
															<?php foreach ($rooms as $val): ?>
																<?php if( $value['room_type_id'] == $val['room_type_id']): ?>
																	<tr>
																		<td><?= $val['room_no'] ?></td>
																		<td><span class="badge <?php if ($val['room_status'] == 'Vacant') { echo 'bg-success'; }else if ($val['room_status'] == 'Occupied') { echo 'bg-danger'; } else { echo 'bg-warning'; } ?> "><?= $val['room_status'] ?></span></td>
																	</tr>
																<?php endif ?>
															<?php endforeach ?>
														<?php endif ?>
													</tbody>
												</table>
											</td>
										</tr>
									<?php endforeach?>
								<?php endif ?>								
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-12 col-lg-6 col-xl-6 d-flex">
					<div class="card flex-fill">
						<div class="card-header">
							<h5 class="card-title mb-0">Low Stock Alert</h5>
						</div>
						<table id="datatables-dashboard-stock" class="table table-striped my-0">
							<thead>
								<tr>
									<th>Product</th>
									<th class="d-none d-xl-table-cell">Current Stock</th>
								</tr>
							</thead>
							<tbody>
								<?php if(!empty($stocks)): ?>
									<?php foreach($stocks as $value): ?>
										<tr>
											<td><?= $value['stock_name'] ?></td>
											<td class="d-none d-xl-table-cell"><?= $value['stock_qty'] ?></td>								
										</tr>
									<?php endforeach ?>		
								<?php endif ?>						
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</main>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>