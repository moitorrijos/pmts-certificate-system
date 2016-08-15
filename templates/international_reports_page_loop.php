<div class="main">
	
	<div class="main-content" id="search-list">
		
		<h1>International Reports</h1>

		<?php 

			get_template_part('templates/buttons-div');
			get_template_part('templates/search-bar');

			// $instructor = 'Rapitis Georgios';
			// $course = 'Proficiency in Personal Survival Techniques';

			$filter_certs_args = array(

					'post_type'			=> 'certificates',
					'posts_per_page'	=> -1,
					'meta_key' 			=> 'register_code',
					'orderby'			=> 'meta_value_num',
					'order'				=> 'ASC',
					'meta_query'		=> array(
						array(
							'key'     	=> 'instructor',
							//'value'   => (int) $instructor->ID,
							'value'   	=> 579,
						),
						array(
							'key'     	=> 'course',
							// 'value'   => (int) $course->ID,
							'value'   	=> 91,
						)
					)
				);

				$report_certs = new WP_Query( $filter_certs_args );

			if ( $report_certs->have_posts() ) :

		?>

		<table class="system download-xls-table">

			<thead>

				<tr>
					<th class="short-short-number">No.</th>
					<th class="middle-title">Certificate No.</th>
					<th class="middle-title">Participant's Name</th>
					<th class="short-title">Nationality</th>
					<th class="short-title">Passport/ID No.</th>
				</tr>

			</thead>

			<tbody class="list">
				
				<?php 

				while ( $report_certs->have_posts() ) : $report_certs->the_post();

				$course = get_field('course');
				$office = get_field('office');
				$register_code =  get_post_meta(get_the_ID(), 'register_code', true);
				$issue_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance') );
				$issue_year = $issue_date->format('y');

				?>
				<tr>
					
					<td class="centered">
						<?php echo $report_certs->current_post + 1; ?>
					</td>
					<td class="centered">
						<?php echo 'PMTS/' . $course->abbr . '/' . $issue_year . '-' . $office->slug . '-' . add_leading_zeroes($register_code) . $register_code; ?>
					</td>
					<td class="centered">
						<?php echo the_field('students_name'); ?>
					</td>
					<td class="centered">
						<?php echo the_field('student_nationality'); ?>
					</td>
					<td class="centered">
						<?php echo the_field('passport_id'); ?>
					</td>

				</tr>

				<?php endwhile; ?>

			</tbody>

		</table>

		<?php else : ?>

		<p>There are no reports created yet. To create a new report 

		<a href="<?php echo home_url('/panama-reports/new-panama-reports/'); ?>">click here</a>.

		</p>

		<?php endif; wp_reset_query(); ?>

	</div>

</div>