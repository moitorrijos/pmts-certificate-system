<?php

add_action('acf/save_post', 'save_post_course_id', 20);

function save_post_course_id( $post_id ) {

	if(get_post_type($post_id) == 'certificates'){

		$courseID = get_field('course', $post_id)->ID;
		
		$total_certificates = get_field('total_certificates', $courseID);

		//update value of total certificates to course
		update_field('total_certificates', $total_certificates+1, $courseID);


		//update value of register code to the certificate
		update_post_meta($post_id, 'register_code', $total_certificates+1);

	}	
}