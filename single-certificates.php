<?php

/**
 * Single Certificate Page for print
 */

if ( is_user_logged_in() ) {

	get_header();

	get_template_part( 'templates/the-certificate' );

	get_footer();

} else {

	wp_redirect( home_url() );

	exit;
}