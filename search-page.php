<?php 

/**
 * Template Name: Search Page
 */

if( is_user_logged_in() ) {

	get_header();

	get_template_part( 'templates/naked_loop_search_form' );

	get_footer();

} else {

	wp_redirect( home_url() );
	
	exit;

}