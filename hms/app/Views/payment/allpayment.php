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
							<table id="datatables-fixed-header" class="table table-striped" style="width:100%">
								<thead>
									<tr>
										<th>Payment Date</th>
										<th>Payment ID</th>
										<th>Guest</th>
										<th>Amount</th>
										<th>Paid With</th>
										<?php if(in_array('editPayment', $user_permission) || in_array('viewPayment', $user_permission) || in_array('deletePayment', $user_permission)): ?>
											<th>Actions</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($payments)): ?>
										<?php $i = 1; foreach ($payments as $row): ?>
											<tr>
												<input type="hidden" class="payment_id" value="<?= $row['payment_no']; ?>">
												<td><?= date('d-M-Y',strtotime($row['payment_date'])); ?></td>
												<td><?= $row['payment_no']; ?></td>
												<td>
													<?php foreach ($clients as $key => $cl): ?>
														<?php if( $row['client_id'] == $cl['client_id']): ?>
															<?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
														<?php endif; ?>
													<?php endforeach ?>
												</td>
												<td class="text-end">
													<?= '₦'.number_format($row['amount']); ?>											
												</td>
												<td><?= $row['payment_option']; ?></td>
												<?php if(in_array('editPayment', $user_permission) || in_array('viewPayment', $user_permission) || in_array('deletePayment', $user_permission)): ?>
													<td>
														<!-- <a href="<?= base_url() ?>/invoice/<?= $row['payment_no']; ?>" class="btn btn-sm btn-primary"><i data-feather='eye'></i></a> -->
														<a href="<?= base_url() ?>/payment_receipt/<?= $row['payment_no']; ?>" class="btn btn-sm btn-success"><i data-feather='file-text'></i></a>
														<!-- <a href="javascript:void(0)" class="btn btn-sm btn-danger check_out" data-bs-toggle="modal" data-bs-target="#CheckOutModal"><i data-feather='power'></i></a> -->
														<!-- <?php if(in_array('editPayment', $user_permission)): ?>
															<a href="<?= base_url() ?>/swap/<?= $row['payment_no']; ?>" class="btn btn-sm btn-warning"><i data-feather='repeat'></i></a>
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
				var payment_no = $(this).closest('tr').find('.payment_id').val();
				$('#payment_id_modal').val(payment_no);
			});
		});
	</script>

	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>