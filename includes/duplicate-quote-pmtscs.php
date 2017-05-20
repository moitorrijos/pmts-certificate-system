<?php

add_action( 'wp_ajax_duplicate_quote_pmtscs', 'pmtscs_ajax_duplicate_quote' );

function pmtscs_ajax_duplicate_quote() {

	if ( check_ajax_referer( 'duplicate_quote_nonce', 'security' ) ) {

		$post_id = $_POST['postID'];
		$courses_fields = get_field('courses', $post_id);
		$other_services_fields = get_field('other_services', $post_id);

		if ( $courses_fields ) :

			$_SESSION['courses'] = $courses_fields;

		elseif ( $other_services_fields ) :

			$_SESSION['other_services'] = $other_services_fields;

		endif;

		return wp_send_json_success();

	}

	return wp_send_json_error('Invalid security threshold, please try again later.');

}

function load_courses_field_values( $field ){
				
	if ( isset($_SESSION['courses'] ) ) {
		
		function course_info($course){ 

			return array(
				'field_56e04a980c978' => $course['course_name']->ID,
				'field_5707d3a2f9868' => $course['quantity'],
				'field_56e8214a2ce79' => $course['price'],
				'field_56e820fe2ce78' => $course['renewal'],
				'field_56e8608a68c74' => $course['panamanian'],
			);

		}

		$courses_info = array_map('course_info', $_SESSION['courses']);

		$field['value'] = $courses_info;

		unset($_SESSION['courses']);

	}

	return $field;

}

add_filter('acf/load_field/key=field_56e04a740c977', 'load_courses_field_values');

function load_other_services_field_values( $field ){

	if ( isset($_SESSION['other_services']) ){

		function services_info($service){

			return array(
				'field_5707d2b30773d' => $service['service_name'],
				'field_5707d2bd0773e' => $service['service_price'],
				'field_5707d2d50773f' => $service['service_quantity'],
			);

		}

		$services = array_map('services_info', (array) $_SESSION['other_services']);

		$field['value'] = $services;

		unset($_SESSION['other_services']);

	}

	return $field;
	
}

add_filter('acf/load_field/key=field_5707d29b0773c', 'load_other_services_field_values');