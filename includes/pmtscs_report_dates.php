<?php

function pmtscs_report_dates( $instructor, $course, $course_date) {
	setlocale(LC_ALL, 'es_ES');
	$certificates_args = array(
		'post_type' => 'certificates',
		'posts_per_page' => 1,
		'meta_query' => array(
			array(
				'key'   => 'instructor',
				'value' => (int) $instructor->ID,
			),
			array(
				'key'   => 'course',
				'value' => (int) $course->ID,
			),
			array(
				'key' 	=> 'end_date',
				'value' => $course_date,
			)
		)
	);

	$certificates = get_posts( $certificates_args );

	// var_dump($certificates);
	
	$certificate_id = $certificates[0]->ID;

	$course_start_date = strtotime(get_post_meta($certificate_id, 'start_date', true));

	$course_end_date = strtotime(get_post_meta($certificate_id, 'end_date', true));

	return strftime( '%e de %B', $course_start_date ) . ' a ' . strftime( '%e de %B de %G', $course_end_date);
}

