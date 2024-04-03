<div class="main">
	<div class="main-content">
		<div class="buttons">
			<a href="<?php echo home_url('/panama-reports/start-of-classes-report/'); ?>">
				&laquo;
				Back to Initial Reports Page
			</a>
			<a href="#0" class="edit-button not-link">
				<i class="fa fa-print"></i>
				Edit Report
			</a>
			<a href="#0" class="view-button not-link">
				<i class="fa fa-eye"></i>
				View Report
			</a>
			<a href="#0" class="print-button not-link">
				<i class="fa fa-print"></i>
				Print Report
			</a>
		</div>
		<?php
		if (have_posts()) : while (have_posts()) : the_post();

				setlocale(LC_ALL, 'es_ES');

				$instructor_initial = get_field('name_of_the_instructor_initial');
				$course_initial = get_field('name_of_the_course_initial');
				$course_days = $course_initial ? intval(get_field('duration', $course_initial->ID)) : '';
				$start_date_ymd = get_field('start_date_of_the_course_initial');
				$end_date_ymd = get_field('end_date_of_the_course_initial');
				$start_date = $start_date_ymd ? DateTime::createFromFormat('Ymd', $start_date_ymd)->format('d/m/Y') : '';
				$end_date = $end_date_ymd ? DateTime::createFromFormat('Ymd', $end_date_ymd)->format('d/m/Y') : '';
				$end_date_timestamp = strtotime($end_date);
				?>
				<div class="initial-report view-section">
				<table class="report-table">
					<thead>
						<tr>
							<th colspan="9">
								<div class="report-company-logo">
									<?php get_template_part('templates/logo_image'); ?>
									<div class="report-company-info">
										<h2>Panama Maritime Training Services, Inc.</h2>
										<h4>Control List of Theoretical Training Courses</h4>
										<p>Daily / Weekly Assistance for Training Courses</p>
										<p><strong>Course Name:</strong> <?php echo get_the_title($course_initial->ID); ?></p>
										<p><strong>Instructor:</strong> <?php echo get_the_title($instructor_initial->ID); ?></p>
										<p><strong>From:</strong> <?php echo $start_date; ?> <strong>To:</strong> <?php echo $end_date; ?></p>
									</div>
									<table class="system small">
										<tbody>
											<tr>
												<td class="title">Code:</td>
												<td>R-FO1-11</td>
											</tr>
											<tr>
												<td class="title">Revision:</td>
												<td>2</td>
											</tr>
											<tr>
												<td class="title">Date:</td>
												<td contenteditable="true"><?php echo $end_date; ?></td>
											</tr>
										</tbody>
									</table>
								</div>
							</th>
						</tr>
						<tr>
							<th class="short-number">No.</th>
							<th class="middle-title">Name</th>
							<th class="short-title">Id or Passport</th>
							<th class="number">Day 1</th>
							<th class="number">Day 2</th>
							<th class="number">Day 3</th>
							<th class="number">Day 4</th>
							<th class="number">Day 5</th>
							<th class="number">Day 6</th>
						</tr>
					</thead>
					<?php
				 		endwhile;
						endif;
						wp_reset_query();
						global $wpdb;

						$application_ids = $wpdb->get_results("
							select distinct post_id 
							from {$wpdb->prefix}postmeta 
							where meta_key 
							like 'courses_app_%_course_name_app' 
							and meta_value=" . (int)$course_initial->ID . " 
							and post_id in 
								(select distinct post_id 
								from {$wpdb->prefix}postmeta 
								where meta_key 
								like 'courses_app_%_instructor_name_app' 
								and meta_value=" . (int)$instructor_initial->ID . " 
								and post_id in 
									(select distinct post_id 
									from {$wpdb->prefix}postmeta 
									where meta_key like 'courses_app_%_start_date_app' 
									and meta_value=" . $start_date_ymd . " 
									and post_id in 
										(select distinct post_id 
										from {$wpdb->prefix}postmeta 
										where meta_key 
										like 'courses_app_%_end_date_app' 
										and meta_value=" . $end_date_ymd . ")))
							limit 0, 200;
						", ARRAY_N);
						// $application_ids = initial_reports($end_date_ymd, $start_date_ymd, $instructor_initial, $course_initial);

						$application_ids_nums = array_map('flatten_array', $application_ids);
						// var_dump($application_ids_nums); die;

						$applications_args = array(
							'post_type' => 'applications',
							'order' => 'DESC',
							'posts_per_page' => 50,
							'post__in' => $application_ids_nums,
						);
						$applications = new WP_Query( $applications_args );
						if ($applications->have_posts()) :
					?>
					<tbody>
						<?php 
							while($applications->have_posts()) : $applications->the_post();
							$participants_name = get_field('participants_name_app');
							$participants_nationality = get_field('nationality_app');
							$participants_id = get_field('passport_id_app');
							$student_digital_signature = get_field('student_digital_signature');
						?>
							<tr>
								<td class="centered"><?php echo (int)$applications->current_post + 1; ?></td>
								<td><a target="_blank" href="<?php echo get_permalink(); ?>"><?php echo $participants_name; ?></a></td>
								<td class="centered"><?php echo $participants_id; ?></td>
								<?php
									for ($i = 1; $i <= $course_days; $i++) :
										if ($i > 6) break;
								?>
									<td>
										<img
											style="
												width: <?php echo rand(90, 110); ?>%; 
												bottom: <?php echo rand(-10, -5);?>px; 
												left: <?php echo rand(-10, 0); ?>px; 
												transform: rotate(<?php echo rand(-15, 0);?>deg);" 
											src="<?php echo $student_digital_signature; ?>" 
											alt="">
										</td>
									<?php endfor; ?>
									<?php for ($i = $course_days; $i < 6; $i++) : ?>
										<td></td>
									<?php endfor; ?>
							</tr>
						<?php endwhile; ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="9">
								<div class="instructor-signatures">
									<div class="instructor-signature" style="background: url(<?php echo get_field('instructor_digital_signature', $instructor_initial->ID); ?>) no-repeat; background-size: 240px 120px; background-position: center top; overflow:visible; padding-top: 5px;">
										<div class="signature-line"></div>
										<p class="super-short" style="text-align: center;">
											<?php echo get_the_title($instructor_initial->ID); ?> <br>
											Instructor
										</p>
									</div>
									<div class="general-director" style="background: url(<?php echo get_field('instructor_digital_signature', 183); ?>) no-repeat; background-size: 240px 120px; background-position: center bottom; overflow:visible; padding-top: 5px;">
										<div class="signature-line"></div>
										<p class="super-short">
											Agustin Gonzalez <br>
											Academic Director
										</p>
									</div>
								</div>
							</td>
						</tr>
					</tfoot>
				</table>
			<?php else : ?>
				<p class="error-message">There are no participants for this course, please check dates and instructor!</p>
			<?php endif; ?>
			
		</div>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="edit-initial-report-form edit-section">
					<?php
					$report_options = array(
						'updated_message' => __("Report Updated", 'certificate-system'),
					);
					acf_form($report_options);
					?>
				</div>
			<?php endwhile;
	endif;
	wp_reset_query(); ?>

	</div>
</div>