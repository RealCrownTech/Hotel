<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<div class="row">

<!---------------------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------FOOD ITEM TABLE SECTION--------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------------->

				<div class="col-6">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><?= $page_name ?></h5>

							<hr class="my-4">
							<!-- Start Amenities Table-->
							<table id="datatables-fixed-header" class="table table-striped table-responsive">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Item</th>
										<th>Price</th>
										<?php if(in_array('editAmenities', $user_permission) || in_array('deleteAmenities', $user_permission)): ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($amenities)): ?>
										<?php $i = 1; foreach ($amenities as $row): ?>
											<tr>
												<input type="hidden" name="amenities_id" class="amenities_id" value="<?= $row['amenities_id']; ?>">
												<td><?= $i ?></td>
												<td class="amenities_name"><?= $row['amenities_name']; ?></td>
												<td class="amenities_price">₦<?= number_format($row['amenities_price']); ?></td>
												<?php if(in_array('editAmenities', $user_permission) || in_array('deleteAmenities', $user_permission)): ?>
													<td>
														<?php if(in_array('editAmenities', $user_permission)): ?>
															<a href="javascript:void(0)" class="btn btn-sm btn-info edit_amenities_item"><i data-feather="edit" ></i></a>
														<?php endif ?>
														<?php if(in_array('deleteAmenities', $user_permission)): ?>
															<a href="javascript:void(0)" class="btn btn-sm btn-danger delete"><i data-feather="trash-2"></i></a>
														<?php endif ?>
													</td>
												<?php endif ?>
											</tr>										
										<?php $i++; endforeach; ?>
									<?php endif ?>
								</tbody>
							</table>
							<!-- End Amenities Table-->

							<!-- Start Add Room Type Modal-->
							<?= $this->include('modals/edit_amenities'); ?>
							<!-- End Add Room Type Modal-->

							<!-- Start Delete Modal-->
							<?= $this->include('modals/delete'); ?>
							<!-- Delete Modal-->

						</div>
					</div>
				</div>

<!---------------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------ADD FOOD ITEM SECTION--------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------------->
				<?php if(in_array('addAmenities', $user_permission)): ?>
					<div class="col-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Add New Amenities</h5>

								<hr class="my-4">
								<!-- Start Add New Amenities Form-->
								<?= form_open('/amenitiesItems') ?>
								<div class="modal-body m-3">
									<div class="col-12 col-lg-12">
										<div class="form-floating mb-3">
											<input type="text" class="form-control" id="floatingInput1" name="amenities_name" value="<?= set_value('amenities_name') ?>">
											<label for="floatingInput1">Amenities Name</label>
											<span class="text-danger"><?= display_error($validation, 'amenities_name') ?></span>
										</div>
									</div>
									<div class="col-12 col-lg-12">
										<div class="form-floating mb-3">
											<input type="text" class="form-control" id="floatingInput1" name="amenities_price" value="<?= set_value('amenities_price') ?>">
											<label for="floatingInput1">Price</label>
											<span class="text-danger"><?= display_error($validation, 'amenities_price') ?></span>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-success" name="save" value="Save">
								</div>
								<?= form_close() ?>
								<!-- End Add New Amenities Form-->

							</div>
						</div>
					</div>
				<?php endif ?>
			</div>
		</div>
	</main>
	<script type="text/javascript">
		jquery_3_2_1(document).ready(function () {
			$(document).on('click', '.edit_amenities_item', function(){
				var amenities_id = $(this).closest('tr').find('.amenities_id').val();
				$.ajax({
					method: 'POST',
					url: 'ajax.amenities/fetchAmenitiesData',
					data: {'amenities_id':amenities_id},
					success: function (response) {
						//console.log(response);
						$.each(response, function (key, amenitiesvalue) {
							$('.amenities_name_edit').val(amenitiesvalue['amenities_name']);
							$('.amenities_price_edit').val(amenitiesvalue['amenities_price']);
							$('#amenitiesEditForm').attr('action', '<?= base_url() ?>/editAmenitiesItem/'+amenitiesvalue['amenities_id']);
							$('#editAmenitiesItem').modal('show');							
						});
					}
				});
			});

			$(document).on('click', '.delete', function(){
				var delete_id = $(this).closest('tr').find('.amenities_id').val();
				$('#deleteModal').modal('show');
				$('#deleteForm').attr('action', '<?= base_url() ?>/deleteamenities/'+delete_id);
			});
		});
	</script>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>