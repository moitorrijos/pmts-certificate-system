<?php

add_action( 'wp_ajax_duplicate_application_pmtscs', 'pmtscs_ajax_duplicate_application' );

function pmtscs_ajax_duplicate_application() {

	if ( check_ajax_referer( 'duplicate_application_nonce', 'security') ) {

		$post_id = $_POST['postID'];
		$courses_field = get_field('courses_app', $post_id);

		$_SESSION['courses_app'] = $courses_field;

	}

	return wp_send_json_success();

}

add_filter('acf/load_field/key=field_58839ecde1164', 'load_courses_app_field_value');

function load_courses_app_field_value( $field ) {

	if ( isset( $_SESSION['courses_app'] ) ) {

		function course_info($course) {

			return array(
				'field_58839f02e1165' => $course['course_name_app']->ID,
				'field_58839f2ee1166' => $course['instructor_name_app']->ID,
				'field_58839f52e1167' => $course['start_date_app'],
				'field_58839fa8e1169' => $course['end_date_app'],
				'field_58892d735a1b5' => $course['night_app'],
			);

		}

		$courses_info = array_map('course_info', $_SESSION['courses_app']);

		$field['value'] = $courses_info;

		unset($_SESSION['courses_app']);

	}

	return $field;

}