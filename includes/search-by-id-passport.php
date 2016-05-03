<?php

add_action( 'wp_ajax_search_by_id_passport', 'pmtscs_ajax_search_by_id_passport' );

function pmtscs_ajax_search_by_id_passport() {

	global $wpdb;

	if ( !check_ajax_referer( 'pmtscs_passport', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$passport_no = $_POST['passport_no'];

	$certificate_id = $wpdb->get_var('select post_id from fytv_postmeta where meta_value="' . (string)$passport_no . '" limit 1');

	if ( $certificate_id ) {

		$student_info = $wpdb->get_results('select meta_key, meta_value from fytv_postmeta where post_id=' . (string)$certificate_id , OBJECT );

		$student_array = array(
			'message' => 'Hello!',
			'passport_no' => $passport_no,
			'certificate_id' => $certificate_id,
			'student_info' => $student_info
		);

		return wp_send_json_success( $student_array );

	}

	return wp_send_json_error( 'The Passport Number does not exist' );


}