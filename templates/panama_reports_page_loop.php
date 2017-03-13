<div class="main">
	
	<div class="main-content" id="search-list">
		
		<h1>Panama Reports</h1>

		<?php 

			get_template_part('templates/buttons-div');

			$report_paged = ( get_query_var('paged') ) ? intval(get_query_var('paged')) : 1;

			$all_reports_args = array(
				'post_type' 		=> 'reports',
				'posts_per_page' 	=> 30,
				'meta_key' 			=> 'date_of_the_course',
				'orderby'			=> 'meta_value_num',
				'order'				=> 'DESC',
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
					<th class="number">Course Issue Date</th>
					<th class="short-number">Students</th>
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
					$course = get_field('name_of_the_course');
					$instructor = get_field('name_of_the_instructor');
					$date_of_course = DateTime::createFromFormat('Ymd', get_field('date_of_the_course'));
				?>

				<tr>
					<td>
						<a href="<?php echo the_permalink(); ?>">
							<?php echo $course->post_title . ' (' . $course->abbr . ')'; ?>
						</a>
					</td>
					<td class="centered">
						<?php echo $instructor->post_title ?>
					</td>
					<td class="centered">
						<?php echo $date_of_course->format('j F, Y'); ?>
					</td>
					<td class="centered">
						<?php 
							echo get_participant_number($instructor->ID, $course->ID, get_field('date_of_the_course'));
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

		<p>There are no reports created yet. To create a new report 

		<a href="<?php echo home_url('/panama-reports/new-panama-reports/'); ?>">click here</a>.

		</p>

		<?php endif; wp_reset_query(); ?>

	</div>

</div>