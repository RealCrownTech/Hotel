<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3">Invoice #<?= $invoice_data['lodge_no'] ?></h1>

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body m-sm-3 m-md-5">					

							<table id="invoice" class="table table-bordered table-sm">
								<tbody>
									<tr>
										<td colspan="4" class="text-center">
											<h3 style="margin-bottom: 0 !important;margin-top: 10px;"><?= $company_data['hotel_name']; ?></h3>
											<small class="text-muted"><?php if($company_data['tagline']){ echo $company_data['tagline']; } ?></small>
											<address class="text-muted my-0"><?= $company_data['company_address']; ?></address>
											<p class="text-muted my-0"><strong>Phone: </strong><?= $company_data['company_phone']; ?><?php if($company_data['company_mobile']){ echo ', '.$company_data['company_mobile']; } ?></p>
											<p class="text-muted my-0"><strong>Email: </strong><?= $company_data['company_email']; ?></p>
											<p class="text-muted my-0"><strong>Website: </strong><?= $company_data['company_website']; ?></p>							
										</td>
										<td class="text-center">
											<img class="img-fluid" src="<?= base_url() ?>/public/assets/img/logo.jpg">
										</td>
									</tr>
									<tr>
										<td colspan="5" class="text-center" style="font-size: 20px;">
											<div><strong>Invoice</strong></div>
										</td>
									</tr>
									<tr>
										<td colspan="3">
											<div><strong>Invoice No:</strong> <?= $invoice_data['lodge_no'] ?></div>
											<div><strong>Guest Name:</strong> 
												<?php foreach ($clients as $cl): ?>
													<?php if( $invoice_data['client_id'] == $cl['client_id']): ?>
														<?= $cl['client_title']; ?>. <?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
													<?php endif; ?>
												<?php endforeach ?>
											</div>
										</td>
										<td colspan="2">
											<div><strong>Date:</strong> <?= date('d-M-Y', strtotime($invoice_data['check_in_date'])) ?></div>
											<div><strong>Time:</strong> <?= date('h:m A', strtotime($invoice_data['check_in_date'])) ?></div>
										</td>
									</tr>
									<tr>
										<td class="text-center">
											<div><strong>Nationality:</strong></div>
											<div class="text-muted">Nigerian</div>
										</td>
										<td class="text-center">
											<div><strong>No. of Adult:</strong></div>
											<div class="text-muted"><?= $invoice_data['adult_no'] ?></div>
										</td>
										<td class="text-center">
											<div><strong>No. of Kids:</strong></div>
											<div class="text-muted"><?= $invoice_data['kid_no'] ?></div>
										</td>
										<td class="text-center">
											<div><strong>Vehicle No:</strong></div>
											<div class="text-muted"><?= $invoice_data['vehicle_no'] ?></div>
										</td>
										<td class="text-center">
											<div><strong>Room No:</strong></div>
											<div class="text-muted">
												<?php foreach ($room_types as $cl): ?>
													<?php if( $invoice_data['room_type_id'] == $cl['room_type_id']): ?>
														<?= $cl['title']; ?>
													<?php endif; ?>
												<?php endforeach ?> 
												-
												<?php foreach ($rooms as $cl): ?>
													<?php if( $invoice_data['room_id'] == $cl['room_id']): ?>
														Room <?= $cl['room_no']; ?>
													<?php endif; ?>
												<?php endforeach ?>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="3">
											<div><strong>Date of Arrival:</strong> <?= date('d-M-Y', strtotime($invoice_data['check_in_date'])) ?></div>
										</td>
										<td colspan="2">
											<div><strong>Date of Departure:</strong> <?= date('d-M-Y', strtotime($invoice_data['check_out_date'])) ?></div>
										</td>
									</tr>
									<tr>
										<td>
											<div><strong>Time of Arrival:</strong> <?= date('h:m A', strtotime($invoice_data['check_in_date'])) ?></div>
										</td>
										<td colspan="2">
											<div><strong>Check-In By:</strong> 
												<?php foreach ($staffs as $cl): ?>
													<?php if( $invoice_data['check_in_by'] == $cl['user_id']): ?>
														<?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
													<?php endif; ?>
												<?php endforeach ?>
											</div>
										</td>
										<td colspan="2">
											<div><strong>Check-Out By:</strong> 
												<?php foreach ($staffs as $cl): ?>
													<?php if( $invoice_data['check_out_by'] == $cl['user_id']): ?>
														<?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
													<?php endif; ?>
												<?php endforeach ?>
											</div>
										</td>
									</tr>
									<tr>
										<th width="16.6%">Date</th>
										<th width="16.6%">Room</th>
										<th width="16.6%">Price</th>
										<th width="33.2%">Orders</th>
										<!-- <th width="16.6%">Misc</th> -->
										<th width="16.6%">Total</th>
									</tr>



									<?php foreach ($period as $value): ?>			
										<tr>
											<td><?= date('d-M-Y', strtotime($value['date'])) ?></td>
											<td>
												<?php foreach ($room_types as $cl): ?>
													<?php if( $value['room_type_id'] == $cl['room_type_id']): ?>
														<?= $cl['title']; ?>
													<?php endif; ?>
												<?php endforeach ?> 
												-
												<?php foreach ($rooms as $cl): ?>
													<?php if( $value['room_id'] == $cl['room_id']): ?>
														Room <?= $cl['room_no']; ?>
													<?php endif; ?>
												<?php endforeach ?>			
											</td>
											<td class="text-end">
												<?= '₦'.number_format($value['amount']) ?>
											</td>
											<td>
												<?php foreach ($orders as $cl): ?>
													<?php if( $value['date'] == $cl['date']): ?>
														<div><span class="text-sm"><strong><?= $cl['category'].' (#'.$cl['bill_no'].')'; ?></strong> <span class="float-end"> <?= '₦'.number_format($cl['amount']) ?></span></span></div>
														<hr class="my-0" />
													<?php endif; ?>
												<?php endforeach ?>
											</td>
											<td class="text-end">
												<?php 
													$total = 0;
													foreach ($transact as $trans) {
														if ($value['date'] == $trans['date'] && $invoice_data['lodge_no'] == $value['lodge_no']) {
															$amount = $trans['amount'];
															$total = $total + $amount;
														}
													}
													echo '₦'.number_format($total); 
												?>					
											</td>
										</tr>
									<?php endforeach ?>
									<tr>
										<th>&nbsp;</th>
										<th>&nbsp;</th>
										<th class="text-end"><?= '₦'.number_format($checkInAmount['amount']) ?></th>
										<th class="text-end"><?= '₦'.number_format($orderAmount['amount']) ?></th>
										<!-- <th class="text-end">₦1,500</th> -->
										<th class="text-end"><?= '₦'.number_format($grossAmount['amount']) ?></th>
									</tr>
									<tr>
										<td colspan="2" class="text-center">
											<div><strong>Gross Amount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($grossAmount['amount']) ?></div>
										</td>
										<td class="text-center">
											<div><strong>Discount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($invoice_data['discount']) ?></div>
										</td>
										<td colspan="2" class="text-center">
											<div><strong>Total Amount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($grossAmount['amount'] - $invoice_data['discount']) ?></div>
										</td>
									</tr>
									<tr>
										<?php if($company_data['show_on_invoice'] == 1): ?>
											<td colspan="2" class="">
												<div class="text-muted"><strong>Bank Name:</strong> <span class="float-end"><?= $company_data['bank_name']; ?></span></div>
												<div class="text-muted"><strong>Account Name:</strong> <span class="float-end"><?= $company_data['account_name']; ?></span></div>
												<div class="text-muted"><strong>Account Number:</strong> <span class="float-end"><?= $company_data['account_number']; ?></span></div>
											</td>
											<td colspan="3" class="text-center">
												<div class="text-muted">&nbsp;</div>
												<div class="text-muted">&nbsp;</div>
												<div class="text-muted">&nbsp;</div>
												<div><strong>Guest Signature</strong></div>
											</td>
										<?php else: ?>
											<td colspan="5" class="text-center">
												<div class="text-muted">&nbsp;</div>
												<div class="text-muted">&nbsp;</div>
												<div class="text-muted">&nbsp;</div>
												<div><strong>Guest Signature</strong></div>
											</td>
										<?php endif ?>
									</tr>
								</tbody>
							</table>

							<div class="text-center">
								<p class="text-sm">
									<strong>Thank you for your stay with us. Please visit us again.</strong> 
								</p>

								<!-- <a href="print/invoice/24073923" class="btn btn-primary">
					              Print this Invoice
					            </a> -->
					            <a href="<?= base_url() ?>/print_invoice/<?= $invoice_data['lodge_no'] ?>" class="btn btn-primary">
					              Print Invoice
					            </a>
							</div>							
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<?= $this->include('layouts/footer'); ?>
<?= $this->endSection(); ?>