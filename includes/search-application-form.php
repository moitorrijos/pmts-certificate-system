<?php

add_action( 'wp_ajax_search_application', 'pmtscs_ajax_search_application' );

function pmtscs_ajax_search_application() {

	global $wpdb;

	if ( !check_ajax_referer( 'search_application_nonce', 'security' ) ) {
		
		return wp_send_json_error( 'Invalid security threshold, please try again later.' );

	}

	$application_no = $_POST['application_no'];

	$apps_by_passport = $wpdb->get_results(
		$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_key="passport_id_app" AND meta_value="'.$application_no.'"')
	);

	if ( $apps_by_passport ) {
	
		$app_id_args_by_passport = array(
			'post_type'	=> 'applications',
			'posts_per_page' => 55,
			'meta_key' => 'passport_id_app',
			'meta_value' => (string)$application_no,
		);

		$app_ids = new WP_Query( $app_id_args_by_passport );

		ob_start();

		if ( $app_ids->have_posts() ) :
			while ( $app_ids->have_posts() ) : $app_ids->the_post();

		get_template_part( 'templates/application_form_table' );

		endwhile; endif;

		$application_html_list = ob_get_clean();

		return wp_send_json_success( $application_html_list );

	} else {

		$application_names = explode(' ', $application_no);

		$application_names_query = array_map(function($name){
			return array(
				'key' => 'participants_name_app',
				'value' => $name,
				'compare' => 'LIKE',
			);
		}, $application_names);

		$meta_query_array = array(
			'relation' => 'AND',
		);

		array_push($meta_query_array, $application_names_query);

		$app_id_args_by_name = array(
			'post_type'	=> 'applications',
			'posts_per_page' => 55,
			'meta_query' => $meta_query_array,
		);

		$app_ids = new WP_Query( $app_id_args_by_name );

		ob_start();

		if ( $app_ids->have_posts() ) :
			while ( $app_ids->have_posts() ) : $app_ids->the_post();

		get_template_part( 'templates/application_form_table' );

		endwhile; endif;

		$application_html_list = ob_get_clean();

		return wp_send_json_success( $application_html_list );

	}

}