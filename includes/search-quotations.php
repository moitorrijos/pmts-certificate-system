<?php

add_action( 'wp_ajax_search_quotations', 'pmtscs_ajax_search_quotations' );

function pmtscs_ajax_search_quotations() {

	global $wpdb;

	if ( !check_ajax_referer( 'pmtscs_quotation', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$quotation_query = $_POST['quotation_query'];

	$quotation_ids_by_participant = $wpdb->get_results(
		'SELECT post_id FROM fytv_postmeta WHERE meta_value LIKE "' . $quotation_query . '" AND meta_key="participants_name"'
	);

	$quotation_ids_by_clients = $wpdb->get_results(
		'SELECT post_id FROM fytv_postmeta WHERE meta_value LIKE "' . $quotation_query . '" AND meta_key="clients_name"'
	);

	if ($quotation_ids_by_participant) {

		$quotation_query_by_name = explode ( ' ', $quotation_ids_by_participant );

		$quotation_names_query = array_map(function($name){
			return array(
				'key' => 'participants_name',
				'value' => 'name',
				'compare' => 'LIKE'
			);
		}, $quotation_query_by_name);

		$meta_query_array = array(
			'relation' => 'AND'
		);

		array_push($meta_query_array, $quotation_names_query);
	
		$quote_ids_args = array(
			'post_type' => 'quotation',
			'posts_per_page' => 55,
			'meta_query' => $meta_query_array
		);

		ob_start();

		$quote_ids = new WP_Query( $quote_ids_args );

		if ( $quote_ids->have_posts() ) : 
		while ( $quote_ids->have_posts() ) : $quote_ids->the_post();

		get_template_part( 'templates/quotation_table' );

		endwhile; endif; wp_reset_query();

		$quotation_html_list = ob_get_clean();

		return wp_send_json_success( $quotation_html_list );

	} else {

		$search_quote_args = array(
			'post_type' => 'quotation', 
			's'	=> (string)$quotation_query
		);

		$search_quotes = new WP_Query( $search_quote_args );

		ob_start();

		if ( $search_quotes->have_posts() ) : 
			while ( $search_quotes->have_posts() ) : $search_quotes->the_post();

		get_template_part( 'templates/quotation_table' );

		endwhile; endif; wp_reset_query();

		$quotation_html_list = ob_get_clean();

		return wp_send_json_success( $quotation_html_list );

	}

}