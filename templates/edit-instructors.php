<div class="main">
	<div class="main-content">

		<div class="buttons">
			<a href="<?php echo home_url('instructors-list'); ?>" class="back-link">&laquo; Back to Instructors List</a>
		</div>

		<?php

			if ( have_posts() ) : while ( have_posts() ) : the_post();

			$instructors_options = array(
				'post_title' => true,
				'updated_message' => '<i class="fa fa-check"></i> &nbsp; Instructor Updated',
			);

			acf_form( $instructors_options );

			endwhile; else: endif;

		?>
	</div>
</div>