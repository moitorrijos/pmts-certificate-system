<?php

/**
 * Single Initial Report Page for print
 */

if ( is_user_logged_in() ) {

	acf_form_head();

	get_header();

	get_template_part( 'templates/the-initial-report' );

	get_footer();

} else {

	wp_redirect( home_url() );

	exit;
}