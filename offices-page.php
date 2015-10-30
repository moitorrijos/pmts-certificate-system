<?php 

/**
 * Template Name: Offices Page
 * 
 */

if( is_user_logged_in() ) {

	get_header();

	get_template_part( 'templates/offices_loop' );

	get_footer();

} else {

	wp_redirect( home_url() );
	
	exit;

}