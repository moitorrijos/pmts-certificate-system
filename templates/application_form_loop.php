<div class="main">
	
	<div class="main-content">

		<?php if ( isset($_SESSION['application_deleted']) ) : ?>

			<div class="modal-box danger">

				<p>The application was deleted successfully.</p>

			</div>

		<?php unset($_SESSION['application_deleted']); endif; ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<h1 style="font-size:3rem; color:red;"><?php the_title(); ?></h1>

		<?php endwhile; endif; wp_reset_query(); ?>

		<div class="back-create-buttons">
			
			<div class="back-button-link buttons">
					
				<a href="<?php echo get_permalink( 7188 ); ?>" class="back-link">
					&laquo;
					Back to Application List
				</a>
				
			</div>

			<?php get_template_part('templates/buttons-div');  ?>
			
		</div>


		<?php 

		get_template_part('templates/search_application_form');

		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

		$application_form_args = array(
			'post_type'			=> 'applications',
			'posts_per_page'	=> 10,
			'paged' 			=> $paged,
		);

		

		$application_forms = new WP_Query($application_form_args);

		if ( $application_forms->have_posts() ) :

	 	?>

		<table class="system">
			
			<thead>
				
				<tr>
					<th class="middle-title">Participant's Name</th>
					<th class="short-title">Passport/ID No.</th>
					<th class="short-title">Nationality</th>
					<th class="middle-title">Application Code</th>
					<th class="short-title">Created By</th>
					<th class="title">Courses Taken</th>
					<?php if ( current_user_can('edit_pages') ) : ?>
						<th class="number">
							Edit
						</th>
						<th class="number">
							Delete
						</th>
					<?php endif; ?>
				</tr>
			</thead>
			<tbody>
				
				<?php 
					while ( $application_forms->have_posts() ) : $application_forms->the_post(); 
					get_template_part( 'templates/application_form_table' );
					endwhile;
				 ?>

			</tbody>


		</table>
		<!-- pagination here -->
	    <?php
	      if (function_exists('custom_pagination')) {
	        custom_pagination( $application_forms->max_num_pages,"",$paged );
	      }
	    ?>

		<?php else : ?>

		<p>No Applications created, please <a href="<?php echo home_url('/application-forms/new-application-form/') ?>">click here to create aplication...</a></p>

		<?php endif; ?>

	</div>

</div>