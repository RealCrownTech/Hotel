<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><?= $page_name ?></h5>
							<hr class="my-4">
							<table id="datatables-fixed-header" class="table table-striped table-responsive">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Date</th>
										<th>Bill No</th>
										<th>Guest</th>
										<th>Amount</th>
										<th>Paid With</th>
										<?php if(in_array('editFoodOrder', $user_permission) || in_array('viewFoodOrder', $user_permission) || in_array('deleteFoodOrder', $user_permission)): ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($orders)): ?>
										<?php $i = 1; foreach ($orders as $row): ?>
											<tr>
												<input type="hidden" class="food_order_id" name="" value="<?= $row['order_id']; ?>">
												<td><?= $i ?></td>
												<th><?= date('d-M-Y', strtotime($row['date'])) ?></th>
												<td><?= $row['bill_no']; ?></td>
												<td><?php if ($row['client'] == 'Walk-In'): ?>
														<?= 'Walk-In'; ?>
													<?php endif ?>
													<?php foreach ($clients as $cl): ?>
														<?php if( $row['client'] == $cl['client_id']): ?>
															<?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
														<?php endif; ?>
													<?php endforeach ?>
												</td>
												<td>₦<?= number_format($row['amount']); ?></td>
												<td><?= $row['payment_option']; ?></td>
												<?php if(in_array('editFoodOrder', $user_permission) || in_array('viewFoodOrder', $user_permission) || in_array('deleteFoodOrder', $user_permission)): ?>
													<td>
														<?php if(in_array('viewFoodOrder', $user_permission)): ?>
															<a href="<?= base_url() ?>/viewFoodOrder/<?= $row['order_id'] ?>" class="btn btn-sm btn-warning"><i data-feather="eye"></i></a>
														<?php endif ?>
														<?php if(in_array('editFoodOrder', $user_permission)): ?>
															<a href="<?= base_url() ?>/editFoodOrder/<?= $row['order_id'] ?>" class="btn btn-sm btn-info"><i data-feather="edit"></i></a>
														<?php endif ?>	
														<?php if(in_array('deleteFoodOrder', $user_permission)): ?>
															<a href="javascript:void(0)" class="btn btn-sm btn-danger delete"><i data-feather="trash-2"></i></a>
														<?php endif ?>	
													</td>
												<?php endif ?>
											</tr>										
										<?php $i++; endforeach; ?>
									<?php endif ?>
								</tbody>
							</table>
							<!-- Start Delete Modal-->
							<?= $this->include('modals/delete'); ?>
							<!-- Delete Modal-->
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>
	<script type="text/javascript">
		jquery_3_2_1(document).ready(function () {
			$(document).on('click', '.delete', function(){
				var delete_id = $(this).closest('tr').find('.food_order_id').val();
				$('#deleteModal').modal('show');
				$('#deleteForm').attr('action', '<?= base_url() ?>/deletefoodorder/'+delete_id);
			});
		});
	</script>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>