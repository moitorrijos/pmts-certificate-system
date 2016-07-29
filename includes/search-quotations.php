<?php

add_action( 'wp_ajax_search_quotations', 'pmtscs_ajax_search_quotations' );

function pmtscs_ajax_search_quotations() {

	global $wpdb;

	if ( !check_ajax_referer( 'pmtscs_quotation', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$quotation_no = $_POST['quotation_no'];

	$quotation_ids = $wpdb->get_results(

		$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_value LIKE "%%' . (string)$quotation_no . '%%" AND meta_key="participants_name"', OBJECT)

	);

	if ($quotation_ids) {

		$quote_id = array();

		foreach ( $quotation_ids as $key => $row ) {

			array_push( $quote_id, $row->post_id );

		}

		$quote_ids_args = array(
			'post_type' => 'quotation',
			'post__in' => $quote_id
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
			's'	=> (string)$quotation_no
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