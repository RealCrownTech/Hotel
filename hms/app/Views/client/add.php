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
							<?= form_open('/addClient') ?>
								<div>
									<div class="row">
										<div class="mb-3 col-md-3">
											<label class="form-label" for="inputState">Title<span class="font-13 text-danger">*</span></label>
											<select id="inputCountry" class="form-control" name="client_title">
							                     <option value="">--Select--</option>
							                     <option value="Mr">Mr</option>
							                     <option value="Ms">Ms</option>
							                     <option value="Mrs">Mrs</option>
							                     <option value="Dr">Dr</option>
							                     <option value="Prof">Prof</option>
							                     <option value="Chief">Chief</option>
							                </select>
							                <span class="text-danger"><?= display_error($validation, 'client_title') ?></span>
										</div>
										<div class="mb-3 col-md-3">
											<label class="form-label" for="">First Name<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="" name="first_name" value="<?= set_value('first_name') ?>">
											<span class="text-danger"><?= display_error($validation, 'first_name') ?></span>
										</div>										
										<div class="mb-3 col-md-3">
											<label class="form-label" for="">Middle Name</label>
											<input type="text" class="form-control" id="" name="middle_name" value="<?= set_value('middle_name') ?>">
											<span class="text-danger"><?= display_error($validation, 'middle_name') ?></span>
										</div>									
										<div class="mb-3 col-md-3">
											<label class="form-label" for="inputPassword4">Last Name<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputPassword4" name="last_name" value="<?= set_value('last_name') ?>">
											<span class="text-danger"><?= display_error($validation, 'last_name') ?></span>
										</div>
									</div>
									<div class="row">																			
										<div class="mb-3 col-md-4">
											<label class="form-label" for="">Email</label>
											<input type="text" class="form-control" id="" name="client_email" value="<?= set_value('client_email') ?>">
											<span class="text-danger"><?= display_error($validation, 'client_email') ?></span>
										</div>									
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputPassword4">Mobile<span class="font-13 text-danger">*</span></label>
											<input type="text" class="form-control" id="inputPassword4" data-mask="00000000000" data-reverse="true"  placeholder="08000000000" name="mobile" value="<?= set_value('mobile') ?>">
											<span class="text-danger"><?= display_error($validation, 'mobile') ?></span>
										</div>
										<div class="mb-3 col-md-4">
											<label class="form-label" for="inputPassword4">Occupation</label>
											<input type="text" class="form-control" id="inputPassword4" name="occupation" value="<?= set_value('occupation') ?>">
											<span class="text-danger"><?= display_error($validation, 'occupation') ?></span>
										</div>
									</div>
									<div class="row">
										<div class="mb-3 col-md-12">
											<label class="form-label" for="inputAddress2">Address<span class="font-13 text-danger">*</span></label>
											<textarea class="form-control" id="inputAddress2" name="address"><?= set_value('address') ?></textarea>
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
											<label class="form-label" for="">Full Name</label>
											<input type="text" class="form-control" id="" name="kin_name" value="<?= set_value('kin_name') ?>">
											<span class="text-danger"><?= display_error($validation, 'kin_name') ?></span>
										</div>
										<div class="mb-3 col-md-6">
											<label class="form-label" for="inputPassword4">Mobile</label>
											<input type="text" class="form-control" id="inputPassword4" data-mask="00000000000" data-reverse="true"  name="kin_mobile" value="<?= set_value('kin_mobile') ?>">
											<span class="text-danger"><?= display_error($validation, 'kin_mobile') ?></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 col-xl-12">
										<div class="mb-3 mb-xl-0 float-end">
											<input type="submit" class="btn btn-success" value="Add Client" name="save">
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