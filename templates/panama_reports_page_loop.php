<div class="main">
	
	<div class="main-content" id="search-list">
		
		<h1>Panama Reports</h1>

		<?php 

			get_template_part('templates/buttons-div');
			get_template_part('templates/search-bar');

			$reports_query_args = array(
				'post_type'		=> 'reports',
				'post_per_page' => -1,
			);

			$reports_query = new WP_Query( $reports_query_args );

			if ( $reports_query->have_posts() ) :

		?>

		<table class="system download-xls-table">
			
			<thead>

				<tr>
					<th class="middle-title">Instructor's Name</th>
					<th class="short-title">Date of Course</th>
					<th class="short-title">Place of Course</th>
					<th class="middle-title">Report No.</th>
				</tr>

			</thead>

			<tbody class="list">
				
				<?php 

				while ( $reports_query->have_posts() ) : $reports_query->the_post();

				$course = get_field('name_of_the_course');
				$instructor = get_field('name_of_the_instructor');
				$course_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_the_course') );
				$office = get_field('office');

				?>
				<tr>
					
					<td class="list-col-2">
						<a href="<?php echo get_permalink() ?>">
							<?php echo get_the_title( $instructor->ID ); ?>
						</a>
					</td>
					<td class="centered list-col-3">
						<?php echo $course_date->format('d/m/y'); ?>
					</td>
					<td class="centered list-col-4">
						<?php echo $office->name; ?>
					</td>
					<td class="centered list-col-1">
						<?php echo get_the_title(); ?>
					</td>

				</tr>

				<?php endwhile; ?>

			</tbody>

		</table>

		<div class="paginate">
			<p>Page:</p>
			<ul class="pagination"></ul>
		</div>

		<?php else : ?>

		<p>There are no reports created yet. To create a new report 

		<a href="<?php echo home_url(); ?>">click here</a>.

		</p>

		<?php endif; wp_reset_query(); ?>

	</div>

</div>