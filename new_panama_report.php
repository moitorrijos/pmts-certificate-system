<?php 

/**
 * Template Name: New Panama Report
 */

if( is_user_logged_in() ) {
	
	acf_form_head();

	get_header();

	get_template_part( 'templates/new_panama_report_loop' );

	get_footer();

} else {

	wp_redirect( home_url() );
	
	exit;

}