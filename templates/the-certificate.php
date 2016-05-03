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

			<?php endif; ?>

			<a href="#0" class="print-button not-link"><i class="fa fa-print"></i>

				Print Certificate

			</a>

			<a href="#0" class="view-button not-link"><i class="fa fa-eye"></i>

				View Certificate

			</a>

			<a href="<?php echo home_url('panama-certificates/new-panama-certificate');?>" class="new-certificate-button">

				Create New Certificate
				
			</a>

		</div>

		<?php

			if ( have_posts() ) : while ( have_posts() ) : the_post();

			$students_name = get_field('students_name');

			$course = get_field('course');

			$instructor = get_field('instructor');

			$office = get_field('office');

			$start_date = DateTime::createFromFormat( 'Ymd', get_field('start_date') );

			$end_date = DateTime::createFromFormat( 'Ymd', get_field('end_date') );

			$issue_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance') );

			$expiry_date_timestamp = strtotime( '+5 years',  strtotime( get_field('date_of_issuance') ) );

			$expiry_date = date( 'd F Y', $expiry_date_timestamp );

			$issue_month = $issue_date->format('m');

			$issue_year = $issue_date->format('y');

			$no_posts = 196;

			$certificate_ID = get_the_id();

			$register_code =  get_post_meta(get_the_ID(), 'register_code', true);

			if ( $register_code > 9999 ) {

				$leading_zero = '';

			} elseif ( $register_code > 999 && $register_code < 9999 ) {

				$leading_zero = '0';

			} elseif ( $register_code > 99 && $register_code <= 999 ) {

				$leading_zero = '00';

			} elseif ( $register_code > 9 && $register_code <= 99 ) {

				$leading_zero = '000';

			} else {

				$leading_zero = '0000';
			}

		?>

		<div class="certificate">

			<h3 class="certify">Certify that:</h3>

			<h1 class="participant-name"> 
				<span class="stars">* * *</span>
			 	<?php echo ucwords($students_name); ?>
			 	<span class="stars">* * *</span>
			</h1>

			<p class="attended">Has satisfactorily attended course on:</p>

			<h2 class="course"><?php echo get_the_title($course->ID); ?></h2>

			<div class="full">

				<p class="short">

					Participant's Passport / ID No.:

					<span class="undies"> * * * <?php echo the_field('passport_id'); ?> * * * </span>

				</p>

			</div>

			<div class="full">

				<p>
					Participant's Place and Date of Birth:

					<span class="undies">* * * 
						<span class="paddies"><?php echo the_field('place_of_birth'); ?></span> 
						<?php echo the_field('date_of_birth'); ?> * * *</span>

				</p>

			</div>

			<div class="full">

                <p class="short">Register Code:

					<span class="undies">

						* * *<?php echo 'PMTS/' . $course->abbr . '/' . $issue_year . '-01-' . $leading_zero . $register_code; ?>* * * 

					</span>                 

				</p>

			</div>

			<div class="full">

				<p class="resolution-p">
					This course fulfills minimum requirements of
					
					<span class="unpaddies"><?php echo $course->regulation; ?></span>
					
					of the IMO International Convention on Standards of Training, Certification and Watchkeeping for Seafarers, 1978, as amended.
					
					<span class="unpaddies">
						<?php if ($course->imo_no) : ?>

							IMO Model Course <?php echo $course->imo_no; ?>.

						<?php endif; ?>

						Course duration <?php echo $course->duration; ?> days (<?php echo $course->duration_hours  ?> hours)

					</span>

				</p>

			</div>

			<div class="half">

                <p class="short">Start Course Date:

					<span class="undies bottom start-date"><?php echo $start_date->format('d F Y'); ?></span>

				</p>


				<p class="short">

					Course Delivery Mode:

					<span class="undies bottom delivery-mode">In Classroom</span>

				</p>

			</div>

			<div class="half">

				<p class="short">

					End Course Date:

					<span class="undies bottom end-date"><?php echo $end_date->format('d F Y'); ?></span>

				</p>

			</div>

			<div class="half">

				<p class="short">

					Place of Training:

					<span class="undies bottom place-of-training"><?php echo $office; ?></span>

				</p>

			</div>

			<div class="full">

				<p>

					This course has been approved by the Government of <span class="unpaddies">PANAMA</span>

					By means of Resolution

					<span class="unpaddies"><?php echo the_field('resolution'); ?></span>

					of

					<span class="unpaddies"><?php echo the_field('resolution_date'); ?></span>

				</p>

				<p>

					This certificate was issued in

					<span class="unpaddies">

						<?php echo the_field('place_of_issuance');?>

					</span>

					on

					<span class="unpaddies">

						 <?php echo $issue_date->format('d F Y'); ?>.

					</span>

				</p>

				<p>

					This certificate is valid until

					<span class="unpaddies">
						
						<?php echo $expiry_date; ?>

					</span>

				</p>

			</div>

			<div class="signature-cert-codes">
				
				<div class="signature">

					<p class="short-margin">General Director</p>

				</div>
		
				<div class="certificate-codes">

					<p>
						<span class="boldies">(10/15) Rev. 14</span>
						<?php if ( $course->f_ti ) : ?>
							<span class="boldies to-right">
								F-TI-<?php echo $course->f_ti;  ?>
							</span>
						<?php endif; ?>
					</p>

				</div>
				
			</div>


		</div>	

		<?php if (current_user_can( 'edit_pages' ) ) : ?>

			<div class="edit-certificate-form">

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
