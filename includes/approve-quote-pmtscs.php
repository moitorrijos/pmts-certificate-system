<?php

// Send email to invoice yolli@intermaritime.org only if in production.


add_action( 'wp_ajax_approve_quotation_pmtscs', 'pmtcscs_approve_quotation', 10, 1 );

function pmtcscs_approve_quotation() {

	if ( check_ajax_referer( 'approve_quote_nonce', 'security' ) ) {

		$quote_id = $_POST['quoteID'];
		$student_name_field = get_field('participants_name', $quote_id);
		$courses_field = get_field('courses', $quote_id);

		if ($courses_field) {

			$_SESSION['student_name'] = $student_name_field;
			$_SESSION['quote_courses'] = $courses_field;

			return wp_send_json_success();

		} else {

			return wp_send_json_error();

		}

	}

}

function load_courses_app_field_values( $field ) {

	if ( isset($_SESSION['quote_courses']) ) {

		$quote_courses = $_SESSION['quote_courses'];

		function courses_info( $course ) {

			return array(
				'field_58839f02e1165'  => $course['course_name']->ID
			);

		}

		$courses = array_map('courses_info', $quote_courses);

		$field['value'] = $courses;

		unset($_SESSION['quote_courses']);

	}

	return $field;

}

add_filter( 'acf/load_field/key=field_58839ecde1164', 'load_courses_app_field_values' );

function load_name_app_field_value( $field ) {

	if ( isset($_SESSION['student_name']) ) {

		$student_name = $_SESSION['student_name'];

		$field['value'] = $student_name;

		unset($_SESSION['student_name']);

	}

	return $field;

}

add_action ( 'acf/load_field/key=field_58839d5ae115d', 'load_name_app_field_value' );