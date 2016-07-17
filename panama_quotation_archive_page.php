<?php

/**
 * Template Name: Panama Quotation Archive Page
 */

get_header();

?>

<div class="main">

	<div class="main-content">

		<?php if( have_posts() ) : while( have_posts() ) : the_post();

		the_title('<h1>', '</h1>'); the_content(); endwhile; else :

		get_template_part('templates/404_message');

		endif;

		$quotation_archives = array(
			'type'            => 'monthly',
			'limit'           => '',
			'format'          => 'html', 
			'before'          => '',
			'after'           => '',
			'show_post_count' => false,
			'echo'            => 1,
			'order'           => 'DESC',
		    'post_type'       => 'quotation'
		);

		wp_get_archives( $quotation_archives );

		?>

	</div>

</div>