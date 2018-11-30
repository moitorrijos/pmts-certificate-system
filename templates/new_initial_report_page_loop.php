<div class="main">
	
	<div class="main-content">
		
		<div class="buttons">
			
			<a href="<?php echo home_url('/panama-reports/start-of-classes-report/'); ?>" class="back-link">&laquo; Back to Start of Class Reports Table</a>

		</div>

		<?php if ( have_posts() ) : while( have_posts() ) : the_post(); ?>

		<?php the_title( '<h1>', '</h1>' ); ?>

		<?php endwhile; endif;

			$reports_options = array(
				'id'		=> '',
				'post_id'	=> 'new_post',
				'new_post'	=> array(
					'post_type'		=> 'initial_reports',
					'post_status'	=> 'publish'
				),
				'submit_value' 		=> 'Create Report',
				'updated_message'	=> 'Report Created',
				'return' 			=> '%post_url%'
			);

			acf_form( $reports_options );

		?>

	</div>

</div>