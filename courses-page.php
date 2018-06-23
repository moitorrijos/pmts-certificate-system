<?php 
/**
 * Template Name: Courses Page
 */

if( is_user_logged_in() ) {

	get_header();

	get_template_part( 'templates/courses_loop' );

} else {

	wp_redirect( home_url() );
	
	exit;
	
}

get_footer();
	