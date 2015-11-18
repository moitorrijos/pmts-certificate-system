<div class="main">

	<div class="main-content">
		
		<div class="buttons">

			<a href="<?php echo home_url('panama-certificates'); ?>" class="back-link"><i class="fa fa-backward"></i>&nbsp;
				Back to Certificates List
			</a>&nbsp;

			<a href="#0" class="edit-button"><i class="fa fa-pencil"></i>&nbsp;
				Edit Certificate
			</a>&nbsp;

			<a href="#0" class="print-button"><i class="fa fa-print"></i>&nbsp;
				Print Certificate
			</a>

		</div>

		<?php

			if ( have_posts() ) : while ( have_posts() ) : the_post();

			$course = get_field('course');

			$instructor = get_field('instructor');

			$office = get_field('office');

			$start_date = DateTime::createFromFormat( 'Ymd', get_field('start_date') );

			$end_date = DateTime::createFromFormat( 'Ymd', get_field('end_date') );

			$issue_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance') );

			$issue_month = $issue_date->format('m');

			$issue_year = $issue_date->format('y');

			$certificate_ID = $certificate_ID;

		?>

		<div class="certificate">

			<h3 class="certify">Certify that:</h3>
			
			<h1 class="participant-name"> * * * <?php echo the_field('name'); ?> * * * </h1>

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
					<span class="undies">* * * <?php echo the_field('place_of_birth'); ?>, <?php echo the_field('date_of_birth'); ?> * * *</span>
				</p>

			</div>
 			<div class="half">
					
				<p class="short">
					Course Timetable: 
					<span class="undies"><?php echo 'CT/' . $issue_year . '-0' . $office->number . '-' . '0' . ( intval($course->ID) - intval($certificate_ID) ); ?> * * * </span>
				</p>

			</div>

			<div class="half">

				<p class="short">
					Register Code:
					<span class="undies"><?php echo 'PMTS/' . $course->abbr . '/' . $issue_year . '-0' . $office->number . '-0' . get_the_ID(); ?> * * * </span>
				</p>

			</div>

			<div class="full">
	
				<p>
					This course fulfills minimum requirements of <span class="unpaddies"><?php echo $course->regulation; ?></span> of the IMO International Convention on Standards of Training, Certification and Watchkeeping for Seafarers, 1978, as amended. <span class="unpaddies">IMO Model Course <?php echo $course->imo_no; ?></span>
				</p>
				
			</div>

			<div class="half">
				
				<p class="short">
					Start Course Date:
					<span class="undies"><?php echo $start_date->format('d F Y'); ?></span>
				</p>

				<p>
					Course Delivery Mode:
					<span class="undies">In Classroom</span>
				</p>
			</div>

			<div class="half">
				
				<p class="short">
					End Course Date:
					<span class="undies"><?php echo $end_date->format('d F Y'); ?></span>
				</p>
				

				<p>
					Place of Training:
					<span class="undies"><?php echo get_the_title( $office->ID ); ?></span>
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
						 <?php echo $issue_date->format('d F Y'); ?> 
					</span>
				</p>

			</div>

			<div class="signature">
				<p class="short-margin">General Director</p>
			</div>

			<div class="certificate-codes">
				<p><span class="boldies">(10/15) Rev. 14</span> <span class="boldies to-right">F-TI-02</span></p>
			</div>

		</div>

		<div class="edit-certificate-form">
			<?php acf_form(); ?>
		</div>

	<?php endwhile; endif; ?>

	</div>
	
</div>