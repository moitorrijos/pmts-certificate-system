<?php

add_action( 'wp_ajax_check_certificate', 'pmtscs_ajax_check_certificate' );
add_action( 'wp_ajax_nopriv_check_certificate', 'pmtscs_ajax_check_certificate' );

function pmtscs_ajax_check_certificate() {

	global $wpdb;

	if ( !check_ajax_referer( 'check_certificate_nonce', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$check_value = $_POST['checkValue'];

	$certificate_id = $wpdb->get_var('SELECT post_id FROM '.$wpdb->prefix.'postmeta WHERE meta_key="pmtscs_register_code" AND meta_value="' . $check_value . '"');

	if ($certificate_id) {

		return wp_send_json_success( $certificate_id );

	}

	return wp_send_json_error( 0 );

}