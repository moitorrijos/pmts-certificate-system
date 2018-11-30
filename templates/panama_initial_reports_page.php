<?php 
/**
 * Template Name: Panama Initial Reports Page
 */

if( is_user_logged_in() ) {

	get_header();

	get_template_part( 'templates/the-naked-loop.php' );
	
	get_template_part( 'templates/panama_initial_reports_page_loop' );

	get_footer();

} else {

	wp_redirect( home_url() );
	
	exit;

}