<?php

add_filter('acf/validate_value/key=field_5612fe8fe2a39', 'cert_exists_validate_value', 10, 4);


function cert_exists_validate_value( $valid ){

	$page_template = get_page_template();

	$template_dir = get_template_directory();

	$template_string = str_replace($template_dir, '', $page_template);

	$template_string = str_replace($template_dir, '', $page_template);

	// if User is Editing certificate don't do anything.
	if ( $template_string != '/new_panama_certificate.php' ) {

		return $valid;

	}

	// bail early if value is already invalid
	if( !$valid ) {
		
		return $valid;
		
	}
	
	$student_passport = $_POST['acf']['field_5612fe8fe2a39'];
	$course_id = $_POST['acf']['field_5612ff11fdc34'];
	
	/**
	 * Check all certificates with the the course provided
	 * if this certificate already has the passport/id provided
	 * return an error.
	 */
	$certificate_exists = get_posts(array(
		'post_type' => 'certificates',
		'meta_query' => array(
			'relation' => 'AND',
			array(
            'key' => 'passport_id',
            'value' => $student_passport,
            'compare' => '=',
	        ),
	        array(
	            'key' => 'course',
	            'value' => (int) $course_id,
	            'compare' => '=',
	        ),
		),
	));
	
	if ($certificate_exists) {

		$valid = 'The <i>Certificate</i> you are trying to create already exists. <a href="' . $certificate_exists[0]->guid . '">View Certificate Here</a>';

	}

	return $valid;

}