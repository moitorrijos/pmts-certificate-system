<div class="main">

	<div class="main-content">
		
		<?php

			if( have_posts() ) : while( have_posts() ) : the_post();
			the_title('<h1>', '</h1>'); endwhile;
			endif; wp_reset_query();

		?>

		<?php get_template_part('templates/buttons-div'); ?>

		<table class="download-xls-table">
			<thead>
				<tr>
					<th class="middle-title">Participant's Name</th>
					<th class="short-title">Passport/ID No.</th>
					<th>Course taken</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th class="short-title">Instructor</th>
					<th>Place of training</th>
					<th>Date of Issue</th>
					<th class="short-title">Register Code</th>
				</tr>
			</thead>
			<tbody>
					
				<?php 
					$args = array( 'post_type' => 'certificates', 'posts_per_page' => '25' );
					$certs = new WP_Query($args);
					if ( $certs->have_posts() ) : while ( $certs->have_posts() ) : $certs->the_post();

					$course = get_field('course');

					$instructor = get_field('instructor');

					$start_date = DateTime::createFromFormat( 'Ymd', get_field('start_date') );

					$end_date = DateTime::createFromFormat( 'Ymd', get_field('end_date') );

					$issue_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance') );

					$issue_month = $issue_date->format('m');

					$issue_year = $issue_date->format('y');

				?>

				<tr>
					<td>
						<a href="<?php echo the_permalink(); ?>">
							<?php echo the_field('name'); ?>
						</a>
					</td>
					<td class="centered">
						<?php echo the_field('passport_id'); ?>
					</td>
					<td class="centered">
						<?php echo get_the_title($course->ID); ?>
					</td>
					<td class="centered">
						<?php echo $start_date->format('d F Y'); ?>
					</td>
					<td class="centered">
						<?php echo $end_date->format('d F Y'); ?>
					</td>
					<td class="centered">
						<?php echo get_the_title($instructor->ID); ?>
					</td>
					<td class="centered">
						<?php echo the_field('place_of_training'); ?>
					</td>
					<td class="centered">
						<?php echo $issue_date->format('d F Y'); ?>
					</td>
					<td class="centered">
						<?php echo 'PMTS/' . $course->abbr . '/' . $issue_year . '-' . $issue_month . '-00' . $course->ID; ?>
					</td>
				</tr>

				<?php endwhile; else : ?>

				<tr>
					<td> No data. </td>
					<td> No data. </td>
					<td> No data. </td>
					<td> No data. </td>
					<td> No data. </td>
					<td> No data. </td>
					<td> No data. </td>
					<td> No data. </td>
				</tr>

				<?php endif; ?>
			</tbody>
		</table>

	</div>

</div>