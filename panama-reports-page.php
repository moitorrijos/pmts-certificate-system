<?php 
/**
 * Template Name: Panama Reports Page
 */

get_header();

if( is_user_logged_in() ) {
	
	get_template_part( 'templates/panama_reports_page_loop' );

} else {

	get_template_part('templates/the_message');

}

get_footer();