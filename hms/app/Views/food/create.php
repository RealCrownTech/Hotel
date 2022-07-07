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
							<?= form_open('/createOrder') ?>
								<div class="row">
									<div class="col-md-12">
										<div class="card">
											<div class="card-body">
												<h5 class="card-title">Guest Type</h5>
												<hr class="my-4">
												<div class="col-md-4 row row-cols-md-auto align-items-center float-start">
													<div class="col-12">
														<div class="form-radio mb-1 mr-sm-2">
															<label class="form-check">
												              <input name="guest_type" type="radio" value="walk_in_guest" class="form-check-input">
												              <span class="form-check-label">Walk-In Guest</span>
												            </label>
												        </div>
												    </div>
												    <div class="col-12">
														<div class="form-radio mb-1 mr-sm-2">
															<label class="form-check">
												              <input name="guest_type" type="radio" value="checked_in_guest" class="form-check-input">
												              <span class="form-check-label">Checked-In Guest</span>
												            </label>
												        </div>
												    </div>
												</div>
												<div class="mb-3 col-md-4 float-start">
													<label class="form-label" for="inputEmail4">Room Number<span class="font-13 text-danger">*</span></label>
													<select class="form-control select2" data-toggle="select2" id="choose_room">
														<option value="">--Search--</option>
														<?php if (!empty($rooms)): ?>
															<?php foreach($rooms as $row): ?>
												            <option value="<?= $row['room_id'] ?>">Room <?= $row['room_no'] ?></option>
												        	<?php endforeach ?>
												        <?php endif ?>
											        </select>
												</div>
												<div class="mb-3 col-md-4 float-end">
													<label class="form-label" for="inputPassword4">Guest Name<span class="font-13 text-danger">*</span></label>
													<input type="text" class="form-control" id="guest_name">
													<input type="hidden" class="form-control" id="guest_id" name="guest_id">
													<input type="hidden" class="form-control" id="lodge_no" name="lodge_no">
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="card">											
											<div class="card-body">
												<button type="button" id="add_new_row" onclick="go_off(this)" class="btn btn-primary my-1 float-end"><i data-feather="plus"></i></button>
												<h5 class="card-title">Order Details</h5>
												<hr class="my-4">
												<div id="first_wrapper">
													<div class="row row_count" id="row_1">
														<div class="col-12 col-md-3">
															<div class="mb-3 mb-xl-0">
																<label class="form-label">Item Name<span class="font-13 text-danger">*</span></label>
																<select class="form-control select2" data-toggle="select2" id="item_1" name="item[]" onchange="getFoodData(1)">
																	<option value="">--Search--</option>
																	<?php if(!empty($food)): ?>
																	<?php foreach($food as $row): ?>
														            <option value="<?= $row['food_id'] ?>"><?= $row['food_name'] ?></option>
														        	<?php endforeach ?>
														        	<?php endif ?>
														        </select>
															</div>
														</div>
														<div class="col-12 col-md-2">
															<div class="mb-3 mb-xl-0">
																<label class="form-label">Rate<span class="font-13 text-danger">*</span></label>
																<input class="form-control" type="text" name="rate[]" id="rate_1" readonly/>
															</div>
														</div>
														<div class="mb-3 col-md-2">
															<label class="form-label" for="inputState">Quantity<span class="font-13 text-danger">*</span></label>
															<input class="form-control" type="text" name="qty[]" id="qty_1" onkeyup="getTotal(1);" />
															<span class="text-danger"><?= display_error($validation, 'qty') ?></span>
														</div>
														<div class="mb-3 col-md-3">
															<label class="form-label" for="inputEmail4">Amount<span class="font-13 text-danger">*</span></label>
															<input class="form-control" type="text" name="amount[]" id="amount_1" readonly/>
														</div>
														<div class="mb-3 col-md-2">
															<label class="form-label" for="inputEmail4">Remove</label>
															<button type="button" class="btn btn-primary form-control" id="remove_this"><i data-feather="minus"></i></button>
														</div>
													</div>													
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="card">											
											<div class="card-body">
												<h5 class="card-title">Payment</h5>
												<hr class="my-4">
												<div id="first_wrapper">
													<div class="row ">
														<div class="mb-3 col-md-3">
															<label class="form-label" for="inputEmail4">Payment Options</label>
															<select class="form-control select2" data-toggle="select2" id="" name="payment_option">
																<option value="">--Select--</option>
																<option value="Cash">Cash</option>
																<option value="Bank Transfer">Bank Transfer</option>
																<option value="Card Swipe">Card Swipe</option>
															</select>
															<span class="text-danger"><?= display_error($validation, 'payment_option') ?></span>
														</div>													
														<div class="mb-3 col-md-3">
															<label class="form-label" for="inputEmail4">Total</label>
															<input class="form-control" type="text" name="total" id="total_amount" readonly/>
														</div>
														<div class="col-12 col-md-3">
															<div class="mb-3 mb-xl-0">
																<label class="form-label">Post To Room<span class="font-13 text-danger">*</span></label>
																<select class="form-control select2" data-toggle="select2" id="post_to_room" name="ptr">
																	<option value="">--Choose--</option>
																	<option value="1">Yes</option>
																	<option value="0">No</option>
														        </select>
														        <span class="text-danger"><?= display_error($validation, 'ptr') ?></span>
															</div>
														</div>
														<div class="mb-3 col-md-3">
															<label class="form-label" for="inputEmail4"></label>
															<input class="btn btn-success col-md-12" type="submit" name="pay_now" value="Pay Now" />
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
				</div>
			</div>

		</div>
	</main>
	<script type="text/javascript">
		jquery_3_2_1(document).ready(function() {
			feather.replace();
			jquery_3_2_1("#add_new_row").unbind('click').bind('click', function() {
				var first_wrapper = $("#first_wrapper");
			    var count_row = $(".row_count").length;
			    var row_id = count_row + 1;

			    $.ajax({
			        method: 'POST',
					url: 'ajax.food/fetchAllFoodData',
					data: {},
			        success:function(response) {	
			        	var html = '<div class="row row_count mb-3" id="row_'+row_id+'">'+
				        	'<div class="col-12 col-md-3">'+
				        		'<div class="mb-3 mb-xl-0">'+
				        			'<select class="form-control form_select select2" data-toggle="select2" id="item_'+row_id+'" name="item[]" onchange="getFoodData('+row_id+')">'+
				        				'<option value="">--Search--</option>';
				        				$.each(response.food_data, function(key, foodvalue) {
				                        	html += '<option value="'+foodvalue.food_id+'">'+foodvalue.food_name+'</option>';             
				                        });
				        			html += '</select>'+
				        		'</div>'+
				        	'</div>'+
				        	'<div class="col-12 col-md-2">'+
								'<div class="mb-3 mb-xl-0">'+
									'<input class="form-control" type="text" name="rate[]" id="rate_'+row_id+'" readonly/>'+
								'</div>'+
							'</div>'+
							'<div class="col-12 col-md-2">'+
								'<div class="mb-3 mb-xl-0">'+
									'<input class="form-control" type="text" name="qty[]" id="qty_'+row_id+'" onkeyup="getTotal('+row_id+');" />'+
									'<span class="text-danger"><?= display_error($validation, 'qty') ?></span>'+
								'</div>'+
							'</div>'+
							'<div class="col-12 col-md-3">'+
								'<div class="mb-3 mb-xl-0">'+
									'<input class="form-control" type="text" name="amount[]" id="amount_'+row_id+'" readonly/>'+
								'</div>'+
							'</div>'+
							'<div class="col-12 col-md-2">'+
								'<button type="button" class="btn btn-primary form-control" id="remove_this"><i data-feather="minus"></i></button>'+
							'</div>'+
						'</div>';
						if(count_row >= 1) {
			            	$(".row_count:last").after(html);  
			            }
			            else {
			                //$("#first_wrapper tbody").html(html);
			            }

			            $(".form_select").select2();
						feather.replace();
			        }
        		});

				return false;
    		});

    		$(document).on('change', '#choose_room', function(){
				var room_id = $(this).val();
				$.ajax({
					method: 'POST',
					url: 'ajax.food/fetchGuestRoomAndData',
					data: {'room_id':room_id},
					success: function (response) {
						$.each(response, function (key, guestvalue) {
							$('#guest_name').val(guestvalue['first_name']+' '+guestvalue['last_name']);
							$('#guest_id').val(guestvalue['client_id']);
							$('#lodge_no').val(response.lodge_no);
						});			
					}
				});
			});
		});

		function getTotal(row = null) {
		    if(row) {
				var total = Number($("#rate_"+row).val()) * Number($("#qty_"+row).val());
				total = total.toFixed(0);
				$("#amount_"+row).val(total);
				subAmount();
		    } else {
		      
		    }
		}

		function getFoodData(row_id)
		{
		    var food_id = $("#item_"+row_id).val();    
		    if(food_id == "") {
		      $("#rate_"+row_id).val("");
		      $("#qty_"+row_id).val(""); 			  
			  $("#stock_"+row_id).val("");
		      $("#amount_"+row_id).val("");
		    } else {
		      $.ajax({
		      	method: 'POST',
				url: 'ajax.food/fetchFoodData',
				data: {'food_id' : food_id},
		        success:function(response) {
		        	$.each(response, function (key, foodvalue) {
						$("#rate_"+row_id).val(foodvalue['food_price']);
					});		          
		          subAmount();
		        } // /success
		      });
		    }
		}

		function subAmount() {
			count_row = $(".row_count").length;
		    var totalSubAmount = 0;
		    for(x = 0; x < count_row; x++) {
		      var tr = $(".row_count")[x];
		      var count = $(tr).attr('id');
		      count = count.substring(4);
				  
		      totalSubAmount = Number(totalSubAmount) + Number($("#amount_"+count).val());
			}
			$("#total_amount").val(totalSubAmount);
		}
		
	    jquery_3_2_1('#remove_this').click (function () { 
	        $(this).closest('.row').remove();
	        subAmount();
	    });

	    function go_off(el) {
		    el.disabled = true;
		    setTimeout(function() {
		    	el.disabled = false;
		    }, 3000);
		}
	</script>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>