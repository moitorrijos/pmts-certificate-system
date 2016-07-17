<?php get_template_part('templates/search_by_id_no_form'); ?>

<?php get_template_part('templates/search_by_instructor_course'); ?>

<div class="main">

	<div class="main-content" id="search-list">
		
		<h1>Panama Certificates</h1>
		<p class="centered long">All Offices</p>


		<?php 
			get_template_part('templates/buttons-div');

			$instructor_id_filter = 0;
			$course_id_filter = 0;
			$start_date_filter = 0;
			$end_date_filter = 0;

			$all_certs_args = array( 
				'post_type' 		=> 'certificates',
				'posts_per_page' 	=> -1,
				'meta_key' 			=> 'register_code',
				'orderby'			=> 'meta_value_num',
				'order'				=> 'ASC',
				'meta_query' => array(
					array(
						'key'     => 'instructor',
						'value'   => (int) $instructor_id_filter,
					),
					array(
						'key'     => 'course',
						'value'   => (int) $course_id_filter,
					),
					array(
						'key'	=> 'date_of_issuance',
						'value'	=> array( (int) $start_date_filter, (int) $end_date_filter),
						'type'	=> 'numeric',
						'compare' => 'BETWEEN'
					)
				),
			);

			$certs = new WP_Query($all_certs_args);

			if ( $certs->have_posts() ) : 

		?>

				<table class="system download-xls-table">
					<thead>
						<tr>
							<th class="short-short-number">No.</th>
							<th class="middle-title">Register Code</th>
							<th class="middle-title">Participant's Name</th>
							<th class="short-title">Nationality</th>
							<th class="short-title">Passport/ID No.</th>
							<th class="number">Abbr</th>
							<th class="number">Start Date</th>
							<th class="number">End Date</th>
							<th class="short-title sort" data-sort="instructor-name">
								Instructor
							</th>
							<th class="number">Issue Date</th>
							<th class="number">Office</th>
							<?php if ( current_user_can('edit_pages') ) : ?>
								<th class="number">Edit</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody class="list">

					<?php while ( $certs->have_posts() ) : $certs->the_post(); ?>

					<?php 

						$edit = '<i class="fa fa-pencil-square-o"></i>';
						$course = get_field('course');
						$instructor = get_field('instructor');
						$office = get_field('office');
						$start_date = DateTime::createFromFormat( 'Ymd', get_field('start_date') );
						$end_date = DateTime::createFromFormat( 'Ymd', get_field('end_date') );
						$issue_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance') );
						$issue_month = $issue_date->format('m');
						$issue_year = $issue_date->format('y');
						$post_date = get_the_date( date('d/m/y'), get_the_ID() );
						$register_code =  get_post_meta(get_the_ID(), 'register_code', true);

					?>

						<tr>
							<td class="centered">
								<?php echo $certs->current_post + 1; ?>
							</td>
							<td class="centered list-col-4">
								<?php echo 'PMTS/' . $course->abbr . '/' . $issue_year . '-' . $office->slug . '-' . add_leading_zeroes($register_code) . $register_code; ?>
							</td>
							<td class="list-col-1">
								<a href="<?php echo the_permalink(); ?>">
									<?php echo the_field('students_name'); ?>
								</a>
							</td>
							<td class="centered nationality">
								<?php echo the_field('student_nationality'); ?>
							</td>
							<td class="centered list-col-2">
								<?php echo the_field('passport_id'); ?>
							</td>
							<td class="centered abbr">
								<?php echo $course->abbr; ?>
							</td>
							<td class="centered">
								<?php echo $start_date->format('d/m/y'); ?>
							</td>
							<td class="centered">
								<?php echo $end_date->format('d/m/y'); ?>
							</td>
							<td class="centered list-col-3 instructor-name">
								<?php echo get_the_title($instructor->ID); ?>
							</td>
							<td class="centered">
								<?php echo $issue_date->format('d/m/y'); ?>
							</td>
							<td class="centered list-col-4">
								<?php echo $office->name; ?>
							</td>

							<?php if ( current_user_can('edit_pages') ) : ?>
								<td class="centered edit">
									<a href="<?php echo the_permalink(); ?>/#acf-form" class="edit-form"><?php echo $edit; ?></a>
								</td>
							<?php endif; ?>

						</tr>

					<?php endwhile; ?>
			
			</tbody>

		</table>
		
		<div class="paginate">
			<p>Page:</p>
			<ul class="pagination"></ul>
		</div>

		<?php else: ?>
			
			<p>Insert Instructor, Course and start and end date to view table.</p>

		<?php endif; ?>

	</div>

</div>