<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<!-- <div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body m-sm-3 m-md-5"> -->
							<table id="invoice" class="table table-bordered table-sm">
								<tbody>
									<tr>
										<td colspan="4" class="text-center">
											<h3 style="margin-bottom: 0 !important;margin-top: 10px;"><?= $company_data['hotel_name']; ?></h3>
											<small class="text-muted"><?php if($company_data['tagline']){ echo $company_data['tagline']; } ?></small>
											<address class="text-muted my-0"><?= $company_data['company_address']; ?></address>
											<p class="text-muted my-0"><strong>Phone: </strong><?= $company_data['company_phone']; ?><?php if($company_data['company_mobile']){ echo ', '.$company_data['company_mobile']; } ?> | <strong>Email: </strong><?= $company_data['company_email']; ?></p>
											<p class="text-muted my-0"><strong>Website: </strong><?= $company_data['company_website']; ?></p>							
										</td>
										<td class="text-center">
											<img class="img-fluid" src="<?= base_url() ?>/public/assets/img/logo.jpg">
										</td>
									</tr>
									<tr>
										<td colspan="5" class="text-center" style="font-size: 20px;">
											<div><strong>Reservation Receipt</strong></div>
										</td>
									</tr>
									<tr>
										<td colspan="3">
											
											<div><strong>Room Type: </strong>
												<?php foreach ($room_types as $cl): ?>
													<?php if( $invoice_data['room_type_id'] == $cl['room_type_id']): ?>
														<?= $cl['title']; ?>
													<?php endif; ?>
												<?php endforeach ?> 
											</div>
											
											<div><strong>Room No: </strong>
												<?php foreach ($rooms as $cl): ?>
													<?php if( $invoice_data['room_id'] == $cl['room_id']): ?>
														Room <?= $cl['room_no']; ?>
													<?php endif; ?>
												<?php endforeach ?> 
											</div>
																						
											<div><strong>Guest Name:</strong> 
												<?php foreach ($clients as $cl): ?>
													<?php if( $invoice_data['client_id'] == $cl['client_id']): ?>
														<?= $cl['client_title']; ?>. <?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
													<?php endif; ?>
												<?php endforeach ?>
											</div>
											
										</td>
										<td colspan="2">
											
											<div><strong>Receipt No:</strong> <?= $invoice_data['reservation_no'] ?></div>
											
											<div><strong>Date:</strong> <?= date('d-M-Y h:m A') ?></div>
											
										</td>
									</tr>
									<tr>
										<td class="text-center" colspan="3">
											
											<div><strong>Arrival Date:</strong></div>
											<div class="text-muted"><?= date('d-M-Y', strtotime($invoice_data['check_in_date'])) ?></div>
											
										</td>
										<td class="text-center" colspan="2">
											
											<div><strong>Departure Date:</strong></div>
											<div class="text-muted"><?= date('d-M-Y', strtotime($invoice_data['check_out_date'])) ?></div>
											
										</td>
									</tr>
									<tr>
										<td class="text-center">
											
											<div><strong>Gross Amount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($invoice_data['gross_amount']) ?></div>
											
										</td>
										<td class="text-center">
											
											<div><strong>Discount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($invoice_data['discount']) ?></div>
											
										</td>
										<td class="text-center">
											
											<div><strong>Payable Amount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($invoice_data['total_amount']) ?></div>
											
										</td>
										<td class="text-center">
											
											<div><strong>Deposit Amount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($invoice_data['deposit_amount']) ?></div>
											
										</td>
										<td class="text-center">
											
											<div><strong>Balance Amount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($invoice_data['balance_amount']) ?></div>
											
										</td>
									</tr>
									<tr>
										<td colspan="4">
											
											<div><strong>AMOUNT IN WORDS:</strong> 
												<?php 
													$amount = $invoice_data['deposit_amount'];
													$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
													$f->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-numbering-verbose"); 
													echo ucfirst($f->format($amount).' naira only.'); 
												?>
											</div>
											
										</td>										
										<td>
											
											<div><strong>Payment Info:</strong></div>
											<div class="text-muted"><?= $invoice_data['payment_option'] ?></div>
											
										</td>
									</tr>
									<tr>
										<td colspan="2">
											
											<div><strong>Reservation By:</strong> 
												<?php foreach ($staffs as $cl): ?>
													<?php if( $invoice_data['check_in_by'] == $cl['user_id']): ?>
														<?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
													<?php endif; ?>
												<?php endforeach ?></div>
											
										</td>
										<td colspan="3">
											
											<div><strong>Authorized Signatory</strong></div>
											
										</td>
									</tr>
									<tr>
										<td colspan="5" class="text-center">
											<div class="text-muted">&nbsp;</div>
											<div class="text-muted">&nbsp;</div>
											<div class="text-muted">&nbsp;</div>
											<div><strong>Guest Signature</strong></div>
										</td>
									</tr>
								</tbody>
							</table>


							<div class="text-center">
								<p class="text-sm">
									<strong>Thank you for your stay with us. Please visit us again.</strong> 
								</p>
							</div>


							<div class="text-muted">&nbsp;</div>


							<table id="invoice" class="table table-bordered table-sm">
								<tbody>
									<tr>
										<td colspan="4" class="text-center">
											<h3 style="margin-bottom: 0 !important;margin-top: 10px;"><?= $company_data['hotel_name']; ?></h3>
											<small class="text-muted"><?php if($company_data['tagline']){ echo $company_data['tagline']; } ?></small>
											<address class="text-muted my-0"><?= $company_data['company_address']; ?></address>
											<p class="text-muted my-0"><strong>Phone: </strong><?= $company_data['company_phone']; ?><?php if($company_data['company_mobile']){ echo ', '.$company_data['company_mobile']; } ?> | <strong>Email: </strong><?= $company_data['company_email']; ?></p>
											<p class="text-muted my-0"><strong>Website: </strong><?= $company_data['company_website']; ?></p>							
										</td>
										<td class="text-center">
											<img class="img-fluid" src="<?= base_url() ?>/public/assets/img/logo.jpg">
										</td>
									</tr>
									<tr>
										<td colspan="5" class="text-center" style="font-size: 20px;">
											<div><strong>Reservation Receipt</strong></div>
										</td>
									</tr>
									<tr>
										<td colspan="3">
											
											<div><strong>Room Type: </strong>
												<?php foreach ($room_types as $cl): ?>
													<?php if( $invoice_data['room_type_id'] == $cl['room_type_id']): ?>
														<?= $cl['title']; ?>
													<?php endif; ?>
												<?php endforeach ?> 
											</div>
											
											<div><strong>Room No: </strong>
												<?php foreach ($rooms as $cl): ?>
													<?php if( $invoice_data['room_id'] == $cl['room_id']): ?>
														Room <?= $cl['room_no']; ?>
													<?php endif; ?>
												<?php endforeach ?> 
											</div>
																						
											<div><strong>Guest Name:</strong> 
												<?php foreach ($clients as $cl): ?>
													<?php if( $invoice_data['client_id'] == $cl['client_id']): ?>
														<?= $cl['client_title']; ?>. <?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
													<?php endif; ?>
												<?php endforeach ?>
											</div>
											
										</td>
										<td colspan="2">
											
											<div><strong>Receipt No:</strong> <?= $invoice_data['reservation_no'] ?></div>
											
											<div><strong>Date:</strong> <?= date('d-M-Y h:m A') ?></div>
											
										</td>
									</tr>
									<tr>
										<td class="text-center" colspan="3">
											
											<div><strong>Arrival Date:</strong></div>
											<div class="text-muted"><?= date('d-M-Y', strtotime($invoice_data['check_in_date'])) ?></div>
											
										</td>
										<td class="text-center" colspan="2">
											
											<div><strong>Departure Date:</strong></div>
											<div class="text-muted"><?= date('d-M-Y', strtotime($invoice_data['check_out_date'])) ?></div>
											
										</td>
									</tr>
									<tr>
										<td class="text-center">
											
											<div><strong>Gross Amount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($invoice_data['gross_amount']) ?></div>
											
										</td>
										<td class="text-center">
											
											<div><strong>Discount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($invoice_data['discount']) ?></div>
											
										</td>
										<td class="text-center">
											
											<div><strong>Payable Amount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($invoice_data['total_amount']) ?></div>
											
										</td>
										<td class="text-center">
											
											<div><strong>Deposit Amount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($invoice_data['deposit_amount']) ?></div>
											
										</td>
										<td class="text-center">
											
											<div><strong>Balance Amount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($invoice_data['balance_amount']) ?></div>
											
										</td>
									</tr>
									<tr>
										<td colspan="4">
											
											<div><strong>AMOUNT IN WORDS:</strong> 
												<?php 
													$amount = $invoice_data['deposit_amount'];
													$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
													$f->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-numbering-verbose"); 
													echo ucfirst($f->format($amount).' naira only.'); 
												?>
											</div>
											
										</td>										
										<td>
											
											<div><strong>Payment Info:</strong></div>
											<div class="text-muted"><?= $invoice_data['payment_option'] ?></div>
											
										</td>
									</tr>
									<tr>
										<td colspan="2">
											
											<div><strong>Reservation By:</strong> 
												<?php foreach ($staffs as $cl): ?>
													<?php if( $invoice_data['check_in_by'] == $cl['user_id']): ?>
														<?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
													<?php endif; ?>
												<?php endforeach ?></div>
											
										</td>
										<td colspan="3">
											
											<div><strong>Authorized Signatory</strong></div>
											
										</td>
									</tr>
									<tr>
										<td colspan="5" class="text-center">
											<div class="text-muted">&nbsp;</div>
											<div class="text-muted">&nbsp;</div>
											<div class="text-muted">&nbsp;</div>
											<div><strong>Guest Signature</strong></div>
										</td>
									</tr>
								</tbody>
							</table>
						<!-- </div>
					</div>
				</div>
			</div> -->
		</div>
	</main>
<?= $this->endSection(); ?>