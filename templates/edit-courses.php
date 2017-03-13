<div class="main">
	<div class="main-content">

		<div class="buttons">
			<!-- &laquo; <a href="<?php // echo home_url('courses-list'); ?>" class="back-link">Back to Courses List</a> -->
			<?php previous_post_link(); next_post_link();?>
			
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