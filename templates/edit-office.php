<div class="main">
	<div class="main-content">

		<div class="buttons">
			<a href="<?php echo home_url('offices-list'); ?>" class="back-link">&laquo; Back to Offices List</a>
		</div>

		<?php

			if ( have_posts() ) : while ( have_posts() ) : the_post();

			$offices_options = array(
				'post_title' => true,
				'updated_message' => '<i class="fa fa-check"></i> &nbsp; Office Updated',
			);

			acf_form( $offices_options );

			endwhile; else: endif;

		?>
	</div>
</div>