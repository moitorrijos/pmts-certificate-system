<div class="main">
	
	<div class="main-content">
		
		<div class="buttons">
			
			<a href="<?php echo home_url('instructors-list'); ?>" class="back-link">&laquo; Back to Instructors Table</a>

			<!-- <a href="<?php //echo home_url();?>/instructors-list/new-panama-instructor/?action=add_instructors" class="clear-data-button">

				Add All Instructors

			</a> -->

		</div>

		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

		<?php the_title('<h1>', '</h1>'); ?>


		<?php endwhile; endif;

		$options = array(

			'id' 		=> '',

			'post_id' 	=> 'new_post',

			'post_title' => true,

			'new_post'	=> array(
				'post_type'		=> 'instructors',
				'post_status'	=> 'publish'
			),

			'submit_value' => __("Create Instructor", 'certificate-system'),

			'updated_message' => __("Instructor Created", 'certificate-system'),

			'return' => '%post_url%',

		);

		acf_form( $options );

		?>

	</div>

</div>