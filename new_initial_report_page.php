<?php 

/**
 * Template Name: New Initial Report
 */

if( is_user_logged_in() ) {
	
	acf_form_head();

	get_header();

	get_template_part( 'templates/new_initial_report_page_loop' );

	get_footer();

} else {

	wp_redirect( home_url() );
	
	exit;

}