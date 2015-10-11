<?php 

/**
 * Template Name: Certificates Page
 */

if( is_user_logged_in() ) {

	get_header();

	get_template_part( 'templates/certifcate_page_loop' );

	get_footer();

} else {

	wp_redirect( home_url() );
	
	exit;

}