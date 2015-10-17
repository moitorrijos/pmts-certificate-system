<?php

/**
 * Edit Courses here
 */

if ( is_user_logged_in() ) {

	acf_form_head();

	get_header();

	get_template_part( 'templates/edit-courses' );

	get_footer();

} else {

	wp_redirect( home_url() );

	exit;
}