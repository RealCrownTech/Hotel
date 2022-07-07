<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<div class="row">
				<?= form_open('/doeditLodge/'.$lodge_data['lodge_no']) ?>
				<div class="col-md-12">
					<div class="card">
						<div class="card-body">
							<h5 class="card-title">Guest Type</h5>
							<hr class="my-4">
							<div class="row row-cols-md-auto align-items-center">
								<!-- <div class="col-12">
									<div class="form-radio mb-1 mr-sm-2">
										<label class="form-check">
							              <input name="guest_type" type="radio" value="new_guest" class="form-check-input" <?php if(set_value('guest_type') == 'new_guest') { echo 'checked'; } ?> <?php if($lodge_data['client_id'] == 0){ echo 'checked'; } ?>>
							              <span class="form-check-label">New Guest</span>
							            </label>
							        </div>
							    </div> -->
							    <div class="col-12">
									<div class="form-radio mb-1 mr-sm-2">
										<label class="form-check">
							              <input name="guest_type" type="radio" value="existing_guest" class="form-check-input" <?php if(set_value('guest_type') == 'existing_guest') { echo 'checked'; } ?>  <?php if($lodge_data['client_id'] != 0){ echo 'checked'; } ?>>
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
							<div>
								<div class="row">
									<div class="mb-3 col-md-4">
										<label class="form-label" for="inputEmail4">Guest Name<span class="font-13 text-danger">*</span></label>
										<select class="form-control select2 guest_id" data-toggle="select2" name="guest_id">
											<option value="">--Search--</option>
											<?php if(!empty($clients)): ?>
												<?php foreach($clients as $row): ?>
									            	<option value="<?= $row['client_id'] ?>"  <?php if($lodge_data['client_id'] == $row['client_id']){ echo 'selected'; } ?>><?= $row['first_name'] ?> <?= $row['last_name'] ?></option>
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
							<h5 class="card-title">Check-In Information</h5>
							<hr class="my-4">
							<div>
								<div class="row">
									<div class="mb-3 col-md-3">
										<label class="form-label" for="inputState">Room Type<span class="font-13 text-danger">*</span></label>
										<select id="inputState" class="form-control check_in_room_type" name="room_type">
						                     <option value="">--Choose--</option>
						                     <?php if(!empty($room_types)): ?>
						                     <?php $i = 1; foreach ($room_types as $row): ?>
							                    <option value="<?= $row['room_type_id']; ?>" <?php if(set_value('room_type') == $row['room_type_id']) { echo "selected"; } ?> <?php if($lodge_data['room_type_id'] == $row['room_type_id']){ echo 'selected'; } ?>><?= $row['title']; ?> - ₦<span class="fetchPrice"><?= $row['price']; ?></span></option>
						                     <?php $i++; endforeach; ?>
						                     <?php endif ?>
						                </select>
						                <span class="text-danger"><?= display_error($validation, 'room_type') ?></span>
									</div>
									<div class="mb-3 col-md-3">
										<label class="form-label" for="inputEmail4">Room No.<span class="font-13 text-danger">*</span></label>
										<select id="inputState" class="form-control check_in_room_no" name="room_no">
											<!-- <option value="">Please Select a Room Type</option> -->
											<option value="<?= $lodge_data['room_id']; ?>" selected>
												<?php foreach ($room as $row): ?>
													<?php if($row['room_id'] == $lodge_data['room_id']): ?>
														<?= 'Room '.$row['room_no']; ?>
													<?php endif ?>
												<?php endforeach ?>
											</option>
						                </select>
						                <span class="text-danger"><?= display_error($validation, 'room_no') ?></span>
									</div>
									<div class="col-12 col-xl-3">
										<div class="mb-3 mb-xl-0">
											<label class="form-label">Check-In Date<span class="font-13 text-danger">*</span></label>
											<input class="form-control" type="text" id="check_in_date" name="check_in_datee" value="<?= date('m/d/Y h:i a', strtotime($lodge_data['check_in_date']))  ?>" readonly />
											<span class="text-danger"><?= display_error($validation, 'check_in_datee') ?></span>
										</div>
									</div>
									<div class="col-12 col-xl-3">
										<div class="mb-3 mb-xl-0">
											<label class="form-label">Check-Out Date<span class="font-13 text-danger">*</span></label>
											<input class="form-control" type="text" id="check_out_date" name="check_out_date" value="<?= $lodge_data['check_out_date']  ?>" />
											<span class="text-danger"><?= display_error($validation, 'check_out_date') ?></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="mb-3 col-md-2">
										<label class="form-label" for="inputState">No. Of Adults</label>
										<input type="number" class="form-control" id="inputAdult" name="adults" value="<?= $lodge_data['adult_no']  ?>">
										<span class="text-danger"><?= display_error($validation, 'adults') ?></span>
									</div>
									<div class="mb-3 col-md-2">
										<label class="form-label" for="inputState">No. Of Kids</label>
										<input type="number" class="form-control" id="inputKids" name="kids" value="<?= $lodge_data['kid_no']  ?>">
										<span class="text-danger"><?= display_error($validation, 'kids') ?></span>
									</div>
									<div class="mb-3 col-md-4">
										<label class="form-label" for="inputCity">Vehicle No</label>
										<input type="text" class="form-control" id="inputCity" name="vehicle_no" value="<?= $lodge_data['vehicle_no']  ?>">
									</div>
									<div class="mb-3 col-md-4">
										<label class="form-label" for="inputCity">Reason of Visit/Stay</label>
										<input type="text" class="form-control" id="inputCity" name="reason" value="<?= $lodge_data['reason']  ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- <div class="col-md-12">
					<div class="card">											
						<div class="card-body">
							<h5 class="card-title">Means Of Identification</h5>
							<hr class="my-4">
							<div>
								<div class="row">
									<div class="col-12 col-xl-4">
										<div class="mb-3 mb-xl-0">
											<label class="form-label">Type of ID<span class="font-13 text-danger">*</span></label>
											<select id="inputState" class="form-control">
						                        <option>--Choose--</option>
						                        <option>National ID Card</option>
						                        <option>Passport</option>
							                </select>
										</div>
									</div>
									<div class="col-12 col-xl-4">
										<div class="mb-3 mb-xl-0">
											<label class="form-label">ID Number<span class="font-13 text-danger">*</span></label>
											<input class="form-control" type="text" data-mask="00000000000" data-reverse="true" name="id_number" placeholder="Enter you ID Number" />
										</div>
									</div>
									<div class="mb-3 col-md-4">
										<label class="form-label" for="inputState">Upload ID Card</label>
										<input class="form-control" type="file" name="idcard[]" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->

				<div class="col-md-12">
					<div class="card">											
						<div class="card-body">
							<h5 class="card-title">Payment Information</h5>
							<hr class="my-4">
							<div class="row">
								<div class="col-12 col-xl-3">
									<div class="mb-3 mb-xl-0">
										<label class="form-label">Gross Amount</label>
										<input class="form-control" type="text" id="gross_amount" name="gross_amount" value="<?= $lodge_data['gross_amount']  ?>" readonly />
									</div>
								</div>
								<div class="col-12 col-xl-3">
									<div class="mb-3 mb-xl-0">
										<label class="form-label">Discount</label>
										<input class="form-control" type="text" id="discount" onkeyup="subAmount()" name="discount" value="<?= $lodge_data['discount']  ?>" />
									</div>
								</div>
								<div class="col-12 col-xl-3">
									<div class="mb-3 mb-xl-0">
										<label class="form-label">Total Amount</label>
										<input class="form-control" type="text" id="total_amount" name="total_amount" value="<?= $lodge_data['total_amount']  ?>" readonly />
									</div>
								</div>
								<div class="col-12 col-xl-3">
									<div class="mb-3 mb-xl-0">
										<label class="form-label">Payment Method</label>
										<select class="form-control select2" data-toggle="select2" id="" name="payment_option">
											<option value="">--Select--</option>
											<option value="Cash" <?php if($lodge_data['payment_option'] == 'Cash'){ echo 'selected'; } ?>>Cash</option>
											<option value="Bank Transfer" <?php if($lodge_data['payment_option'] == 'Bank Transfer'){ echo 'selected'; } ?>>Bank Transfer</option>
											<option value="Card Swipe" <?php if($lodge_data['payment_option'] == 'Card Swipe'){ echo 'selected'; } ?>>Card Swipe</option>
										</select>
										<span class="text-danger"><?= display_error($validation, 'payment_option') ?></span>
									</div>
								</div>
							</div>
							<hr class="my-4">
							<div class="row">
								<div class="col-xl-12">
									<div class="float-end col-xl-3">
										<div class="mb-3 mb-xl-0">
											<input type="submit" name="save" class="btn btn-success col-12" value="Update">
										</div>
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
					url: '<?= base_url() ?>/ajax.room/fetchRoomOfID',
					data: {'room_type_id':room_type_id},
					success: function (response) {
						console.log(response);
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
					url: '<?= base_url() ?>/ajax.client/fetchClientData',
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

		function getTotal() {			
			var check_in_date = $('#check_in_date').val();
			var check_out_date = $('#check_out_date').val();
			var price = $('.check_in_room_type option:selected').text();
			var pricevalue = /\d+/g.exec(price)[0];
			const date1 = new Date(check_in_date);
			const date2 = new Date(check_out_date);
			const diffTime = Math.abs(date2 - date1);
			const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
			var gross_amount = diffDays * pricevalue;
			$('#gross_amount').val(gross_amount);
			subAmount();
		}

		function subAmount() {
			var gross_amount = $('#gross_amount').val();
			var discount = $('#discount').val();
			var total_amount = gross_amount - discount;
			if (parseFloat(discount) > parseFloat(gross_amount)) {
				parseFloat($('#discount').val(gross_amount));
			}else{
				parseFloat($('#total_amount').val(total_amount));
			}
		}
	</script>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>