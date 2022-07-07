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
							<!-- Start Food Table-->
							<table id="datatables-fixed-header" class="table table-striped table-responsive">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Item</th>
										<th>Price</th>
										<?php if(in_array('editFood', $user_permission) || in_array('deleteFood', $user_permission)): ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($foods)): ?>
										<?php $i = 1; foreach ($foods as $row): ?>
											<tr>
												<input type="hidden" name="food_id" class="food_id" value="<?= $row['food_id']; ?>">
												<td><?= $i ?></td>
												<td class="food_name"><?= $row['food_name']; ?></td>
												<td class="food_price">₦<?= number_format($row['food_price']); ?></td>
												<?php if(in_array('editFood', $user_permission) || in_array('deleteFood', $user_permission)): ?>
													<td>
														<?php if(in_array('editFood', $user_permission)): ?>
															<a href="javascript:void(0)" class="btn btn-sm btn-info edit_food_item"><i data-feather="edit" ></i></a>
														<?php endif ?>
														<?php if(in_array('deleteFood', $user_permission)): ?>
															<a href="javascript:void(0)" class="btn btn-sm btn-danger delete"><i data-feather="trash-2"></i></a>
														<?php endif ?>
													</td>
												<?php endif ?>
											</tr>										
										<?php $i++; endforeach; ?>
									<?php endif ?>
								</tbody>
							</table>
							<!-- End Food Table-->

							<!-- Start Add Room Type Modal-->
							<?= $this->include('modals/edit_food'); ?>
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
				<?php if(in_array('addFood', $user_permission)): ?>
					<div class="col-6">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Add New Food</h5>

								<hr class="my-4">
								<!-- Start Add New Food Form-->
								<?= form_open('/foodItems') ?>
								<div class="modal-body m-3">
									<div class="col-12 col-lg-12">
										<div class="form-floating mb-3">
											<input type="text" class="form-control" id="floatingInput1" name="food_name" value="<?= set_value('food_name') ?>">
											<label for="floatingInput1">Food Name</label>
											<span class="text-danger"><?= display_error($validation, 'food_name') ?></span>
										</div>
									</div>
									<div class="col-12 col-lg-12">
										<div class="form-floating mb-3">
											<input type="text" class="form-control" id="floatingInput1" name="food_price" value="<?= set_value('food_price') ?>">
											<label for="floatingInput1">Price</label>
											<span class="text-danger"><?= display_error($validation, 'food_price') ?></span>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-success" name="save" value="Save">
								</div>
								<?= form_close() ?>
								<!-- End Add New Food Form-->

							</div>
						</div>
					</div>
				<?php endif ?>
			</div>
		</div>
	</main>
	<script type="text/javascript">
		jquery_3_2_1(document).ready(function () {
			$(document).on('click', '.edit_food_item', function(){
				var food_id = $(this).closest('tr').find('.food_id').val();
				$.ajax({
					method: 'POST',
					url: 'ajax.food/fetchFoodData',
					data: {'food_id':food_id},
					success: function (response) {
						//console.log(response);
						$.each(response, function (key, foodvalue) {
							$('.food_name_edit').val(foodvalue['food_name']);
							$('.food_price_edit').val(foodvalue['food_price']);
							$('#foodEditForm').attr('action', '<?= base_url() ?>/editFoodItem/'+foodvalue['food_id']);
							$('#editFoodItem').modal('show');							
						});
					}
				});
			});

			$(document).on('click', '.delete', function(){
				var delete_id = $(this).closest('tr').find('.food_id').val();
				$('#deleteModal').modal('show');
				$('#deleteForm').attr('action', '<?= base_url() ?>/deletefood/'+delete_id);
			});
		});
	</script>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>