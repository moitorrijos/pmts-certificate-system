<?php

function get_participant_number( $instructor_report, $course_report, $date_of_course_report) {
	$filter_certs_args_loop = array(
		'post_type'			=> 'certificates',
		'posts_per_page'	=> -1,
		'meta_query'		=> array(
			array(
				'key'	=> 'instructor',
				'value' => (int) $instructor_report,
			),
			array(
				'key'     => 'course',
				'value'   => (int) $course_report,
			),
			array(
				'key'	=> 'date_of_issuance',
				'value'	=> $date_of_course_report,
				'type'	=> 'numeric',
			)
		)
	);

	$report_certs_loop = new WP_Query( $filter_certs_args_loop );

	return $report_certs_loop->post_count;
}