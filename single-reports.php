<?php

/**
 * Single Report Page for print
 */

if ( is_user_logged_in() ) {

	acf_form_head();

	get_header();

	get_template_part( 'templates/the-report' );

	get_footer();

} else {

	wp_redirect( home_url() );

	exit;
}