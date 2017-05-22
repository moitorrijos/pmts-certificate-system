<?php

add_action( 'wp_ajax_search_passport_app', 'pmtscs_ajax_search__passport_app' );

function pmtscs_ajax_search__passport_app() {

	global $wpdb;

	if ( !check_ajax_referer( 'pmtscs_passport_app', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$passport_no = $_POST['passport_no'];

	$application_id = $wpdb->get_var(
		$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_key="passport_id_app" AND meta_value="'.(string)$passport_no.'"')
	);

	if ( $application_id ) {

		$application_permalink = get_permalink( $application_id );

		$student_info = $wpdb->get_results(
			$wpdb->prepare('SELECT meta_key, meta_value FROM fytv_postmeta WHERE post_id=' . (string)$application_id , OBJECT)
		);
		
		$app_student_array = array(
			'passport_no' 		=> $passport_no,
			'certificate_id' 	=> $certificate_id,
			'app_permalink' 	=> $application_permalink,
			'student_info' 		=> $student_info,
		);

		return wp_send_json_success( $app_student_array );
		
	}

	$certificate_id = $wpdb->get_var(
		$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_value="' . (string)$passport_no . '" ORDER BY post_id DESC LIMIT 1')
	);

	if ( $certificate_id ) {
	
		$student_info = $wpdb->get_results(
			$wpdb->prepare('SELECT meta_key, meta_value FROM fytv_postmeta WHERE post_id=' . (string)$certificate_id , OBJECT)
		);

		$student_array = array(
			'passport_no' => $passport_no,
			'certificate_id' => $certificate_id,
			'student_info' => $student_info,
		);

		return wp_send_json_success( $student_array );

	}

	return wp_send_json_error( 'The Passport Number does not exist' );

}