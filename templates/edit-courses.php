<div class="main">
	<div class="main-content">

		<div class="buttons">
			<a href="<?php echo home_url('courses-list'); ?>" class="back-link"><i class="fa fa-backward"></i>&nbsp; Back to Courses List</a>
		</div>

		<?php

			if ( have_posts() ) : while ( have_posts() ) : the_post();

			the_title( '<h1>', '</h1>' );

			$course_options = array(
				'updated_message' => '<i class="fa fa-check"></i> &nbsp; Course Updated',
			);

			acf_form( $course_options );

			endwhile; else: endif;

		?>
	</div>
</div>