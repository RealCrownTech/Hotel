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

							<hr class="my-4">
							<div>
								<?= form_open('/editUser/'.$user_info['user_id']) ?>
									<div class="row">							
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputState">User Role<span class="font-13 text-danger">*</span></label>
											<select id="inputCountry" class="form-control" name="user_role">
							                     <option value="">--Select--</option>
							                     <?php foreach($roles_data as $roles): ?>
								                    <option value="<?= $roles['role_id'] ?>" <?php if($user_info['user_role'] == $roles['role_id']) { echo 'selected'; } ?>><?= $roles['role_name'] ?></option>
								                <?php endforeach ?>
							                </select>
							                <span class="text-danger"><?= display_error($validation, 'user_role') ?></span>
										</div>
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputEmail4">First Name<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputEmail4" name="first_name" value="<?= $user_info['first_name'] ?>" placeholder="Enter your first name">
											<span class="text-danger"><?= display_error($validation, 'first_name') ?></span>
										</div>
										<!-- <div class="mb-3 col-md-4">
											<label class="form-label" for="inputEmail4">Middle Name<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputEmail4" name="middle_name" placeholder="Enter your middle name" value="<?= $user_info['middle_name'] ?>">
											<span class="text-danger"><?= display_error($validation, 'middle_name') ?></span>
										</div> -->
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputEmail4">Last Name<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputEmail4" name="last_name" placeholder="Enter your last name" value="<?= $user_info['last_name'] ?>">
											<span class="text-danger"><?= display_error($validation, 'last_name') ?></span>
										</div>
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputEmail4">Username<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputEmail4" name="user_email" placeholder="Enter username" value="<?= $user_info['email'] ?>">
											<span class="text-danger"><?= display_error($validation, 'user_email') ?></span>
										</div>
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputEmail4">Password<span class="font-13 text-danger"> (Leave blank to retain present password)</span></label>
											<input type="password" class="form-control" id="inputEmail4" name="user_password" placeholder="Enter password">
											<span class="text-danger"><?= display_error($validation, 'user_password') ?></span>
										</div>
									<!-- </div>
									<div class="row"> -->									
										<!-- <div class="mb-3 col-md-4">
											<label class="form-label" for="inputPassword4">Mobile<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputPassword4" name="user_mobile" data-mask="08000000000" data-reverse="true"  placeholder="08000000000" value="<?= $user_info['mobile'] ?>">
											<span class="text-danger"><?= display_error($validation, 'user_mobile') ?></span>
										</div>
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputState">Gender<span class="font-13 text-danger">*</span></label>
											<select id="inputCountry" class="form-control" name="gender">
							                     <option value="">--Select--</option>
							                     <option value="male" <?php if($user_info['gender'] == 'male') { echo 'selected'; } ?>>Male</option>
							                     <option value="female" <?php if($user_info['gender'] == 'female') { echo 'selected'; } ?>>Female</option>
							                </select>
							                <span class="text-danger"><?= display_error($validation, 'gender') ?></span>
										</div> -->
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputState">Status<span class="font-13 text-danger">*</span></label>
											<select id="inputState" class="form-control" name="user_status">
							                     <option value="">--Select--</option>
							                     <option value="1"  <?php if($user_info['user_status'] == 1) { echo 'selected'; } ?>>Active</option>
							                     <option value="2" <?php if($user_info['user_status'] == 2) { echo 'selected'; } ?>>Probation</option>
							                     <option value="3" <?php if($user_info['user_status'] == 3) { echo 'selected'; } ?>>Leave</option>
							                     <option value="0" <?php if($user_info['user_status'] == 0) { echo 'selected'; } ?>>Inactive</option>
							                </select>
							                <span class="text-danger"><?= display_error($validation, 'user_status') ?></span>
										</div>
										<!-- <div class="mb-3 col-md-4">
											<label class="form-label" for="inputState">State of Origin<span class="font-13 text-danger">*</span></label>
											<select id="inputState" class="form-control" name="user_state">
							                     <option value="">--Select--</option>
							                     <option value="Ogun"<?php if($user_info['state'] == 'Ogun') { echo 'selected'; } ?>>Ogun</option>
							                     <option value="Oyo"<?php if($user_info['state'] == 'Oyo') { echo 'selected'; } ?>>Oyo</option>
							                     <option value="Lagos"<?php if($user_info['state'] == 'Lagos') { echo 'selected'; } ?>>Lagos</option>
							                     <option value="Osun"<?php if($user_info['state'] == 'Osun') { echo 'selected'; } ?>>Osun</option>
							                </select>
							                <span class="text-danger"><?= display_error($validation, 'user_state') ?></span>
										</div> -->
									<!-- </div> -->
										<!-- <div class="mb-3 col-md-8">
											<label class="form-label" for="inputAddress2">Address<span class="font-13 text-danger">*</span></label>
											<textarea class="form-control" name="address" id="inputAddress2" placeholder="Apartment, studio, or floor"><?= $user_info['address'] ?></textarea>
											<span class="text-danger"><?= display_error($validation, 'address') ?></span>
										</div> -->
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