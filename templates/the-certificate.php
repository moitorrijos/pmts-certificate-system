<div class="main">

	<div class="main-content">

		<div class="buttons">

			<a href="<?php echo home_url('panama-certificates'); ?>" class="back-link">
				&laquo;
				Back to Certificates List
			</a>

			<?php if ( current_user_can( 'edit_pages' ) ) : ?>

				<a href="#0" class="edit-button not-link"><i class="fa fa-pencil"></i>
					Edit Certificate
				</a>

			<a href="#0" class="print-button not-link"><i class="fa fa-print"></i>
				Print Certificate
			</a>

			<a href="#0" class="view-button not-link"><i class="fa fa-eye"></i>
				View Certificate
			</a>

			<a href="<?php echo home_url('panama-certificates/new-panama-certificate');?>" class="new-certificate-button">
				<i class="fa fa-plus-square"></i>
				Create New Certificate
			</a>

			<?php endif; ?>

		</div>

		<?php

			if ( have_posts() ) : while ( have_posts() ) : the_post();

			$students_name = ucfirst( strtolower( get_field('students_name') ) );
			$course = get_field('course');
			$instructor = get_field('instructor');
			$place_of_birth = get_field('place_of_birth');
			$office = get_field('office');
			$delivery_mode = get_field('delivery_mode');
			$start_date = DateTime::createFromFormat( 'Ymd', get_field('start_date') );
			$end_date = DateTime::createFromFormat( 'Ymd', get_field('end_date') );
			$issue_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance') );
			$issue_date_timestamp = strtotime( get_field('date_of_issuance') );
			$expiry_date_timestamp = strtotime( '+5 years',  strtotime( get_field('end_date') ) );
			$expiry_date_3_years_timestamp = strtotime( '+3 years',  strtotime( get_field('end_date') ) );
			$expiry_date = date( 'd F Y', $expiry_date_timestamp );
			$expiry_date_3_years = date( 'd F Y', $expiry_date_3_years_timestamp );
			$issue_month = $issue_date->format('m');
			$issue_year = $issue_date->format('y');
			$no_posts = 196;
			$certificate_ID = get_the_id();
			$register_code =  get_post_meta(get_the_ID(), 'register_code', true);

		?>

		<div class="certificate view-section" id="the-certificate" data-certificate-id="<?php echo $certificate_ID; ?>">
			
			<div class="certificate-author-mask not-for-print"></div>

			<div class="certificate-author not-for-print">

				<p class="small">
					
					<i class="fa fa-info-circle" aria-hidden="true"></i>

					<span class="certificate-info">
						Certificate created by <?php the_author(); ?> on <?php the_date(); ?> &nbsp;
					</span>

				</p>

			</div>

			
			<div class="office-location"></div>

			<h3 class="certify">Certify that:</h3>

			<h1 class="participant-name"> 
				<?php if ( strlen($students_name) <= 37 ) : ?>
					<span class="three-stars">***</span>
				<?php endif; ?>
			 	<?php echo ucwords($students_name); ?>
			 	<?php if ( strlen($students_name) <= 37 ) : ?>
					<span class="three-stars">***</span>
				<?php endif; ?>
			</h1>

			<p class="attended">Has satisfactorily attended course on:</p>

			<h2 class="course"><?php echo get_the_title($course->ID); ?></h2>

			<div class="full">

				<p class="short">

					Participant's Passport / ID No.:

					<span class="undies passies"> 
					<span class="three-stars">***</span> 
				 	<?php echo the_field('passport_id'); ?>
				 	<span class="three-stars">***</span> 
					</span>

				</p>

			</div>

			<div class="full">

				<p class="short">
					Participant's Place and Date of Birth:

					<span class="undies">
						<span class="three-stars">***</span> 
						<span class="paddies"><?php echo $place_of_birth; ?></span> 
						<?php echo the_field('date_of_birth'); ?>
						<span class="three-stars">***</span>
					</span>

				</p>

			</div>

			<div class="full">

				<div class="half">
					
					<p class="short">
						
						Participant's Nationality:

						<span class="undies">
							<span class="three-stars">***</span> 
							<?php echo the_field('student_nationality'); ?>
							<span class="three-stars">***</span>
						</span>

					</p>
					
				</div>

				<div class="half">

	                <p class="short">Register Code:

						<span class="undies">
							<span>***</span> 
							<span class="register-code">
								<?php echo get_post_meta( $post->ID, "pmtscs_register_code", true ); ?>
							</span>
							<span>***</span> 
						</span>                 

					</p>
					
				</div>

			</div>

			<div class="full">

				<?php if ($course->f_ti != '54') : ?>

					<p class="resolution-p short">

						This course fulfills minimum requirements of

						<?php if ( (int)$course->ID !== 81 ) : ?>
						
							<span class="unpaddies"><?php echo $course->regulation; ?></span>

						<?php endif; ?>

						<?php 

							$national_courses = array(12646, 17570, 17572, 17573, 17574, 17575, 17576, 17577);

							if( in_array( (int)$course->ID, $national_courses ) ) :
							
						?>

							of the Panama Maritime Authority.

						<?php elseif( (int)$course->ID === 51) : ?>

							.

						<?php elseif( (int)$course->ID === 81 ) : ?>

							the provisions in the <span class="unpaddies">Chapter VII and IX</span> of the International Telecommunication Union Radio Regulations (ITU) adopted by <span class="unpaddies">Resolution ADM No. 181-2020</span> of November 25th, 2020. Regulated by the Regulation IV/2 and Table A-IV/2 of the International Convention on Standards of  Training, Certification and Watchkeeping for Seafarers 1978, as amended.

						<?php else : ?>

							under the provision of the International Convention on Standards of Training, Certification and Watchkeeping for Seafarers, 1978, as amended

						<?php endif; ?>
						
						<span class="unpaddies">

							<?php if ($course->imo_no) : ?>

								IMO Model Course <?php echo $course->imo_no; ?>.

							<?php endif; ?>

						</span>

					</p>

				<?php else : ?>

					<p class="resolution-p short">
						
						In recreational power boats above 24 meters in length, up to 500GT and unlimited distance of navigation. (En embarcaciones de recreo a motor mayores de 24 metros de eslora, hasta 500 GT y navegación sin límite).

					</p>

				<?php endif; ?>

			</div>

				<div class="full dates">
					
					<div class="half">
						
		                <p class="short">Start Course Date:

							<span class="undies bottom start-date"><?php echo $start_date->format('d F Y'); ?></span>

						</p>

					</div>

					<div class="half">
						
						<p class="short">

							End Course Date:

							<span class="undies bottom end-date"><?php echo $end_date->format('d F Y'); ?></span>

						</p>
						
					</div>

				</div>
			
			<div class="full">
				
				<div class=" 
					<?php 

						if (get_field('delivery_mode') == 'On Board') {

							echo 'short-half';

						} else {

							echo 'half';

						} ?>"

				>
					
					<p class="short">

						Course Delivery Mode:

						<span class="undies delivery-mode

							<?php 

							if (get_field('delivery_mode') == 'On Board') {

								echo '';

							} else {

								echo 'bottom';

							} ?>

						">	
							
							<?php 

								if ( $delivery_mode ) {

									echo $delivery_mode;

								} else {

									echo 'In Classroom';
									
								}


							?>
								
						</span>

					</p>
					
				</div>

				<div class="

					<?php 

						if (get_field('delivery_mode') == 'On Board') {

							echo 'long-half';

						} else {

							echo 'half';

						} ?>

				">
					
					<p class="short">

						Place of Training:

						<span class="undies place-of-training

						<?php 

						if (get_field('delivery_mode') == 'On Board') {

							echo '';

						} else {

							echo 'bottom';

						} ?>

						"><?php echo $office->name; ?></span>

					</p>
					
				</div>

			</div>

			<p class="short">

				This course has been approved by the Government of <span class="undiesunpaddies">PANAMA</span>

				By means of Resolution

				<?php

					$resolutions = array();

					$the_resolutions = new WP_Query(array(
						'post_type' => 'resolutions',
						'posts_per_page' => -1,
						'order'	=> 'ASC',
					));

					if ( $the_resolutions->have_posts() ) :

						while ( $the_resolutions->have_posts() ) :

							$the_resolutions->the_post();

							array_push(
								$resolutions,
								array(
									'resolution_id' => get_the_ID(),
									'resolution_name' => get_the_title(),
									'resolution_issue_date' => strtotime( get_field('resolution_issue_date') ),
									'resolution_expiry_date' => strtotime( get_field('resolution_expiry_date') )
									)
							);

						endwhile; endif; wp_reset_postdata();

						$resolution = '';
						$resolution_date = 1;
						$resolution_expiry_date = 1;
						
						foreach ($resolutions as $res) {
							
							$resolution = $res['resolution_name'];
							$resolution_date = $res['resolution_issue_date'];
							$resolution_expiry_date = $res['resolution_expiry_date'];
							
							if ( 
								$issue_date_timestamp > $res['resolution_issue_date']
								&& $issue_date_timestamp < $res['resolution_expiry_date']
							) {
								break;
							}

						}

				?>

				<span class="undiesunpaddies">
					<?php echo $resolution; ?>		
				</span>

				of

				<span class="undiesunpaddies">
					<?php echo date('j F Y', $resolution_date); ?>
				</span>,

				valid until
				<span class="undiesunpaddies">
					<?php echo date('j F Y', $resolution_expiry_date); ?>
				</span>.

			</p>

			<p class="short">

				This certificate was issued in

				<span class="undiesunpaddies">

					<?php echo the_field('place_of_issuance');?>

				</span>

				on

				<span class="undiesunpaddies">

					 <?php echo $issue_date->format('d F Y'); ?>.

				</span>

			<?php if ($course->ID !== 81) : ?>

			</p>

			<p class="short">

			<?php endif; ?>

				This certificate is valid until

				<span class="undiesunpaddies">
					
					<?php  
						if ( $course->ID === 17570 ) {
							echo $expiry_date_3_years;
						} else {
							echo $expiry_date;
						}
					?>

				</span>

			</p>

			<div class="qr-code">
				<div id="qr-code"></div>
				<div class="scan-to-verify">
					<p>
						Scan to Verify or Verify Online at http://pmts.com.pa/check
						<br>
						Rev. (05/18)
					</p>
				</div>
			</div>

			<div class="signature-cert-codes">
				
				<div class="signature">
					<hr>
					<p class="short-margin">Agustin Gonzalez</p>
					<p class="short-margin">Academic Director</p>
					<p class="short-margin">R-CE1-01</p>
				</div>
				
			</div>

		</div>

		<?php if (current_user_can( 'edit_pages' ) ) : ?>

			<div class="edit-certificate-form edit-section">

				<?php 
					$certificate_options = array(
						'updated_message' => __("Certificate Updated", 'certificate-system'),
					);

					acf_form($certificate_options);

				?>

			</div>

		<?php endif; ?>

	<?php endwhile; endif; ?>

	</div>

</div>
