<div class="main">
	<div class="main-content">

		<div class="buttons">
			&laquo; <a href="<?php echo home_url('courses-list'); ?>" class="back-link">Back to Courses List</a>

			<div class="prev-next-links">
				<?php next_post_link( '&laquo %link' ); ?> | 
				<?php previous_post_link('%link &raquo'); ?>
			</div>
		</div>

		<?php

			if ( have_posts() ) : while ( have_posts() ) : the_post();

			$course_options = array(
				'post_title' => true,
				'updated_message' => '<i class="fa fa-check"></i> &nbsp; Course Updated',
			);

			acf_form( $course_options );

			endwhile; else: endif;

		?>
	</div>
</div>