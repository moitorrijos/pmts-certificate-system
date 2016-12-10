<?php 
/**
 * Template Name: Panama Certificates Page
 */

get_header();

if( is_user_logged_in() ) {

	get_template_part( 'templates/all_certificate_page_loop' );
		
} else {

	get_template_part('templates/the_message');

}

get_footer();