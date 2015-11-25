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

<div class="the-test">

	<h2>Answer Sheet for <?php echo get_the_title($course->ID); ?></h2>

	<div class="half">
		<p>
			Taken by (Participant's Name):
			<span class="undies"><?php echo the_field('name'); ?></span>
		</p>

	</div>

	<div class="half">
		<p>
			Participant's ID/Passport No.:
			<span class="undies"><?php echo the_field('passport_id'); ?></span>
		</p>
	</div>

	<div class="half">
		<p>
			Participant's Place of Birth:
			<span class="undies"><?php echo the_field('place_of_birth'); ?></span>
		</p>
	</div>

	<div class="half">
		<p>
			Participant's Date of Birth:
			<span class="undies"><?php echo the_field('date_of_birth'); ?></span>
		</p>
	</div>

	<div class="half">
		<p>
			Participant's Rank:
			<span class="undies">
				<?php echo the_field('rank'); ?> * * *
			</span>
		</p>
	</div>

	<div class="half">
		<p>
			Place of Training:
			<span class="undies"><?php echo get_the_title( $office->ID ); ?></span>
		</p>
	</div>

	<div class="half">
		<p>
			Start Course Date:
			<span class="undies"><?php echo $start_date->format('d F Y'); ?></span>
		</p>
	</div>

	<div class="half">
		<p>
			End Course Date:
			<span class="undies"><?php echo $end_date->format('d F Y'); ?></span>
		</p>
	</div>

	<div class="full">
		<h3>Test Results</h3>
		<!-- Test Results Table -->

		<table class="test-results">
			<thead>
				<tr>
					<th class="middle-title centered">Question</th>
					<th class="short-title centered">Answer</th>
				</tr>
			</thead>
			<tbody>
			<?php for ($i = 1; $i <= 25; $i++) : ?>
				<tr>
					<td>Question <?php echo $i; ?></td>
					<td class="centered">&#10004;</td>
				</tr>
			<?php endfor; ?>
			</tbody>
			<tfoot>
				<tr>
					<td class="result">Result</td>
					<td class="percent">100%</td>
				</tr>
			</tfoot>
		</table>

	</div>
	
	<div class="signature">
		<p class="short-margin">Participant Signature</p>
	</div>

	<div class="certificate-codes">
		<p><span class="boldies">(10/15) Rev. 14</span> <span class="boldies to-right">F-TI-02</span></p>
	</div>

</div>

<?php endwhile; endif; ?>