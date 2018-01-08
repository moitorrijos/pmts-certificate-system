<?php 

/**
 * Template Name: Courses Page
 */
get_header();

if( is_user_logged_in() ) {

	get_template_part( 'templates/courses_loop' );

} else {

	get_template_part('templates/the_message');
	
}

get_footer();
	