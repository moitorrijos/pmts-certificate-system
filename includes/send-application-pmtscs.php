<?php

function pmtscs_set_content_type(){
    return "text/html";
}

add_filter( 'wp_mail_content_type','pmtscs_set_content_type' );

add_action( 'wp_ajax_send_application_pmtscs', 'pmtscs_ajax_send_application' );

function pmtscs_ajax_send_application(){

	if ( !check_ajax_referer( 'send_application_nonce', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$post_id = $_POST['appPostID'];

	$full_name = get_field('participants_name_app', $post_id);

	$place_of_training_slug = get_field('place_of_training_app', $post_id);

	$place_of_training = get_term_by( 'slug', $place_of_training_slug, 'office' );

	$certificate_permalink = get_permalink( $post_id );

	$to = 'certificates@panamamaritimetraining.com';

	$subject = 'Certificates available for print from ' . $place_of_training->name;

	$message = 'There is a certificate for printing from ' .$place_of_training->name . '<br>Name: ' . $full_name . '<br>click here to print ' . $certificate_permalink;

	if ( wp_mail( $to, $subject, $message, $headers ) ) {

		return wp_send_json_success();
		
	} else {

		return wp_send_json_error();

	}
	
}