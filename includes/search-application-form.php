<?php

add_action( 'wp_ajax_search_application', 'pmtscs_ajax_search_application' );

function pmtscs_ajax_search_application() {

	global $wpdb;

	if ( !check_ajax_referer( 'search_application_nonce', 'security' ) ) {
		
		return wp_send_json_error( 'Invalid security threshold, please try again later.' );

	}

	$application_no = $_POST['application_no'];

	$application_ids_by_passport = $wpdb->get_results(

		$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_key="passport_id_app" AND meta_value="' . (string)$application_no . '" ORDER BY post_id DESC', OBJECT)

	);

	$application_ids_by_name = $wpdb->get_results(

		$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_key="participants_name_app" AND meta_value LIKE "%%' . (string)$application_no . '%%" ORDER BY post_id DESC', OBJECT)

	);

	if ( $application_ids_by_passport || $application_ids_by_name ) {
		
		$app_id = array();

		foreach ( $application_ids_by_passport as $key => $row ) {

			array_push( $app_id, $row->post_id );

		}

		foreach ( $application_ids_by_name as $key => $row ) {

			array_push( $app_id, $row->post_id );

		}

		$app_id_args = array(
			'post_type'	=> 'applications',
			'posts_per_page' => 55,
			'post__in'	=> $app_id,
		);

		ob_start();

		$app_ids = new WP_Query( $app_id_args );

		if ( $app_ids->have_posts() ) :
			while ( $app_ids->have_posts() ) : $app_ids->the_post();

		get_template_part( 'templates/application_form_table' );

		endwhile; endif;

		$application_html_list = ob_get_clean();

		return wp_send_json_success( $application_html_list );
		
	} else {

		$app_id_args = array(
			'post_type'	=> 'applications',
			'posts_per_page' => 55,
			's' => (string)$application_no,
		);

		$app_ids = new WP_Query( $app_id_args );

		if ( $app_ids->have_posts() ) :
			while ( $app_ids->have_posts() ) : $app_ids->the_post();

		get_template_part( 'templates/application_form_table' );

		endwhile; endif;

		$application_html_list = ob_get_clean();

		return wp_send_json_success( $application_html_list );

	}

}