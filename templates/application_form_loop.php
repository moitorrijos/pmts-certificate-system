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
						<th class="number">Edit</th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody>
				
				<?php while ( $application_forms->have_posts() ) : $application->the_post(); ?>

					<tr>
						<td>Hello</td>
						<td class="centered">Hello</td>
						<td class="centered">Hello</td>
						<?php if ( current_user_can( 'edit_pages' ) ) : ?>
							<td class="centered edit">Edit</td>
						<?php endif; ?>
					</tr>

				<?php endwhile; else : ?>

				<p>No Applications created, please <a href="<?php echo home_url('/application-forms/new-application-forms/') ?>">click here to create aplication...</a></p>

			</tbody>

		</table>

		<?php endif; ?>

	</div>

</div>