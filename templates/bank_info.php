<?php 
	if ($args) {
		$client_name = $args['select_client_name'];
		$client_bank_info = $args['select_client_bank_info'];
		echo '<h3 style="font-weight: bold">' . $client_name . '</h3>';
		echo '<pre style="font-family: inherit">' . $client_bank_info . '</pre>';
 	}
	?>

<?php if (!$args) : ?> 
	<div class="payment-info">

		<div class="bank-info">
			<h4>LOCAL PAYMENT INFO.</h4>
			<p>
				<strong>BANCO BANISTMO</strong><br>
				Panama Maritime Training Services, Inc.<br>
				Bank Account Number:  0101090844<br>
				Checking Account.
			</p>
			
			<p>
				<strong>BANCO GENERAL</strong><br>
				Panama Maritime Training Services, Inc.<br>
				Bank Account Number:  03-29-01-025184-0<br>
				Checking Account.
			</p>
		</div>

		<div class="bank-info">
			<h4>PAYMENT INFO. ABROAD</h4>
			<p>
				Beneficiary Account:<br>
				<strong>PANAMA MARITIME TRAINING SERVICES, INC.</strong><br>
				BANK ACCOUNT NUMBER:  03-29-01-025184-0<br>
				Address: 77th Street Bldg. 26
				Panama City, Republic of Panama<br>
				PH: +(507)322-0013
			</p>
			<p>
				Beneficiary Bank:<br>
				<strong>BANCO GENERAL, S.A. - PANAMA</strong><br>
				Swift Code: BAGEPAPA<br>
				Address: Aquilino de la Guardia Street and Ave. 5 B Sur<br>
				Panama City, Republic of Panama<br>
			</p>
			<p>
				Intermediary Bank:<br>
				<strong>CITIBANK NEW YORK, N.Y.</strong><br>
				Account No.: 10951934<br>
				SWIFT Code: CITIUS33<br>
				ABA # 021000089<br>
				Address: 
				111 Wall Street
				New York, NY 10043<br>
				Phone: +1 917-746-1193
			</p>
			
		</div>

	</div>
<?php endif; ?>