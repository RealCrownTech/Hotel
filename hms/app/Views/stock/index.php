<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<div class="row">

<!---------------------------------------------------------------------------------------------------------------------------------------------->
<!--------------------------------------------------------------STOCK ITEM TABLE SECTION-------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------------->

				<div class="col-8">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title"><?= $page_name ?></h5>

							<hr class="my-4">
							<!-- Start Stock Table-->
							<table id="datatables-fixed-header" class="table table-striped table-responsive">
								<thead>
									<tr>
										<th>S/N</th>
										<th>Item</th>
										<th>Cost Price</th>
										<th>Selling Price</th>
										<th>Qty</th>
										<?php if(in_array('editStock', $user_permission) || in_array('deleteStock', $user_permission)): ?>
											<th>Action</th>
										<?php endif ?>
									</tr>
								</thead>
								<tbody>
									<?php if(!empty($stocks)): ?>
										<?php $i = 1; foreach ($stocks as $row): ?>
											<tr>
												<input type="hidden" name="stock_id" class="stock_id" value="<?= $row['stock_id']; ?>">
												<td><?= $i ?></td>
												<td class="stock_name"><?= $row['stock_name']; ?></td>
												<td class="stock_cost">₦<?= number_format($row['cost_price']); ?></td>
												<td class="stock_selling">₦<?= number_format($row['selling_price']); ?></td>
												<td class="stock_qty"><?= number_format($row['stock_qty']); ?></td>
												<?php if(in_array('editStock', $user_permission) || in_array('deleteStock', $user_permission)): ?>
													<td>
														<?php if(in_array('editStock', $user_permission)): ?>
															<a href="javascript:void(0)" class="btn btn-sm btn-info edit_stock_item"><i data-feather="edit" ></i></a>
														<?php endif ?>
														<?php if(in_array('deleteStock', $user_permission)): ?>
															<a href="javascript:void(0)" class="btn btn-sm btn-danger delete"><i data-feather="trash-2"></i></a>
														<?php endif ?>
													</td>
												<?php endif ?>
											</tr>										
										<?php $i++; endforeach; ?>
									<?php endif ?>
								</tbody>
							</table>
							<!-- End Stock Table-->

							<!-- Start Add Room Type Modal-->
							<?= $this->include('modals/edit_stock'); ?>
							<!-- End Add Room Type Modal-->

							<!-- Start Delete Modal-->
							<?= $this->include('modals/delete'); ?>
							<!-- Delete Modal-->

						</div>
					</div>
				</div>

<!---------------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------ADD STOCK ITEM SECTION----------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------------->
			
				<?php if(in_array('addStock', $user_permission)): ?>
					<div class="col-4">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Add New Stock</h5>

								<hr class="my-4">
								<!-- Start Add New Stock Form-->
								<?= form_open('/stockItems') ?>
								<div class="modal-body m-3">
									<div class="col-12 col-lg-12">
										<div class="form-floating mb-3">
											<input type="text" class="form-control" id="floatingInput1" name="stock_name" value="<?= set_value('stock_name') ?>">
											<label for="floatingInput1">Stock Name</label>
											<span class="text-danger"><?= display_error($validation, 'stock_name') ?></span>
										</div>
									</div>
									<div class="col-12 col-lg-12">
										<div class="form-floating mb-3">
											<input type="text" class="form-control stock_price_edit" id="floatingInput1" name="cost_price" value="<?= set_value('cost_price') ?>">
											<label for="floatingInput1">Cost Price</label>
											<span class="text-danger"><?= display_error($validation, 'cost_price') ?></span>
										</div>
									</div>
									<div class="col-12 col-lg-12">
										<div class="form-floating mb-3">
											<input type="text" class="form-control stock_price_edit" id="floatingInput1" name="selling_price" value="<?= set_value('selling_price') ?>">
											<label for="floatingInput1">Selling Price</label>
											<span class="text-danger"><?= display_error($validation, 'selling_price') ?></span>
										</div>
									</div>
									<div class="col-12 col-lg-12">
										<div class="form-floating mb-3">
											<input type="text" class="form-control stock_price_edit" id="floatingInput1" name="quantity" value="<?= set_value('quantity') ?>">
											<label for="floatingInput1">Quantity</label>
											<span class="text-danger"><?= display_error($validation, 'quantity') ?></span>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<input type="submit" class="btn btn-success" name="save" value="Save">
								</div>
								<?= form_close() ?>
								<!-- End Add New Stock Form-->

							</div>
						</div>
					</div>
				<?php endif ?>
			</div>
		</div>
	</main>
	<script type="text/javascript">
		jquery_3_2_1(document).ready(function () {
			$(document).on('click', '.edit_stock_item', function(){
				var stock_id = $(this).closest('tr').find('.stock_id').val();
				$.ajax({
					method: 'POST',
					url: 'ajax.stock/fetchStockData',
					data: {'stock_id':stock_id},
					success: function (response) {
						$.each(response, function (key, stockvalue) {
							$('.stock_name_edit').val(stockvalue['stock_name']);
							$('.stock_cost_edit').val(stockvalue['cost_price']);
							$('.stock_selling_edit').val(stockvalue['selling_price']);
							$('.stock_qty_edit').val(stockvalue['stock_qty']);
							$('#stockEditForm').attr('action', '<?= base_url() ?>/editStockItem/'+stockvalue['stock_id']);
							$('#editStockItem').modal('show');							
						});
					}
				});
			});

			$(document).on('click', '.delete', function(){
				var delete_id = $(this).closest('tr').find('.stock_id').val();
				$('#deleteModal').modal('show');
				$('#deleteForm').attr('action', '<?= base_url() ?>/deletestock/'+delete_id);
			});
		});
	</script>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>