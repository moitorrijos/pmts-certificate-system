<div class="main">
	
	<div class="main-content">
		
		<div class="buttons">
			
			<a href="<?php echo home_url('/panama-reports/end-of-classes-report/'); ?>" class="back-link">&laquo; Back to End of Class Reports Table</a>

		</div>

		<?php if ( have_posts() ) : while( have_posts() ) : the_post();

			the_title( '<h1>', '</h1>' );
			endwhile; endif;
			$reports_options = array(
				'id'		=> '',
				'post_id'	=> 'new_post',
				'new_post'	=> array(
					'post_type'		=> 'reports',
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