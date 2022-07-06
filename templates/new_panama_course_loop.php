<div class="main">
	
	<div class="main-content">
		
		<div class="buttons">
			
			<a href="<?php echo home_url(); ?>" class="back-link">&laquo; Back to courses list</a>

		</div>

		<?php if ( have_posts() ) : while( have_posts() ) : the_post();

			the_title( '<h1>', '</h1>' );
			endwhile; endif;
			$course_options = array(
				'id'		=> '',
				'post_id'	=> 'new_post',
        'post_title' => true,
				'new_post'	=> array(
					'post_type'		=> 'courses',
					'post_status'	=> 'publish'
				),
				'submit_value' 		=> 'Create Course',
				'updated_message'	=> 'Course Created',
				'return' 			=> '%post_url%'
			);

			acf_form( $course_options );

		?>

	</div>

</div>