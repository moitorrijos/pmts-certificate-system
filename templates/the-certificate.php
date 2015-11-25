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

			$certificate_ID = get_the_ID();

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
					This course fulfills minimum requirements of <span class="unpaddies"><?php echo $course->regulation; ?></span> of the IMO International Convention on Standards of Training, Certification and Watchkeeping for Seafarers, 1978, as amended. <br><span class="unpaddies">IMO Model Course <?php echo $course->imo_no; ?></span>
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

		<hr class="separator">

		<div class="the-test">

			<table class="test-header">
				<tbody>
					<tr>
						<td>
							<h2>Panama Maritime Training Services, Inc.</h2>
							<p>Computer Based Test Resutls for <?php echo get_the_title($course->ID); ?> Course IMO No. <?php echo $course->imo_no; ?></p>
						</td>
						<td rowspan="2">
							<ul>
								<li>Code: ATT</li>
								<li>Revision: 02</li>
								<li>Date: 12/12/2015</li>
								<li>Pages 1 of 1</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td>
							<p>Date of Examination: <?php echo $issue_date->format('d F Y'); ?></p>
						</td>
					</tr>
				</tbody>
			</table>

			<p>Participant's Information: </p>

			<table class="participant-information">
				<tbody>
					<tr>
						<td>
							<p>Name:</p>
							<p class="participant-info"><?php echo the_field('name'); ?></p>
						</td>
						<td>
							<p>Passport/ID No.:</p>
							<p class="participant-info"><?php echo the_field('passport_id'); ?></p>
						</td>
						<td>
							<p>Date and Place of Birth:</p>
							<p class="participant-info"><?php echo the_field('date_of_birth'); ?> <?php echo the_field('place_of_birth'); ?></p>
						</td>
					</tr>
					<tr>
						<td>
							<p>Place of Training:</p>
							<p class="participant-info"><?php echo get_the_title( $office->ID ); ?></p>
						</td>
						<td>
							<p>Start Date:</p>
							<p class="participant-info"><?php echo $issue_date->format('d F Y'); ?></p>
						</td>
						<td>
							<p>End Date:</p>
							<p class="participant-info"><?php echo $end_date->format('d F Y'); ?></p>
						</td>
					</tr>
				</tbody>
			</table>

			<div class="full">
				<h3>Test Specifications (as seen on computer based test):</h3>
				<ul>
					<li>The participant has up to 60 minutes to finish the test.</li>
					<li>The test is taken in computer based program.</li>
					<li>Test is carried out without assistance</li>
					<li>Scoring is from 0 to 100%. Minimum 70% to pass.</li>
					<li>Multiple choice exam, click the correct answer.</li>
					<li>Voluntarily fiil out evaluation form at the end of the test for instructor and course. (If form is not filled we assume you are completely satisfied with the training services).</li>
					<li>Each answer has a score of 4 percent (25 questions).</li>
					<li>For questions refer to computer based test.</li>
				</ul>
			</div>

			<div class="full">
				<h3>Answers</h3>
				<!-- Test Results Table -->
				<ul class="answers">
					<?php for ($i = 1; $i <= 25; $i++) : ?>
						<li>Question <?php echo $i ?>: <span class="answer">Correct</span></li>
					<?php endfor; ?>
					
				</ul>
			</div>

			<div class="test-score-result">
				<p>Test Score: <span class="final-test-score">100%</span> <span class="passed">Passed</span></p>
			</div>

			<div class="full"></div>
			
			<div class="signature">
				<p>General Director</p>
			</div>

			<div class="full"></div>

		</div>

		<hr class="separator">

		<div class="the-test">
			<table class="test-header">
				<tbody>
					<tr>
						<td>
							<h2>Panama Maritime Training Services, Inc.</h2>
							<p>Practical Evaluation Criteria for <?php echo get_the_title($course->ID); ?> <span class="imo-course-heading">IMO Model Course No. <?php echo $course->imo_no; ?></span></p>
						</td>
						<td rowspan="2">
							<ul>
								<li>Code: EXAM</li>
								<li>Revision: 02</li>
								<li>Date: 12/12/2015</li>
								<li>Pages 1 of 1</li>
							</ul>
						</td>
					</tr>
					<tr>
						<td>
							<p>Date of Examination: <?php echo $issue_date->format('d F Y'); ?></p>
						</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="edit-certificate-form">
			<?php acf_form(); ?>
		</div>

	<?php endwhile; endif; ?>

	</div>
	
</div>