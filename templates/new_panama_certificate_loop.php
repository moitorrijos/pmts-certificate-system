<?php get_template_part('templates/search_by_id_no_form') ?>

<div class="main">
	
	<div class="main-content">
		
		<div class="buttons">
			
			<a href="<?php echo home_url('panama-certificates'); ?>" class="back-link">

				&laquo; Back to Certificates Table

			</a>

			<a href="<?php echo home_url();?>/panama-certificates/new-panama-certificate?action=clear_session" class="clear-data-button">

				Clear Certificate Data

			</a>

			<a href="#0" class="search-id-no-button not-link">

				Search by ID/Passport No

			</a>

		</div>

		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>

		<?php the_title('<h1>', '</h1>'); ?>

		<?php endwhile; endif;

			$options = array(

				'id' 		=> '',

				'post_id' 	=> 'new_post',

				'new_post'	=> array(
					'post_type'		=> 'certificates',
					'post_status'	=> 'publish'
				),

				'submit_value' => __("Create Certificate", 'certificate-system'),

				'updated_message' => __("Certificate Created", 'certificate-system'),

				'return' => '%post_url%',

			);

			acf_form( $options );

		?>

	</div>

</div>