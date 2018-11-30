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
			if ( have_posts() ) : while ( have_posts() ) : the_post();

			setlocale(LC_ALL, 'es_ES');

			$instructor_initial = get_field('name_of_the_instructor_initial');
			$course_initial = get_field('name_of_the_course_initial');
			$start_date_ymd = get_field('start_date_of_the_course_initial');
			$end_date_ymd = get_field('end_date_of_the_course_initial');
			$start_date = DateTime::createFromFormat( 'Ymd', $start_date_ymd)->format('d/m/Y');
			$end_date = DateTime::createFromFormat('Ymd', $end_date_ymd)->format('d/m/Y');
			$end_date_timestamp = strtotime( $end_date );
		?>
			<div class="initial-report view-section">
				<div class="report-company-logo">
					<?php get_template_part('templates/logo_image'); ?>
					<div class="report-company-info">
						<h2>Panama Maritime Training Services, Inc.</h2>
						<p>77th Street, San Francisco InterMaritime Building</p>
						<p>Local Phone: +(507) 395-2801 / +(507) 322-0013</p>
						<p>E-Mail: info@panamamaritimetraining.com</p>
						<p>Web: www.panamamaritimetraining.com</p>
					</div>
					<table class="report-table">
						<tbody>
							<tr>
								<td>Code:</td>
								<td>R-FO1-11</td>
							</tr>
							<tr>
								<td>Review:</td>
								<td>0</td>
							</tr>
							<tr>
								<td>Date:</td>
								<td contenteditable="true"><?php echo date('d/m/Y'); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
				<h2 class="centered">Start of Classes Announcement Report</h2>
				<h3>I. General Information</h3>
				<table class="system report-table">
					<tbody>
						<tr>
							<td>Name of the Course:</td>
							<td><?php echo $course_initial->post_title; ?></td>
						</tr>
						<tr>
							<td>Start Date:</td>
							<td><?php echo $start_date; ?></td>
						</tr>
						<tr>
							<td>End Date:</td>
							<td><?php echo $end_date; ?></td>
						</tr>
						<tr>
							<td>Name of Trainer:</td>
							<td><?php echo $instructor_initial->post_title; ?></td>
						</tr>
					</tbody>
				</table>
				<h3>2. Theoretical Section</h3>
				<table class="system report-table">
					<tbody>
						<tr>
							<td>Number of Planned Hours of the Course</td>
							<td contenteditable="true"><?php echo $course_initial->duration_hours; ?></td>
						</tr>
					</tbody>
				</table>
				<h3>3. Practice Section</h3>
				<table class="system report-table">
					<tbody>
						<tr>
							<td>Number of planned practice hours:</td>
							<td contenteditable="true">
								<?php echo $course_initial->practice_duration_hours; ?>
							</td>
						</tr>
						<tr>
							<td>Place of practice:</td>
							<td contenteditable="true">
								<?php if ($course_initial->ID == 91) { 
									echo 'IJA Pool'; 
								} elseif ($course_initial->ID == 96 || $course_initial->ID == 49) {
									echo 'PMTIC Building';
								} else {
									echo 'PMTS Building';
								}
								?>
							</td>
						</tr>
						<tr>
							<td>Date of practice:</td>
							<td contenteditable="true">
								<?php echo $end_date; ?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		<?php endwhile; endif; wp_reset_query(); ?>
		<h3>4. List of Participants</h3>
		<?php
			global $wpdb;
			$application_ids = $wpdb->get_results("
				select post_id 
				from fytv_postmeta 
				where meta_key 
				like 'courses_app_%_course_name_app' 
				and meta_value=".(int)$course_initial->ID." 
				and post_id in 
					(select post_id 
					from fytv_postmeta 
					where meta_key 
					like 'courses_app_%_instructor_name_app' 
					and meta_value=".(int)$instructor_initial->ID." 
					and post_id in 
						(select post_id 
						from fytv_postmeta 
						where meta_key like 'courses_app_%_end_date_app' 
						and meta_value=".$end_date_ymd." 
						and post_id in 
							(select distinct post_id 
							from fytv_postmeta 
							where meta_key 
							like 'courses_app_%_start_date_app' 
							and meta_value=".$start_date_ymd.")));
			", ARRAY_N);
			if ($application_ids) :
		?>
			<table class="system ">
				<thead>
					<tr>
						<th class="short-number">No.</th>
						<th class="title">Name of Participant</th>
						<th class="title">Id No./Passport No.</th>
						<th class="title">Nationality</th>
					</tr>
				</thead>
				<tbody>
				<?php foreach ($application_ids as $key=>$application_id ) : ?>
				<?php 
					$participants_name = get_field('participants_name_app', $application_id[0]);
					$participants_nationality = get_field('nationality_app', $application_id[0]);
					$participants_id = get_field('passport_id_app', $application_id[0]);
				?>
				<tr>
					<td class="centered"><?php echo (int)$key+1; ?></td>
					<td><?php echo $participants_name; ?></td>
					<td class="centered"><?php echo $participants_id; ?></td>
					<td class="centered"><?php echo $participants_nationality; ?></td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		<?php else : ?>
				<p class="error-message">There are no participants for this course, please check dates and instructor!</p>
		<?php endif; ?>
		<div class="general-director" style="background: url('<?php echo IMAGESPATH; ?>/general-director-signature.svg') no-repeat; background-size: 240px 120px; background-position: center bottom; overflow:visible; padding-top: 5px;" >
			<div class="signature-line"></div>
			<p class="super-short">
				Agustin Gonzalez <br>
				Academic Director
			</p>
		</div>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="edit-initial-report-form edit-section">
				<?php
					$report_options = array(
						'updated_message' => __("Report Updated", 'certificate-system'),
					);
					acf_form($report_options);
				?>
			</div>
		<?php endwhile; endif; wp_reset_query(); ?>
		
	</div>
</div>