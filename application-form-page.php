<?php 
/**
 * Template Name: Application Form Page
 */

get_header();

if( is_user_logged_in() ) {

	get_template_part( 'templates/the-naked-loop.php' );

	get_template_part( 'templates/application_form_loop' );
		
} else {

	wp_redirect( home_url() );
	
	exit;

}

get_footer();