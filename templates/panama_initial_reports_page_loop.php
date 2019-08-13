<div class="main">
	
	<div class="main-content" id="search-list">
		
		<?php 

			if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_title('<h1>', '</h1>');
			endwhile; endif;

		?>

		<div class="align-right">
			<a href="<?php echo home_url('/panama-reports/start-of-classes-report/new-start-of-classes-report/'); ?>" class="new-certificate-button not-link">
				<i class="fa fa-plus-square"></i>&nbsp; Create New Start of Class Report
			</a>
		</div>
		
		<?php

			get_template_part( 'templates/panama_reports_buttons' );

			$report_paged = ( get_query_var('paged') ) ? intval(get_query_var('paged')) : 1;

			$all_reports_args = array(
				'post_type' 		=> 'initial_reports',
				'posts_per_page' 	=> 30,
				'paged'				=> $report_paged,
			);

			$reports_query = new WP_Query( $all_reports_args );

			if ( $reports_query->have_posts() ) :

		?>

		<table class="system download-xls-table">

			<thead>
				<tr>
					<th class="middle-title">Name of the Course</th>
					<th class="number">Name of the Instructor</th>
					<th class="number">Start Course Date</th>
					<th class="number">End Course Date</th>
					<?php if ( current_user_can('edit_pages') ) : ?>
						<th class="short-short-number">Edit</th>
					<?php endif; ?>
				</tr>
			</thead>

			<tbody class="list">
				
				<?php
					while ( $reports_query->have_posts() ) : 
					$reports_query->the_post();
					$edit = '<i class="fa fa-pencil-square-o"></i>';
					$course = get_field('name_of_the_course_initial');
					$instructor = get_field('name_of_the_instructor_initial');
					$date_of_course = DateTime::createFromFormat('Ymd', get_field('start_date_of_the_course_initial'));
					$end_date_of_course = DateTime::createFromFormat('Ymd', get_field('end_date_of_the_course_initial'));
				?>

				<tr>
					<td>
						<a href="<?php echo the_permalink(); ?>">
							<?php 
								if($course)
									echo $course->post_title . ' (' . $course->abbr . ')'; 
							?>
						</a>
					</td>
					<td class="centered">
						<?php 
							if($instructor)
								echo $instructor->post_title;
						?>
					</td>
					<td class="centered">
						<?php 
							if ($date_of_course)
								echo $date_of_course->format('j F, Y'); 
						?>
					</td>
					<td class="centered">
						<?php 
							if ($end_date_of_course)
								echo $end_date_of_course->format('j F, Y'); 
						?>
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

		<?php if ($reports_query->max_num_pages > 1) : ?>
			<div class="paginate">
				<p>Page:</p>
				<ul class="pagination">
					<li><?php echo get_next_posts_link( 'Older Reports', $reports_query->max_num_pages ); ?></li>
					<li><?php echo get_previous_posts_link( 'Newer Reports' ); ?></li>
				</ul>
			</div>
		<?php endif; ?>

		<?php else : ?>

		<p>There are no start of class reports created yet. To create a new report 

		<a href="<?php echo home_url('/panama-reports/start-of-classes-report/new-start-of-classes-report/'); ?>">click here</a>.

		</p>

		<?php endif; wp_reset_query(); ?>

	</div>

</div>