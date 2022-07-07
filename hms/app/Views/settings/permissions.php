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
							<?php $serialize_permission = unserialize($user_role['permissions']); ?>
							<?= form_open('/privileges/'.$user_role['role_id']) ?>
								<table id="datatables-permission" class="table table-striped table-responsive">
									<thead>
										<tr>
											<th>Permission</th>
											<th class="text-center">Add</th>
											<th class="text-center">Edit</th>
											<th class="text-center">View</th>
											<th class="text-center">Delete</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><strong>Lodge</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addLodge" id="permission" <?php if($serialize_permission) { if(in_array('addLodge', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editLodge" id="permission" <?php if($serialize_permission) { if(in_array('editLodge', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewLodge" id="permission" <?php if($serialize_permission) { if(in_array('viewLodge', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteLodge" id="permission" <?php if($serialize_permission) { if(in_array('deleteLodge', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>Reservation</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addReservation" id="permission" <?php if($serialize_permission) { if(in_array('addReservation', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editReservation" id="permission" <?php if($serialize_permission) { if(in_array('editReservation', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewReservation" id="permission" <?php if($serialize_permission) { if(in_array('viewReservation', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteReservation" id="permission" <?php if($serialize_permission) { if(in_array('deleteReservation', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>Users</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addUser" id="permission" <?php if($serialize_permission) { if(in_array('addUser', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editUser" id="permission" <?php if($serialize_permission) { if(in_array('editUser', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewUser" id="permission" <?php if($serialize_permission) { if(in_array('viewUser', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteUser" id="permission" <?php if($serialize_permission) { if(in_array('deleteUser', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>Clients</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addClient" id="permission" <?php if($serialize_permission) { if(in_array('addClient', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editClient" id="permission" <?php if($serialize_permission) { if(in_array('editClient', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewClient" id="permission" <?php if($serialize_permission) { if(in_array('viewClient', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteClient" id="permission" <?php if($serialize_permission) { if(in_array('deleteClient', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>Rooms</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addRoom" id="permission" <?php if($serialize_permission) { if(in_array('addRoom', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editRoom" id="permission" <?php if($serialize_permission) { if(in_array('editRoom', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewRoom" id="permission" <?php if($serialize_permission) { if(in_array('viewRoom', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteRoom" id="permission" <?php if($serialize_permission) { if(in_array('deleteRoom', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>Permissions</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addPermission" id="permission" <?php if($serialize_permission) { if(in_array('addPermission', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editPermission" id="permission" <?php if($serialize_permission) { if(in_array('editPermission', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewPermission" id="permission" <?php if($serialize_permission) { if(in_array('viewPermission', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deletePermission" id="permission" <?php if($serialize_permission) { if(in_array('deletePermission', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>Food</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addFood" id="permission" <?php if($serialize_permission) { if(in_array('addFood', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editFood" id="permission" <?php if($serialize_permission) { if(in_array('editFood', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewFood" id="permission" <?php if($serialize_permission) { if(in_array('viewFood', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteFood" id="permission" <?php if($serialize_permission) { if(in_array('deleteFood', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>Stock</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addStock" id="permission" <?php if($serialize_permission) { if(in_array('addStock', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editStock" id="permission" <?php if($serialize_permission) { if(in_array('editStock', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewStock" id="permission" <?php if($serialize_permission) { if(in_array('viewStock', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteStock" id="permission" <?php if($serialize_permission) { if(in_array('deleteStock', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>Payment</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addPayment" id="permission" <?php if($serialize_permission) { if(in_array('addPayment', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editPayment" id="permission" <?php if($serialize_permission) { if(in_array('editPayment', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewPayment" id="permission" <?php if($serialize_permission) { if(in_array('viewPayment', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deletePayment" id="permission" <?php if($serialize_permission) { if(in_array('deletePayment', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>Amenities</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addAmenities" id="permission" <?php if($serialize_permission) { if(in_array('addAmenities', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editAmenities" id="permission" <?php if($serialize_permission) { if(in_array('editAmenities', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewAmenities" id="permission" <?php if($serialize_permission) { if(in_array('viewAmenities', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteAmenities" id="permission" <?php if($serialize_permission) { if(in_array('deleteAmenities', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>Food Order</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addFoodOrder" id="permission" <?php if($serialize_permission) { if(in_array('addFoodOrder', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editFoodOrder" id="permission" <?php if($serialize_permission) { if(in_array('editFoodOrder', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewFoodOrder" id="permission" <?php if($serialize_permission) { if(in_array('viewFoodOrder', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteFoodOrder" id="permission" <?php if($serialize_permission) { if(in_array('deleteFoodOrder', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>Stock Order</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addStockOrder" id="permission" <?php if($serialize_permission) { if(in_array('addStockOrder', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editStockOrder" id="permission" <?php if($serialize_permission) { if(in_array('editStockOrder', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewStockOrder" id="permission" <?php if($serialize_permission) { if(in_array('viewStockOrder', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteStockOrder" id="permission" <?php if($serialize_permission) { if(in_array('deleteStockOrder', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>AmenitiesOrder</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addAmenitiesOrder" id="permission" <?php if($serialize_permission) { if(in_array('addAmenitiesOrder', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editAmenitiesOrder" id="permission" <?php if($serialize_permission) { if(in_array('editAmenitiesOrder', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewAmenitiesOrder" id="permission" <?php if($serialize_permission) { if(in_array('viewAmenitiesOrder', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteAmenitiesOrder" id="permission" <?php if($serialize_permission) { if(in_array('deleteAmenitiesOrder', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
										<tr>
											<td><strong>Settings</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addSetting" id="permission" <?php if($serialize_permission) { if(in_array('addSetting', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editSetting" id="permission" <?php if($serialize_permission) { if(in_array('editSetting', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewSetting" id="permission" <?php if($serialize_permission) { if(in_array('viewSetting', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteSetting" id="permission" <?php if($serialize_permission) { if(in_array('deleteSetting', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>

										<tr>
											<td><strong>Transactions</strong></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="addTransaction" id="permission" <?php if($serialize_permission) { if(in_array('addTransaction', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="editTransaction" id="permission" <?php if($serialize_permission) { if(in_array('editTransaction', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="viewTransaction" id="permission" <?php if($serialize_permission) { if(in_array('viewTransaction', $serialize_permission)) { echo "checked"; } } ?>></td>
											<td class="text-center"><input type="checkbox" name="permission[]" value="deleteTransaction" id="permission" <?php if($serialize_permission) { if(in_array('deleteTransaction', $serialize_permission)) { echo "checked"; } } ?>></td>
										</tr>
									</tbody>
								</table>
								<hr class="my-4">
								<input class="btn btn-primary float-end" type="submit" name="save" value="Update">
							<?= form_close() ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>