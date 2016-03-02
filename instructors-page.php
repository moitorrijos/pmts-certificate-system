<?php 

/**
 * Template Name: Instructors Page
 */

if( is_user_logged_in() ) {

	get_header();

	get_template_part( 'templates/instructors_loop' );

	get_footer();

} else {

	wp_redirect( home_url() );
	
	exit;

}