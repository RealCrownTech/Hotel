<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<div class="row">

				<div class="col-md-12">
					<div class="card">											
						<div class="card-body">					
							<h5 class="card-title"><?= $page_name ?></h5>

							<!-- Start Add User Role Modal-->
							<?= $this->include('modals/add_user_role'); ?>
							<!-- End Add User Role Modal -->

							<hr class="my-4">
							<div>
								<?= form_open('/addUser') ?>
									<div class="row">							
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputState">User Role<span class="font-13 text-danger">*</span></label>
											<select id="inputCountry" class="form-control" name="user_role">
							                    <option value="">--Select--</option>
							                    <?php foreach($roles_data as $roles): ?>
								                    <option value="<?= $roles['role_id'] ?>"><?= $roles['role_name'] ?></option>
								                <?php endforeach ?>
							                </select>
							                <span class="text-danger"><?= display_error($validation, 'user_role') ?></span>
										</div>
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputEmail4">First Name<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputEmail4" name="first_name" value="<?= set_value('first_name') ?>" placeholder="Enter your first name">
											<span class="text-danger"><?= display_error($validation, 'first_name') ?></span>
										</div>
										<!-- <div class="mb-3 col-md-4">
											<label class="form-label" for="inputEmail4">Middle Name</label>
											<input type="text" class="form-control" id="inputEmail4" name="middle_name" placeholder="Enter your middle name" value="<?= set_value('middle_name') ?>">
											<span class="text-danger"><?= display_error($validation, 'middle_name') ?></span>
										</div> -->
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputEmail4">Last Name<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputEmail4" name="last_name" placeholder="Enter your last name" value="<?= set_value('last_name') ?>">
											<span class="text-danger"><?= display_error($validation, 'last_name') ?></span>
										</div>
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputEmail4">Username<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputEmail4" name="user_email" placeholder="Enter Username" value="<?= set_value('user_email') ?>">
											<span class="text-danger"><?= display_error($validation, 'user_email') ?></span>
										</div>
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputEmail4">Password<span class="font-13 text-danger">*</span></label>
											<input type="password" class="form-control" id="inputEmail4" name="user_password" placeholder="Enter Password">
											<span class="text-danger"><?= display_error($validation, 'user_password') ?></span>
										</div>
									<!-- </div>
									<div class="row"> -->									
										<!-- <div class="mb-3 col-md-4">
											<label class="form-label" for="inputPassword4">Mobile</label>
											<input type="text" class="form-control" id="inputPassword4" name="user_mobile" data-mask="08000000000" data-reverse="true"  placeholder="08000000000" value="<?= set_value('user_mobile') ?>">
											<span class="text-danger"><?= display_error($validation, 'user_mobile') ?></span>
										</div>
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputState">Gender</label>
											<select id="inputCountry" class="form-control" name="gender">
							                     <option value="">--Select--</option>
							                     <option value="male">Male</option>
							                     <option value="female">Female</option>
							                </select>
							                <span class="text-danger"><?= display_error($validation, 'gender') ?></span>
										</div> -->
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputState">Status<span class="font-13 text-danger">*</span></label>
											<select id="inputState" class="form-control" name="user_status">
							                     <option value="">--Select--</option>
							                     <option value="1">Active</option>
							                     <option value="2">Probation</option>
							                     <option value="3">Leave</option>
							                     <option value="0">Inactive</option>
							                </select>
							                <span class="text-danger"><?= display_error($validation, 'user_status') ?></span>
										</div>
										<!-- <div class="mb-3 col-md-4">
											<label class="form-label" for="inputState">State of Origin</label>
											<select id="inputState" class="form-control" name="user_state">
							                     <option value="">--Select--</option>
							                     <option value="Ogun">Ogun</option>
							                     <option value="Oyo">Oyo</option>
							                     <option value="Lagos">Lagos</option>
							                     <option value="Osun">Osun</option>
							                </select>
							                <span class="text-danger"><?= display_error($validation, 'user_state') ?></span>
										</div> -->
									<!-- </div>
									<div class="mb-3"> -->
										<!-- <label class="form-label" for="inputAddress2">Address</label>
										<textarea class="form-control" name="address" id="inputAddress2" placeholder="Apartment, studio, or floor"><?= set_value('address') ?></textarea>
										<span class="text-danger"><?= display_error($validation, 'address') ?></span> -->
									</div>
									<hr class="my-4">
									<div class="row">
										<div class="col-12 col-xl-12">
											<div class="mb-3 mb-xl-0 float-end">
												<input type="submit" name="save" class="btn btn-success" value="Submit">
											</div>
										</div>
									</div>
								<?= form_close() ?>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>