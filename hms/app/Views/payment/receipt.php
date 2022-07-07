<?= $this->extend('layouts/base'); ?>

<?= $this->section('page_content'); ?>
	<?= $this->include('layouts/navigation'); ?>
	<?= $this->include('layouts/header'); ?>
	<main class="content">
		<div class="container-fluid p-0">

			<h1 class="h3 mb-3">Invoice #<?= $payment_data['payment_no'] ?></h1>

			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body m-sm-3 m-md-5">					

							<table id="invoice" class="table table-bordered table-sm">
								<tbody>
									<tr>
										<td colspan="3" class="text-center">
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
										<td colspan="4" class="text-center" style="font-size: 20px;">
											<div><strong>Reservation Receipt</strong></div>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<div class="text-muted">&nbsp;</div>											
											<div><strong>Guest Name:</strong> 
												<?php foreach ($clients as $cl): ?>
													<?php if( $payment_data['client_id'] == $cl['client_id']): ?>
														<?= $cl['client_title']; ?>. <?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
													<?php endif; ?>
												<?php endforeach ?>
											</div>
											<div class="text-muted">&nbsp;</div>
										</td>
										<td colspan="2">
											<div class="text-muted">&nbsp;</div>
											<div><strong>Receipt No:</strong> <?= $payment_data['payment_no'] ?></div>
											<div class="text-muted">&nbsp;</div>
											<div><strong>Date:</strong> <?= date('d-M-Y', strtotime($payment_data['payment_date'])) ?></div>
											<div class="text-muted">&nbsp;</div>
										</td>
									</tr>
									<tr>
										<td colspan="2" class="text-center">
											<div class="text-muted">&nbsp;</div>
											<div><strong>Amount</strong></div>
											<div class="text-muted"><?= '₦'.number_format($payment_data['amount']) ?></div>
											<div class="text-muted">&nbsp;</div>
										</td>										
										<td colspan="2">
											<div class="text-muted">&nbsp;</div>
											<div><strong>Payment Info:</strong></div>
											<div class="text-muted"><?= $payment_data['payment_option'] ?></div>
											<div class="text-muted">&nbsp;</div>
										</td>
									</tr>
									<tr>
										<td colspan="4">
											<div class="text-muted">&nbsp;</div>
											<div><strong>AMOUNT IN WORDS:</strong> 
												<?php 
													$amount = $payment_data['amount'];
													$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
													$f->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-numbering-verbose"); 
													echo ucfirst($f->format($amount).' naira only.'); 
												?>
											</div>
											<div class="text-muted">&nbsp;</div>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<div class="text-muted">&nbsp;</div>
											<div><strong>Payment By:</strong> 
												<?php foreach ($staffs as $cl): ?>
													<?php if( $payment_data['payment_by'] == $cl['user_id']): ?>
														<?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
													<?php endif; ?>
												<?php endforeach ?></div>
											<div class="text-muted">&nbsp;</div>
										</td>
										<td colspan="2">
											<div class="text-muted">&nbsp;</div>
											<div><strong>Authorized Signatory</strong></div>
											<div class="text-muted">&nbsp;</div>
										</td>
									</tr>
									<tr>
										<td colspan="4" class="text-center">
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
					            <a href="<?= base_url() ?>/print_payment_receipt/<?= $payment_data['payment_no'] ?>" class="btn btn-success">
					            	Print Receipt					             
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