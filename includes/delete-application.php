<?php

// add to functions

add_action( 'wp_ajax_delete_application', 'pmtscs_ajax_delete_application' );

function pmtscs_ajax_delete_application() {

	global $wpdb;

	if ( !check_ajax_referer( 'delete_app_nonce', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$_SESSION['application_deleted'] = true;

	$app_id = $_POST['appID'];

	wp_delete_post( $app_id );

	return wp_send_json_success( array( 'The application with id: ' . $app_id . ' was deleted successfully.') );

}