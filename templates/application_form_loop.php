<div class="main">
	
	<div class="main-content">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<h1><?php the_title(); ?></h1>

		<?php endwhile; endif; wp_reset_query(); ?>

		<?php 

		get_template_part('templates/buttons-div');

		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

		$application_form_args = array(

			'post_type'			=> 'applications',
			'posts_per_page'	=> 30,
			'paged'				=> $paged,

		);

		$application_forms = new WP_Query($application_form_args);

		if ( $application_forms->have_posts() ) :

			


	 	?>

		<table class="system">
			
			<thead>
				
				<tr>
					<th class="middle-title">Participant's Name</th>
					<th class="short-title">Passport/ID No.</th>
					<th class="middle-title">Application Code</th>
					<th class="title">Courses Taken</th>
					<?php if ( current_user_can('edit_pages') ) : ?>
						<th class="number">
							Edit
						</th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody>
				
				<?php 

					while ( $application_forms->have_posts() ) : 

						$application_forms->the_post(); 
						
						$participants_name = get_field('participants_name_app');

						$participants_id = get_field('passport_id_app');

				?>

					<tr>
						<td>
							<a href="<?php the_permalink(); ?>">
								<?php echo $participants_name; ?>
							</a>
						</td>
						<td class="centered">
							<?php echo $participants_id; ?>
						</td>
						<td class="centered">
							<a href="<?php echo the_permalink(); ?>">
								<?php echo the_title(); ?>
							</a>
						</td>
						<td class="centered">
							<?php 

								if ( have_rows('courses_app') ) : 

								while( have_rows('courses_app') ) : the_row(); 
								
								$courses = get_sub_field('course_name_app');

								if (get_row_index() != 1) { echo ', '; }

								echo $courses->abbr;

								endwhile; endif;
							?>

						</td>
						<?php if ( current_user_can( 'edit_pages' ) ) : ?>
							<td class="centered edit">
								<a href="<?php echo the_permalink(); ?>" class="edit-form">
									<i class="fa fa-pencil-square-o"></i>
								</a>
							</td>
						<?php endif; ?>
					</tr>

				<?php endwhile; else : ?>

				<p>No Applications created, please <a href="<?php echo home_url('/application-forms/new-application-form/') ?>">click here to create aplication...</a></p>

			</tbody>

		</table>

		<?php endif; ?>

	</div>

</div>