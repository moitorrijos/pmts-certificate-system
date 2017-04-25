<?php

add_action( 'wp_ajax_search_certificates', 'pmtscs_ajax_search_certificates' );

function pmtscs_ajax_search_certificates() {

	global $wpdb;

	if ( !check_ajax_referer( 'pmtscs_certificates', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$certificate_query = $_POST['certificate_query'];

	$certificate_ids = $wpdb->get_results(

		$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_key="passport_id" AND meta_value="' . (string)$certificate_query . '" ORDER BY post_id DESC', OBJECT)

	);

	if ( $certificate_ids ) {

		$cert_ids_args = array(
			'post_type' 		=> 'certificates',
			'posts_per_page' 	=> -1,
			'meta_key'			=> 'passport_id',
			'meta_value'		=> (string)$certificate_query,
		);

		ob_start();

		$cert_ids = new WP_Query( $cert_ids_args );

		if ( $cert_ids->have_posts() ) : 
		while ( $cert_ids->have_posts() ) : $cert_ids->the_post();

		get_template_part( 'templates/certificate_table' );

		endwhile; endif;

		$certificate_html_list_by_passport = ob_get_clean();

		return wp_send_json_success( $certificate_html_list_by_passport );

	} else {

		$certificate_query_by_name = explode(' ', $certificate_query);

		$certificate_names_query = array_map(function($name){
			return array(
				'key' => 'students_name',
				'value' => $name,
				'compare' => 'LIKE',
			);
		}, $certificate_query_by_name);

		$meta_query_array = array(
		    'relation' => 'AND',
		);

		array_push($meta_query_array, $certificate_names_query);

		$search_certificates_args = array(
			'post_type' 		=> 'certificates',
			'posts_per_page' 	=> 55,
			'meta_query'		=> $meta_query_array,
		);

		$search_certs = new WP_Query( $search_certificates_args );

		ob_start();

		if ( $search_certs->have_posts() ) : 
			while ( $search_certs->have_posts() ) : $search_certs->the_post();

		get_template_part( 'templates/certificate_table' );

		endwhile; endif;

		$certificate_html_list_by_name = ob_get_clean();

		return wp_send_json_success( $certificate_html_list_by_name );

	}

}