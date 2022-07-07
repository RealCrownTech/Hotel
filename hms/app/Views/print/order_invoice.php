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
											<p class="text-muted my-0"><strong>Phone: </strong><?= $company_data['company_phone']; ?><?php if($company_data['company_mobile']){ echo ', '.$company_data['company_mobile']; } ?></p>
											<p class="text-muted my-0"><strong>Email: </strong><?= $company_data['company_email']; ?></p>
											<p class="text-muted my-0"><strong>Website: </strong><?= $company_data['company_website']; ?></p>							
										</td>
										<!-- <td class="text-center">
											<img class="img-fluid" src="<?= base_url() ?>/public/assets/img/logo.jpg">
										</td> -->
									</tr>
									<tr>
										<td colspan="5" class="text-center" style="font-size: 20px;">
											<div><strong>Invoice</strong></div>
										</td>
									</tr>
									<tr>
										<td colspan="2">
											<div><strong>Invoice No:</strong> <?= $orders['bill_no'] ?></div>
											<div><strong>Guest Name:</strong>
												<?php if($orders['client'] == 'Walk-In'): ?> 
													<?= 'Walk-In'; ?>
												<?php else: ?>
													<?php foreach ($clients as $cl): ?>
														<?php if( $orders['client'] == $cl['client_id']): ?>
															<?= $cl['client_title']; ?>. <?= $cl['first_name']; ?> <?= $cl['last_name']; ?>
														<?php endif; ?>
													<?php endforeach ?>
												<?php endif ?>
											</div>
										</td>
										<td colspan="2">
											<div><strong>Date:</strong> <?= date('d-M-Y', strtotime($orders['date'])) ?></div>
										</td>
									</tr>
									
									<tr>
										<th width="16.6%">Item</th>
										<th width="16.6%">Rate</th>
										<th width="33.2%">Qty</th>
										<th width="16.6%">Amount</th>
									</tr>



									<?php foreach ($orders_data as $value): ?>			
										<tr>
											<td>
												<?php if(!empty($foods)): ?>
												<?php foreach ($foods as $fd): ?>
													<?php if( $value['item_id'] == $fd['food_id']): ?>
														<?= $fd['food_name']; ?>
													<?php endif; ?>
												<?php endforeach ?>	
												<?php endif ?>		
											</td>
											<td class="text-end">
												<?php if(!empty($foods)): ?>
												<?php foreach ($foods as $fd): ?>
													<?php if( $value['item_id'] == $fd['food_id']): ?>
														<?= '₦'.number_format($fd['food_price']); ?>
													<?php endif; ?>
												<?php endforeach ?>
												<?php endif ?>
											</td>
											<td>
												<?= $value['qty']; ?>
											</td>
											<td class="text-end">
												<?= '₦'.number_format($value['amount']); ?>		
											</td>
										</tr>
									<?php endforeach ?>
									<tr>
										<th style="border-left-style: hidden; border-bottom-style: hidden; ">&nbsp;</th>
										<th style="border-left-style: hidden; border-bottom-style: hidden; ">&nbsp;</th>
										<th>Total</th>
										<th class="text-end"><?= '₦'.number_format($orders['amount']) ?></th>
									</tr>
									<tr>
										<th style="border-left-style: hidden; border-bottom-style: hidden; ">&nbsp;</th>
										<th style="border-left-style: hidden; border-bottom-style: hidden; ">&nbsp;</th>
										<th>Payment Option</th>
										<th class="text-end"><?= $orders['payment_option'] ?></th>
									</tr>
								</tbody>
							</table>

							<div class="text-center">
								<p class="text-sm">
									<strong>Thank you for your stay with us. Please visit us again.</strong> 
								</p>
							</div>
						<!-- </div>
					</div>
				</div>
			</div> -->
		</div>
	</main>
<?= $this->endSection(); ?>