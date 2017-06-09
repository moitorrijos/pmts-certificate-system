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

	$_SESSION['students_name'] = get_field( 'participants_name_app', $appID );

	$_SESSION['passport_id'] = get_field( 'passport_id_app', $appID );

	$_SESSION['place_of_birth'] = get_field( 'place_of_birth_app', $appID );

	$_SESSION['student_nationality'] = get_field( 'nationality_app', $appID );

	$_SESSION['date_of_birth'] = get_field( 'date_of_birth_app', $appID );

	$place_of_training_slug = get_field( 'place_of_training_app', $appID );

	$_SESSION['office'] = get_term_by( 'slug', $place_of_training_slug, 'office' );

	$_SESSION['instructor'] = $instructorID;

	$_SESSION['course'] = $courseID;

	$_SESSION['start_date'] = $startDate;

	$_SESSION['end_date'] = $endDate;

	$_SESSION['date_of_issuance'] = $endDate;

	return wp_send_json_success();

}

// function pmtscs_ajax_create_certificate() {

// 	if ( !check_ajax_referer( 'create_certificate_nonce', 'security' ) ) {

// 		return wp_send_json_error('Invalid security threshold, please try again later.');

// 	}

// 	$appID = $_POST['appID'];

// 	$courseID = $_POST['courseID'];

// 	$instructorID = $_POST['instructorID'];

// 	$startDate = $_POST['startDate'];

// 	$endDate = $_POST['endDate'];

// 	$students_name = get_field( 'participants_name_app', $appID );

// 	$passport_id = get_field( 'passport_id_app', $appID );

// 	$place_of_birth = get_field( 'place_of_birth_app', $appID );

// 	$student_nationality = get_field( 'nationality_app', $appID );

// 	$date_of_birth = get_field( 'date_of_birth_app', $appID );

// 	$place_of_training_slug = get_field( 'place_of_training_app', $appID );

// 	$office = get_term_by( 'slug', $place_of_training_slug, 'office' );

// 	$deliver_mode = get_field( 'course_delivery_mode_app', $appID );

// 	$instructor = $instructorID;

// 	$course = $courseID;

// 	$start_date = $startDate;

// 	$end_date = $endDate;

// 	$date_of_issuance = $endDate;

// 	$new_certificate = array(
// 		'post_status' 	=> 'publish',
// 		'post_type' 	=> 'certificates',
// 		'meta_input'	=> array(
// 			'students_name'  	  => $students_name,
// 			'passport_id'	 	  => $passport_id,
// 			'place_of_birth' 	  => $place_of_birth,
// 			'student_nationality' => $student_nationality,
// 			'date_of_birth'		  => $date_of_birth,
// 			'office'			  => $office,
// 			'deliver_mode'		  => $deliver_mode,
// 			'course'			  => $course,
// 			'instructor'		  => $instructor,
// 			'start_date'		  => $start_date,
// 			'end_date'			  => $end_date,
// 			'resolution'		  => 'DGGM-CFM-048-2016',
// 			'resolution_date'	  => '7 November, 2016',
// 			'place_of_issuance'	  => 'Panama',
// 			'date_of_issuance'	  => $date_of_issuance,
// 		),
// 	);

// 	$new_certificate_id = wp_insert_post( $new_certificate );

// 	return wp_send_json_success( get_permalink( $new_certificate_id ) );

// }

add_action( 'wp_ajax_create_certificate_pmtscs', 'pmtscs_ajax_create_certificate' );