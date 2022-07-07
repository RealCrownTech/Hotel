<nav id="sidebar" class="sidebar">
	<div class="sidebar-content js-simplebar">
		<a class="sidebar-brand" href="home">
      <span class="align-middle me-3">The Ashokas</span>
    </a>

		<ul class="sidebar-nav">
			<li class="sidebar-header">
				Navigation
			</li>
			<li class="sidebar-item <?php if($page_name == 'home'): echo 'active'; endif; ?>">
				<a class="sidebar-link" href="<?= base_url() ?>/dashboard">
		          <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
		        </a>
			</li>
			<?php if($user_permission): ?>

				<?php if(in_array('addUser', $user_permission) || in_array('editUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
					<li class="sidebar-item <?php if($page_name == 'Add User' || $page_name == 'Users'): echo 'active'; endif; ?>">
						<a data-bs-target="#users" data-bs-toggle="collapse" class="sidebar-link collapsed">
			              <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users</span>
			            </a>
						<ul id="users" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<?php if(in_array('addUser', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/addUser">Add User</a></li>
							<?php endif ?>
							<?php if(in_array('editUser', $user_permission) || in_array('viewUser', $user_permission) || in_array('deleteUser', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/users">All Users</a></li>
							<?php endif ?>
						</ul>
					</li>
				<?php endif ?>

				<?php if(in_array('addClient', $user_permission) || in_array('editClient', $user_permission) || in_array('viewClient', $user_permission) || in_array('deleteClient', $user_permission)): ?>
					<li class="sidebar-item <?php if($page_name == 'Add Client' || $page_name == 'Clients'): echo 'active'; endif; ?>">
						<a data-bs-target="#clients" data-bs-toggle="collapse" class="sidebar-link collapsed">
			              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Clients</span>
			            </a>
						<ul id="clients" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<?php if(in_array('addClient', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/addClient">Add Client</a></li>	
							<?php endif ?>
							<?php if(in_array('editClient', $user_permission) || in_array('viewClient', $user_permission) || in_array('deleteClient', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/clients">All Clients</a></li>
							<?php endif ?>
						</ul>
					</li>
				<?php endif ?>

				<?php if(in_array('addLodge', $user_permission) || in_array('editLodge', $user_permission) || in_array('viewLodge', $user_permission) || in_array('deleteLodge', $user_permission)): ?>
					<li class="sidebar-item <?php if($page_name == 'lodge'): echo 'active'; endif; ?>">
						<a data-bs-target="#lodge" data-bs-toggle="collapse" class="sidebar-link collapsed">
			              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Lodge</span>
			            </a>
						<ul id="lodge" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<?php if(in_array('addLodge', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/checkIn">Check-In</a></li>
							<?php endif ?>
							<?php if(in_array('viewLodge', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/list-check-ins">All Check In's</a></li>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/list-check-outs">All Check Out's</a></li>
							<?php endif ?>
						</ul>
					</li>
				<?php endif ?>

				<?php if(in_array('addReservation', $user_permission) || in_array('editReservation', $user_permission) || in_array('viewReservation', $user_permission) || in_array('deleteReservation', $user_permission)): ?>
					<li class="sidebar-item <?php if($page_name == 'reservation'): echo 'active'; endif; ?>">
						<a data-bs-target="#reservation" data-bs-toggle="collapse" class="sidebar-link collapsed">
			              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Reservation</span>
			            </a>
						<ul id="reservation" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<?php if(in_array('addReservation', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/reserve">Create</a></li>
							<?php endif ?>
							<?php if(in_array('viewReservation', $user_permission)): ?>	
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/reservations">All Reservations</a></li>
								<!-- <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/reservations">Treated Reservations</a></li> -->
							<?php endif ?>	
						</ul>
					</li>
				<?php endif ?>

				<?php if(in_array('addPayment', $user_permission) || in_array('editPayment', $user_permission) || in_array('viewPayment', $user_permission) || in_array('deletePayment', $user_permission)): ?>
					<li class="sidebar-item <?php if($page_name == 'Payment'): echo 'active'; endif; ?>">
						<a data-bs-target="#payment" data-bs-toggle="collapse" class="sidebar-link collapsed">
			              <i class="align-middle" data-feather="check-square"></i> <span class="align-middle">Payment</span>
			            </a>
						<ul id="payment" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<?php if(in_array('addPayment', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/addpayment">Create</a></li>
							<?php endif ?>
							<?php if(in_array('viewPayment', $user_permission)): ?>	
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/payments">All Payments</a></li>
								<!-- <li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/payments">Treated Payments</a></li> -->
							<?php endif ?>	
						</ul>
					</li>
				<?php endif ?>	

				<?php if(in_array('addFood', $user_permission) || in_array('editFood', $user_permission) || in_array('viewFood', $user_permission) || in_array('deleteFood', $user_permission) || in_array('addFoodOrder', $user_permission) || in_array('editFoodOrder', $user_permission) || in_array('viewFoodOrder', $user_permission) || in_array('deleteFoodOrder', $user_permission)): ?>
					<li class="sidebar-item <?php if($page_name == 'Food'): echo 'active'; endif; ?>">
						<a data-bs-target="#foods" data-bs-toggle="collapse" class="sidebar-link collapsed">
			              <i class="align-middle" data-feather="disc"></i> <span class="align-middle">Food Orders</span>
			            </a>
						<ul id="foods" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<?php if(in_array('addFood', $user_permission) || in_array('editFood', $user_permission) || in_array('viewFood', $user_permission) || in_array('deleteFood', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/foodItems">Food Items</a></li>
							<?php endif ?>
							<?php if(in_array('addFoodOrder', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/createOrder">Create Order</a></li>
							<?php endif ?>
							<?php if(in_array('editFoodOrder', $user_permission) || in_array('viewFoodOrder', $user_permission) || in_array('deleteFoodOrder', $user_permission)): ?>	
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/allOrder">All Orders</a></li>
							<?php endif ?>
						</ul>
					</li>
				<?php endif ?>

				<?php if(in_array('addStock', $user_permission) || in_array('editStock', $user_permission) || in_array('viewStock', $user_permission) || in_array('deleteStock', $user_permission) || in_array('addStockOrder', $user_permission) || in_array('editStockOrder', $user_permission) || in_array('viewStockOrder', $user_permission) || in_array('deleteStockOrder', $user_permission)): ?>
					<li class="sidebar-item <?php if($page_name == 'Stock'): echo 'active'; endif; ?>">
						<a data-bs-target="#stocks" data-bs-toggle="collapse" class="sidebar-link collapsed">
			              <i class="align-middle" data-feather="gitlab"></i> <span class="align-middle">Stock Orders</span>
			            </a>
						<ul id="stocks" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<?php if(in_array('addStock', $user_permission) || in_array('editStock', $user_permission) || in_array('viewStock', $user_permission) || in_array('deleteStock', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/stockItems">Stock Items</a></li>
							<?php endif ?>
							<?php if(in_array('addStockOrder', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/createStockOrder">Create Order</a></li>
							<?php endif ?>
							<?php if(in_array('editStockOrder', $user_permission) || in_array('viewStockOrder', $user_permission) || in_array('deleteStockOrder', $user_permission)): ?>	
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/allStockOrder">All Orders</a></li>
							<?php endif ?>
						</ul>
					</li>
				<?php endif ?>	

				<?php if(in_array('addAmenities', $user_permission) || in_array('editAmenities', $user_permission) || in_array('viewAmenities', $user_permission) || in_array('deleteAmenities', $user_permission) || in_array('addAmenitiesOrder', $user_permission) || in_array('editAmenitiesOrder', $user_permission) || in_array('viewAmenitiesOrder', $user_permission) || in_array('deleteAmenitiesOrder', $user_permission)): ?>
					<li class="sidebar-item <?php if($page_name == 'Amenities'): echo 'active'; endif; ?>">
						<a data-bs-target="#amenities" data-bs-toggle="collapse" class="sidebar-link collapsed">
			              <i class="align-middle" data-feather="disc"></i> <span class="align-middle">Amenities Orders</span>
			            </a>
						<ul id="amenities" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<?php if(in_array('addAmenities', $user_permission) || in_array('editAmenities', $user_permission) || in_array('viewAmenities', $user_permission) || in_array('deleteAmenities', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/amenitiesItems">Amenities Items</a></li>
							<?php endif ?>
							<?php if(in_array('addAmenitiesOrder', $user_permission)): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/createAmenitiesOrder">Create Order</a></li>
							<?php endif ?>
							<?php if(in_array('editAmenitiesOrder', $user_permission) || in_array('viewAmenitiesOrder', $user_permission) || in_array('deleteAmenitiesOrder', $user_permission)): ?>	
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/allAmenitiesOrder">All Orders</a></li>
							<?php endif ?>
						</ul>
					</li>
				<?php endif ?>

				<?php if(in_array('addRoom', $user_permission) || in_array('editRoom', $user_permission) || in_array('viewRoom', $user_permission) || in_array('deleteRoom', $user_permission)): ?>
					<li class="sidebar-item <?php if($page_name == 'Room Types' || $page_name == 'All Rooms'): echo 'active'; endif; ?>">
						<a class="sidebar-link" href="<?= base_url() ?>/rooms">
				          <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Rooms</span>
				        </a>
					</li>
				<?php endif ?>

				<?php if(in_array('addTransaction', $user_permission) || in_array('editTransaction', $user_permission) || in_array('viewTransaction', $user_permission) || in_array('deleteTransaction', $user_permission)): ?>
					<li class="sidebar-item <?php if($page_name == 'Transactions'): echo 'active'; endif; ?>">
						<a class="sidebar-link" href="<?= base_url() ?>/transactions">
				          <i class="align-middle" data-feather="dollar-sign"></i> <span class="align-middle">Transactions</span>
				        </a>
					</li>
				<?php endif ?>

				<?php if(in_array('addPermission', $user_permission) || in_array('editPermission', $user_permission) || in_array('viewPermission', $user_permission) || in_array('deletePermission', $user_permission)): ?>
					<li class="sidebar-item <?php if($page_name == 'Permission'): echo 'active'; endif; ?>">
						<a data-bs-target="#role_permission" data-bs-toggle="collapse" class="sidebar-link collapsed">
			              <i class="align-middle" data-feather="alert-triangle"></i> <span class="align-middle">Permission</span>
			            </a>
						<ul id="role_permission" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
							<?php foreach($roles_data as $roles): ?>
								<li class="sidebar-item"><a class="sidebar-link" href="<?= base_url() ?>/privileges/<?= $roles['role_id'] ?>"><?= $roles['role_name'] ?></a></li>
							<?php endforeach ?>
						</ul>
					</li>
				<?php endif ?>

				<?php if(in_array('addSetting', $user_permission) || in_array('editSetting', $user_permission) || in_array('viewSetting', $user_permission) || in_array('deleteSetting', $user_permission)): ?>
					<li class="sidebar-item <?php if($page_name == 'Settings'): echo 'active'; endif; ?>">
						<a class="sidebar-link" href="<?= base_url() ?>/settings">
				          <i class="align-middle" data-feather="slack"></i> <span class="align-middle">Settings</span>
				        </a>
					</li>
				<?php endif ?>
			<?php endif ?>
		</ul>

		<div class="sidebar-cta">
			<?php if(date('H:i') >= '14:00' && date('H:i') <= '15:00'): ?>
				<?php if(!empty($totalAmountToday)): ?> 
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Close Account</strong>

						<div class="d-grid">
							<a href="<?= base_url() ?>/close_account" class="btn btn-primary">Close Now</a>
						</div>
					</div>			
				<?php else: ?>
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">Today's Sales Report</strong>
						<div class="mb-3 text-sm">
							Your sales report is ready for download!
						</div>

						<div class="d-grid">
							<a href="<?= base_url() ?>/download_sales_report" class="btn btn-primary">Download</a>
						</div>
					</div>
				<?php endif ?>
			<?php endif ?>
		</div>
	</div>
</nav>