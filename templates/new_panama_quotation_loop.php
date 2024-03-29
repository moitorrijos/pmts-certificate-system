<div class="main">
	
	<div class="main-content">
	
		<div class="buttons">
			
			<a href="<?php echo home_url('panama-quotations'); ?>" class="back-link">&laquo; Back to Quotation Table</a>

			<?php get_template_part( 'templates/fill_courses_button' ); ?>

		</div>

		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

		<?php the_title('<h1>', '</h1>'); ?>


		<?php endwhile; endif;

		$options = array(

			'id' 		=> '',

			'post_id' 	=> 'new_post',

			'new_post'	=> array(
				'post_type'		=> 'quotation',
				'post_status'	=> 'publish'
			),

			'submit_value' => __("Create Quotation", 'certificate-system'),

			'updated_message' => __("Certificate Created", 'certificate-system'),

			'return' => '%post_url%',

		);

		acf_form( $options );

		?>

	</div>

</div>