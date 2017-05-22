<div class="main">
	
	<div class="main-content">
		
		<div class="buttons">
			
			<a href="<?php echo home_url('application-forms'); ?>">
				
				&laquo; Back to Application Forms

			</a>

		</div>

		<div class="application-exists"></div>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php the_title( '<h1>', '</h1>' ); ?>

	<?php endwhile; endif;

		$options = array(

			'id'		=> '',

			'post_id'	=> 'new_post',

			'new_post'	=> array(

				'post_type'		=> 'applications',
				'post_status'	=> 'publish',

			),

			'submit_value'		=> 'Create Application',

			'update_message'	=> 'Application Created',

			'return'			=> '%post_url%',

		);

		acf_form( $options );

	 ?>
	</div>
</div>