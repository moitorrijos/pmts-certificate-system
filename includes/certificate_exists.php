<?php

function certificate_exists($participants_id, $course) {
	$certificate_exists = get_posts(array(
		'post_type' => 'certificates',
		'meta_query' => array(
			'relation' => 'AND',
			array(
            'key' => 'passport_id',
            'value' => $participants_id,
            'compare' => '=',
	        ),
	        array(
	            'key' => 'course',
	            'value' => (int)$course->ID,
	            'compare' => '=',
	        ),
		),
	));

	if ($certificate_exists) {
		return $certificate_exists;
	}

	return false;
}