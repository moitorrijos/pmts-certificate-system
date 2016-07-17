<?php 

/**
 * Template Name: Panama Courses Calendar Page
 */

if( is_user_logged_in() ) {

	get_header();

	get_template_part( 'templates/panama_courses_calendar_page_loop' );

	get_footer();

} else {

	wp_redirect( home_url() );
	
	exit;

}