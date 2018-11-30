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
			$start_date = get_field('start_date_of_the_course_initial');
			$start_date_timestamp = strtotime( $start_date );
			$end_date = get_field('end_date_of_the_course_initial');
			$end_date_timestamp = strtotime( $end_date );
		?>
			<div class="initial-report view-section">
				<ul>
					<li><?php echo $instructor_initial->post_title; ?></li>
					<li><?php echo $course_initial->post_title; ?></li>
					<li>Start date Ymd: <?php echo $start_date; ?></li>
					<li><?php echo strftime('%e de %B de %Y', $end_date_timestamp);?></li>
				</ul>
			</div>
		<?php endwhile; endif; wp_reset_query(); ?>

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
						and meta_value=".$end_date." 
						and post_id in 
							(select distinct post_id 
							from fytv_postmeta 
							where meta_key 
							like 'courses_app_%_start_date_app' 
							and meta_value=".$start_date.")));
			", ARRAY_N);
			if ($application_ids) :
		?>
			<ul>
				<?php foreach ($application_ids as $application_id ) : ?>
				<?php 
					$participants_name = get_field('participants_name_app', $application_id[0]);
					$participants_nationality = get_field('nationality_app', $application_id[0]);
					$participants_id = get_field('passport_id_app', $application_id[0]);
				?>
				<li><?php echo $participants_name 
						. ' ' . 
						$participants_nationality 
						. ' ' .
						$participants_id; ?>
				</li>
				<?php endforeach; ?>
			</ul>
		<?php else : ?>
			<p class="error-message">
				There are no participants for this course, please check instructor and date information.
			</p>
		<?php endif; ?>

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