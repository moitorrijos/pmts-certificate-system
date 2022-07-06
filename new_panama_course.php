<?php 

/**
 * Template Name: New Panama Course
 */

if( is_user_logged_in() ) {
	
	acf_form_head();

	get_header();

	get_template_part( 'templates/new_panama_course_loop' );

	get_footer();

} else {

	wp_redirect( home_url() );
	
	exit;

}