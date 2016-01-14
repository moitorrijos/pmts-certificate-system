<div class="main">

	<div class="main-content">
		
		<?php

			if( have_posts() ) : while( have_posts() ) : the_post();
			the_title('<h1>', '</h1>'); endwhile;
			endif; wp_reset_query();

		?>

		<?php 
			get_template_part('templates/buttons-div');
			$args = array( 'post_type' => 'certificates', 'posts_per_page' => '25' );
			$certs = new WP_Query($args);

			if ( $certs->have_posts() ) :
		?>

		<table class="download-xls-table">
			<thead>
				<tr>
					<th class="middle-title">Participant's Name</th>
					<th class="short-title">Passport/ID No.</th>
					<th class="number">Course (Abbr)</th>
					<th class="number">Start Date</th>
					<th class="number">End Date</th>
					<th class="short-title">Instructor</th>
					<th>Office</th>
					<th class="number">Issue Date</th>
					<th class="middle-title">Register Code</th>
				</tr>
			</thead>
			<tbody>
					
			<?php 

				while ( $certs->have_posts() ) : $certs->the_post();

				$course = get_field('course');
				$instructor = get_field('instructor');
				$office = get_field('office');
				$start_date = DateTime::createFromFormat( 'Ymd', get_field('start_date') );
				$end_date = DateTime::createFromFormat( 'Ymd', get_field('end_date') );
				$issue_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance') );
				$issue_month = $issue_date->format('m');
				$issue_year = $issue_date->format('y');
				$no_posts = 196;

			?>

				<tr>
					<td>
						<a href="<?php echo the_permalink(); ?>">
							<?php echo the_field('participants_name'); ?>
						</a>
					</td>
					<td class="centered">
						<?php echo the_field('passport_id'); ?>
					</td>
					<td class="centered">
						<?php echo /*get_the_title($course->ID)*/$course->abbr; ?>
					</td>
					<td class="centered">
						<?php echo $start_date->format('d/m/y'); ?>
					</td>
					<td class="centered">
						<?php echo $end_date->format('d/m/y'); ?>
					</td>
					<td class="centered">
						<?php echo get_the_title($instructor->ID); ?>
					</td>
					<td class="centered">
						<?php echo $office; ?>
					</td>
					<td class="centered">
						<?php echo $issue_date->format('d/m/y'); ?>
					</td>
					<td class="centered">
						<?php echo 'PMTS/' . $course->abbr . '/' . $issue_year . '-01-0' . (intval( get_the_id() ) - $no_posts); ?>
					</td>
				</tr>

				<?php endwhile; else : ?>

				<p>There are no certificates yet. To create a new certificate <a href="<?php echo home_url( 'panama-certificates/new-panama-certificate' ); ?>">click here</a>.</p>

				<?php endif; ?>
			</tbody>
		</table>
	</div>


</div>