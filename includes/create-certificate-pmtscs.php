<?php

function pmtscs_ajax_create_certificate(){

	if ( !check_ajax_referer( 'create_certificate_nonce', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$appID = $_POST['appID'];

	$courseID = $_POST['courseID'];

	$instructorID = $_POST['instructorID'];

	$startDate = $_POST['startDate'];

	$endDate = $_POST['endDate'];
	
	$issueDate = $_POST['issueDate'];
	
	$_SESSION['students_name'] = get_field( 'participants_name_app', $appID );

	$_SESSION['passport_id'] = get_field( 'passport_id_app', $appID );

	$_SESSION['place_of_birth'] = get_field( 'place_of_birth_app', $appID );

	$_SESSION['student_nationality'] = get_field( 'nationality_app', $appID );

	$_SESSION['date_of_birth'] = get_field( 'date_of_birth_app', $appID );

	$place_of_training_slug = get_field( 'place_of_training_app', $appID );

	$_SESSION['office'] = get_term_by( 'slug', $place_of_training_slug, 'office' );
	
	$_SESSION['delivery_mode'] = get_field('course_delivery_mode_app', $appID);

	$_SESSION['instructor'] = $instructorID;

	$_SESSION['course'] = $courseID;

	$_SESSION['start_date'] = $startDate;

	$_SESSION['end_date'] = $endDate;

	$_SESSION['date_of_issuance'] = $issueDate;

	return wp_send_json_success();

}

add_action( 'wp_ajax_create_certificate_pmtscs', 'pmtscs_ajax_create_certificate' );