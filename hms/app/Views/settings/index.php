<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3"><?= $page_name ?></h1>

			<div class="row">
						<div class="col-md-3 col-xl-2">

							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">System Settings</h5>
								</div>

								<div class="list-group list-group-flush" role="tablist">
									<a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#company" role="tab">Company</a>
									<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#user_role" role="tab">User Roles</a>
								</div>
							</div>
						</div>

						<div class="col-md-9 col-xl-10">
							<div class="tab-content">
								<div class="tab-pane fade show active" id="company" role="tabpanel">

									<div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Company Info</h5>
										</div>
										<div class="card-body">
											<?= form_open('/company_settings') ?>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label for="" class="form-label">Site Page Title</label>
														<input type="text" class="form-control" name="site_title" value="<?= $company_data['site_title'] ?>">
														<span class="text-danger"><?= display_error($validation, 'site_title') ?></span>
													</div>
													<div class="mb-3 col-md-6">
														<label for="" class="form-label">Hotel Name</label>
														<input type="text" class="form-control" name="hotel_name" value="<?= $company_data['hotel_name'] ?>">
														<span class="text-danger"><?= display_error($validation, 'hotel_name') ?></span>
													</div>
												</div>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label for="" class="form-label">Hotel Tagline</label>
														<input type="text" class="form-control" name="tagline" value="<?= $company_data['tagline'] ?>">
														<span class="text-danger"><?= display_error($validation, 'tagline') ?></span>
													</div>
													<div class="mb-3 col-md-6">
														<label for="" class="form-label">Hotel Email</label>
														<input type="email" class="form-control" name="company_email" value="<?= $company_data['company_email'] ?>">
														<span class="text-danger"><?= display_error($validation, 'company_email') ?></span>
													</div>
												</div>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label for="" class="form-label">Hotel Phone</label>
														<input type="text" class="form-control" name="company_phone" value="<?= $company_data['company_phone'] ?>">
														<span class="text-danger"><?= display_error($validation, 'company_phone') ?></span>
													</div>
													<div class="mb-3 col-md-6">
														<label for="" class="form-label">Hotel Mobile</label>
														<input type="text" class="form-control" name="company_mobile" value="<?= $company_data['company_mobile'] ?>">
														<span class="text-danger"><?= display_error($validation, 'company_mobile') ?></span>
													</div>
												</div>
												<div class="row">
													<div class="mb-3 col-md-6">
														<label for="" class="form-label">Hotel Website</label>
														<input type="text" class="form-control" name="company_website" value="<?= $company_data['company_website'] ?>">
														<span class="text-danger"><?= display_error($validation, 'company_website') ?></span>
													</div>
													<div class="mb-3 col-md-6">
														<label for="" class="form-label">Hotel Address</label>
														<input type="text" class="form-control" name="company_address" value="<?= $company_data['company_address'] ?>">
														<span class="text-danger"><?= display_error($validation, 'company_address') ?></span>
													</div>
												</div>
												<input type="submit" class="btn btn-primary float-end" name="save" value="Save Changes">
											<?= form_close() ?>
										</div>
									</div>

									<div class="card">
										<div class="card-header">
											<h5 class="card-title mb-0">Bank Details</h5>
										</div>
										<div class="card-body">
											<?= form_open('/bank_settings') ?>
												<div class="row">
													<div class="col-md-8">
														<div class="mb-3">
															<label for="" class="form-label">Bank Name</label>
															<input type="text" class="form-control" name="bank_name" value="<?= $company_data['bank_name'] ?>">
															<span class="text-danger"><?= display_error($validation, 'bank_name') ?></span>
														</div>
														<div class="mb-3">
															<label for="" class="form-label">Account Name</label>
															<input type="text" class="form-control" name="account_name" value="<?= $company_data['account_name'] ?>">
															<span class="text-danger"><?= display_error($validation, 'account_name') ?></span>
														</div>
														<div class="mb-3">
															<label for="" class="form-label">Account Number</label>
															<input type="text" class="form-control" name="account_number" value="<?= $company_data['account_number'] ?>">
															<span class="text-danger"><?= display_error($validation, 'account_number') ?></span>
														</div>
														<div class="mb-3">
															<input type="checkbox" name="show_on_invoice" value="1" <?php if($company_data['show_on_invoice'] == 1){ echo 'checked'; } ?>>
															<label for="" class="form-label">Show On Invoice</label>
														</div>
													</div>
												</div>
												<input type="submit" class="btn btn-primary float-end" name="save" value="Save Changes">
											<?= form_close() ?>
										</div>
									</div>

								</div>
								<div class="tab-pane fade" id="user_role" role="tabpanel">
									<div class="card">
										<div class="card-body">
											<h5 class="card-title">User Roles</h5>
											<hr class="mb-4">

											<div class="row">
												<div class="col-6">
													<div class="card flex-fill">
														<table id="datatables-dashboard-stock" class="table table-striped my-0">
															<thead>
																<tr>
																	<th>S/N</th>
																	<th class="d-none d-xl-table-cell">Roles</th>
																</tr>
															</thead>
															<tbody>
																<?php $i = 1; foreach($roles_data as $roles): ?>
																	<tr>
																		<td><?= $i ?></td>
																		<td class="d-none d-xl-table-cell"><?= $roles['role_name'] ?></td>								
																	</tr>
																<?php $i++; endforeach ?>
															</tbody>
														</table>
													</div>
												</div>

												<div class="col-6">
													<?= form_open('/add_role') ?>
														<div class="mb-3">
															<label for="inputPasswordCurrent" class="form-label">New Role Name</label>
															<input type="text" class="form-control" name="role">
														</div>
														<input type="submit" class="btn btn-primary float-end" name="save" value="Add New">
													<?= form_close() ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

		</div>
	</main>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>