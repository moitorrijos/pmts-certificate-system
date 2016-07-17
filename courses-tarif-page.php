<?php 

/**
 * Template Name: Courses Tarif Page
 */

if( is_user_logged_in() ) {

	get_header();

	get_template_part( 'templates/courses_tarif' );

	get_footer();

} else {

	wp_redirect( home_url() );
	
	exit;

}