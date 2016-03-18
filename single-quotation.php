<?php 

/**
 * Single Quotation page for Print
 */

if ( is_user_logged_in() ) {

	acf_form_head();

	get_header();

	get_template_part( 'templates/the-quotation' );

	get_footer();

} else {

	wp_redirect( home_url() );

	exit;
}