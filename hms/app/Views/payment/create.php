<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<div class="row">
				<?= form_open('/addpayment') ?>
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Guest Type</h5>
							<hr class="my-4">
							<div class="row row-cols-md-auto align-items-center">
								<div class="col-12">
									<div class="form-radio mb-1 mr-sm-2">
										<label class="form-check">
							              <input name="guest_type" type="radio" value="new_guest" class="form-check-input" <?php if(set_value('guest_type') == 'new_guest') { echo 'checked'; } ?>>
							              <span class="form-check-label">New Guest</span>
							            </label>
							        </div>
							    </div>
							    <div class="col-12">
									<div class="form-radio mb-1 mr-sm-2">
										<label class="form-check">
							              <input name="guest_type" type="radio" value="existing_guest" class="form-check-input" <?php if(set_value('guest_type') == 'existing_guest') { echo 'checked'; } ?>>
							              <span class="form-check-label">Existing Guest</span>
							            </label>
							        </div>
							    </div>
							    <span class="text-danger"><?= display_error($validation, 'guest_type') ?></span>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="card">											
						<div class="card-body">
							<h5 class="card-title">Guest Information</h5>
							<hr class="my-4">
							<div id="new_guest">
								<div class="row">
									<div class="mb-3 col-md-3">
										<label class="form-label" for="inputState">Title<span class="font-13 text-danger">*</span></label>
										<select id="inputCountry" class="form-control" name="client_title">
						                     <option value="">--Select--</option>
						                     <option value="Mr" <?php if(set_value('client_title') == 'Mr') { echo "selected"; } ?>>Mr</option>
						                     <option value="Ms" <?php if(set_value('client_title') == 'Ms') { echo "selected"; } ?>>Ms</option>
						                     <option value="Mrs" <?php if(set_value('client_title') == 'Mrs') { echo "selected"; } ?>>Mrs</option>
						                     <option value="Dr" <?php if(set_value('client_title') == 'Dr') { echo "selected"; } ?>>Dr</option>
						                     <option value="Prof" <?php if(set_value('client_title') == 'Prof') { echo "selected"; } ?>>Prof</option>
						                     <option value="Chief" <?php if(set_value('client_title') == 'Chief') { echo "selected"; } ?>>Chief</option>
						                </select>
						                <span class="text-danger"><?= display_error($validation, 'client_title') ?></span>
									</div>
									<div class="mb-3 col-md-3">
										<label class="form-label" for="inputEmail4">First Name<span class="font-13 text-danger">*</span></label>
										<input type="text" class="form-control" id="inputEmail4" name="first_name" value="<?= set_value('first_name') ?>">
										<span class="text-danger"><?= display_error($validation, 'first_name') ?></span>
									</div>										
									<div class="mb-3 col-md-3">
										<label class="form-label" for="inputEmail4">Middle Name</label>
										<input type="text" class="form-control" id="inputEmail4" name="middle_name" value="<?= set_value('middle_name') ?>">
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
										<label class="form-label" for="inputEmail4">Email<span class="font-13 text-danger">*</span></label>
										<input type="email" class="form-control" name="guest_email" id="inputEmail4" value="<?= set_value('guest_email') ?>">
										<span class="text-danger"><?= display_error($validation, 'guest_email') ?></span>
									</div>
									<div class="mb-3 col-md-4">
										<label class="form-label" for="inputPassword4">Mobile<span class="font-13 text-danger">*</span></label>
										<input type="text" class="form-control" name="guest_mobile" id="inputPassword4" data-mask="00000000000" data-reverse="true"  value="<?= set_value('guest_mobile') ?>">
										<span class="text-danger"><?= display_error($validation, 'guest_mobile') ?></span>
									</div>									
									<div class="mb-3 col-md-4">
										<label class="form-label" for="inputPassword4">Occupation<span class="font-13 text-danger">*</span></label>
										<input type="text" class="form-control" id="inputPassword4" name="guest_occupation" value="<?= set_value('guest_occupation') ?>">
										<span class="text-danger"><?= display_error($validation, 'guest_occupation') ?></span>
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
							<div id="existing_guest">
								<div class="row">
									<div class="mb-3 col-md-4">
										<label class="form-label" for="inputEmail4">Guest Name<span class="font-13 text-danger">*</span></label>
										<select class="form-control select2 guest_id" data-toggle="select2" name="guest_id">
											<option value="">--Search--</option>
											<?php if(!empty($clients)): ?>
												<?php foreach($clients as $row): ?>
									            	<option value="<?= $row['client_id'] ?>"><?= $row['first_name'] ?> <?= $row['last_name'] ?></option>
									        	<?php endforeach ?>
									        <?php endif ?>
								        </select>
									</div>
									<div class="mb-3 col-md-4">
										<label class="form-label" for="inputEmail4">Email<span class="font-13 text-danger">*</span></label>
										<input type="email" class="form-control guest_email_fetch" id="inputEmail4" readonly >
									</div>
									<div class="mb-3 col-md-4">
										<label class="form-label" for="inputPassword4">Mobile<span class="font-13 text-danger">*</span></label>
										<input type="text" class="form-control guest_mobile_fetch" id="inputPassword4" readonly >
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="card">											
						<div class="card-body">
							<h5 class="card-title">Payment Information</h5>
							<hr class="my-4">
							<div class="row">
								<div class="col-12 mb-3 col-xl-4">
									<div class="mb-3 mb-xl-0">
										<label class="form-label">Amount</label>
										<input class="form-control" type="text" id="amount" name="amount" data-mask="00000000000" data-reverse="true"  value="<?= set_value('amount') ?>"/>
										<span class="text-danger"><?= display_error($validation, 'amount') ?></span>
									</div>
								</div>
								<div class="col-12 mb-3 col-xl-8">
									<div class="mb-3 mb-xl-0">
										<label class="form-label">Being payment for:</label>
										<textarea class="form-control" id="discount" name="being"> </textarea>
										<span class="text-danger"><?= display_error($validation, 'being') ?></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 mb-3 col-xl-4">
									<div class="mb-3 mb-xl-0">
										<label class="form-label">Payment Method</label>
										<select class="form-control select2" data-toggle="select2" id="" name="payment_option" required >
											<option value="">--Select--</option>
											<option value="Cash">Cash</option>
											<option value="Bank Transfer">Bank Transfer</option>
											<option value="Card Swipe">Card Swipe</option>
										</select>
										<span class="text-danger"><?= display_error($validation, 'payment_option') ?></span>
									</div>
								</div>
							</div>
							<hr class="my-4">
							<div class="row">
								<div class="col-12 col-xl-12">
									<div class="mb-3 col-md-2 mb-xl-0 float-end">
										<input type="submit" name="save" class="btn btn-success col-12" value="Create">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?= form_close() ?>
			</div>
		</div>
	</main>
	<script type="text/javascript">
		jquery_3_2_1(document).ready(function () {
			$(document).on('change', '.check_in_room_type', function(){	
				getTotal();
				subAmount();			
				var room_type_id = $(this).val();
				$.ajax({
					method: 'POST',
					url: 'ajax.room/fetchRoomOfID',
					data: {'room_type_id':room_type_id},
					success: function (response) {
						if (response.room_data.length > 0) {
							var html = '';  
							$.each(response.room_data, function (key, roomvalue) {
								html += '<option value="'+roomvalue.room_id+'">Room '+roomvalue.room_no+'</option>'; 							
							});
							$(".check_in_room_no").html(html);
						} else {
							var html = '';
							html += '<option value="">All rooms occupied</option>';
							$(".check_in_room_no").html(html);
						}						
					}
				});
			});

			$(document).on('change', '.guest_id', function(){
				var guest_id = $(this).val();
				$.ajax({
					method: 'POST',
					url: 'ajax.client/fetchClientData',
					data: {'guest_id':guest_id},
					success: function (response) {
						$.each(response, function (key, guestvalue) {
							$('.guest_email_fetch').val(guestvalue['client_email']);
							$('.guest_mobile_fetch').val(guestvalue['mobile']);
						});					
					}
				});
			});
		});
	</script>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>