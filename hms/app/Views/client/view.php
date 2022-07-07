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
										<th>Name</th>
										<th>Email</th>
										<th>Mobile No</th>
										<th>Occupation</th>
										<?php if(in_array('editClient', $user_permission) || in_array('viewClient', $user_permission) || in_array('deleteClient', $user_permission)): ?>
											<th>Action</th>
										<?php endif ?>	
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($clientele)): ?>
										<?php $i = 1; foreach ($clientele as $row): ?>
											<tr>
												<input type="hidden" class="client_id" name="" value="<?= $row['client_id']; ?>">
												<td><?= $i ?></td>
												<td><?= ucfirst($row['first_name']); ?> <?= ucfirst($row['last_name']); ?></td>
												<td><?= $row['client_email']; ?></td>
												<td><?= $row['mobile']; ?></td>
												<td><?= ucfirst($row['occupation']); ?></td>
												<?php if(in_array('editClient', $user_permission) || in_array('viewClient', $user_permission) || in_array('deleteClient', $user_permission)): ?>
													<td>
														<?php if(in_array('viewClient', $user_permission)): ?>
															<a href="<?= base_url() ?>/viewProfile/<?= $row['client_id'] ?>" class="btn btn-sm btn-warning"><i data-feather="eye"></i></a>
														<?php endif ?>
														<?php if(in_array('editClient', $user_permission)): ?>
															<a href="<?= base_url() ?>/editClient/<?= $row['client_id'] ?>" class="btn btn-sm btn-info"><i data-feather="edit"></i></a>
														<?php endif ?>
														<?php if(in_array('deleteClient', $user_permission)): ?>
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
				var delete_id = $(this).closest('tr').find('.client_id').val();
				$('#deleteModal').modal('show');
				$('#deleteForm').attr('action', '<?= base_url() ?>/deleteclient/'+delete_id);
			});
		});
	</script>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>