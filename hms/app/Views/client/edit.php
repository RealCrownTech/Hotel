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
							<?= form_open('/editClient/'.$clientele['client_id']) ?>
								<div>
									<div class="row">
										<div class="mb-3 col-md-3">
											<label class="form-label" for="inputState">Title<span class="font-13 text-danger">*</span></label>
											<select id="inputCountry" class="form-control" name="client_title">
							                     <option value="">--Select--</option>
							                     <option value="Mr" <?php if($clientele['client_title'] == 'Mr'){ echo 'selected'; } ?>>Mr</option>
							                     <option value="Ms" <?php if($clientele['client_title'] == 'Ms'){ echo 'selected'; } ?>>Ms</option>
							                     <option value="Mrs" <?php if($clientele['client_title'] == 'Mrs'){ echo 'selected'; } ?>>Mrs</option>
							                     <option value="Dr" <?php if($clientele['client_title'] == 'Dr'){ echo 'selected'; } ?>>Dr</option>
							                     <option value="Prof" <?php if($clientele['client_title'] == 'Prof'){ echo 'selected'; } ?>>Prof</option>
							                     <option value="Chief" <?php if($clientele['client_title'] == 'Chief'){ echo 'selected'; } ?>>Chief</option>
							                </select>
							                <span class="text-danger"><?= display_error($validation, 'client_title') ?></span>
										</div>
										<div class="mb-3 col-md-3">
											<label class="form-label" for="inputEmail4">First Name<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputEmail4" name="first_name" value="<?= $clientele['first_name'] ?>">
											<span class="text-danger"><?= display_error($validation, 'first_name') ?></span>
										</div>										
										<div class="mb-3 col-md-3">
											<label class="form-label" for="inputEmail4">Middle Name</label>
											<input type="text" class="form-control" id="inputEmail4" name="middle_name" value="<?= $clientele['middle_name'] ?>">
											<span class="text-danger"><?= display_error($validation, 'middle_name') ?></span>
										</div>									
										<div class="mb-3 col-md-3">
											<label class="form-label" for="inputPassword4">Last Name<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputPassword4" name="last_name" value="<?= $clientele['last_name'] ?>">
											<span class="text-danger"><?= display_error($validation, 'last_name') ?></span>
										</div>
									</div>
									<div class="row">																			
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputEmail4">Email</label>
											<input type="text" class="form-control" id="inputEmail4" name="client_email" value="<?= $clientele['client_email'] ?>">
											<span class="text-danger"><?= display_error($validation, 'client_email') ?></span>
										</div>									
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputPassword4">Mobile<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputPassword4" data-mask="00000000000" data-reverse="true"  placeholder="08000000000" name="mobile" value="<?= $clientele['mobile'] ?>">
											<span class="text-danger"><?= display_error($validation, 'mobile') ?></span>
										</div>
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputPassword4">Occupation</label>
											<input type="text" class="form-control" id="inputPassword4" name="occupation" value="<?= $clientele['occupation'] ?>">
											<span class="text-danger"><?= display_error($validation, 'occupation') ?></span>
										</div>
									</div>
									<div class="row">
										<div class="mb-3 col-md-12">
											<label class="form-label" for="inputAddress2">Address<span class="font-13 text-danger">*</span></label>
											<textarea class="form-control" id="inputAddress2" name="address"><?= $clientele['address'] ?></textarea>
											<span class="text-danger"><?= display_error($validation, 'address') ?></span>
										</div>
									</div>
								</div>
								<hr class="my-4">
								<h5 class="card-title text-center">Next Of Kin Details</h5>
								<hr class="my-4">
								<div>
									<div class="row">
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputEmail4">Full Name</label>
											<input type="text" class="form-control" id="inputEmail4" name="kin_name" value="<?= $clientele['kin_name'] ?>">
											<span class="text-danger"><?= display_error($validation, 'kin_name') ?></span>
										</div>																		
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputPassword4">Mobile</label>
											<input type="text" class="form-control" id="inputPassword4" data-mask="00000000000" data-reverse="true"  name="kin_mobile" value="<?= $clientele['kin_mobile'] ?>">
											<span class="text-danger"><?= display_error($validation, 'kin_mobile') ?></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-xl-12">
										<div class="mb-3 mb-xl-0 float-end">
											<input type="submit" class="btn btn-success" value="Edit Client" name="save">
										</div>
									</div>
								</div>
							<?= form_close() ?>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>