<?php

add_action( 'wp_ajax_search_quotations', 'pmtscs_ajax_search_quotations' );

function pmtscs_ajax_search_quotations() {

	global $wpdb;

	if ( !check_ajax_referer( 'pmtscs_quotation', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$quotation_no = $_POST['quotation_no'];

	$quotation_id = $wpdb->get_results(

		$wpdb->prepare('SELECT ID FROM fytv_posts WHERE post_title LIKE "%%' . (string)$quotation_no . '" AND post_type="quotation"', OBJECT)

	);

	if( $quotation_id ) {

		ob_start();

		foreach( $quotation_id as $quote_id ) {

			echo
			'<tr><td><a href=' . get_permalink( $quote_id->post_id ) . '>' .
			get_post($quote_id->post_id)->participants_name .
			'</a></td><td>' .
			get_post($quote_id->post_id)->clients_name .
			'</td><td class="centered">' .
			get_the_title($quote_id->post_id) .
			'</td><td class="centered">' .
			get_post($quote_id->post_id)->service_name .
			'</td><td class="centered">' .
			get_post_field( 'post_author', $quote_id->post_id ) .
			'</td><td class="centered">' .
			get_the_date( 'date_format', $quote_id->post_id ) .
			'</td><td class="centered edit">' .
				'<a href="' . get_permalink( $quote_id->post_id ) . '" class="edit-form"><i class="fa fa-pencil-square-o"></i></a>' .
			'</td></tr>';

		}

		$quotation_html_list = ob_get_clean();

		return wp_send_json_success( $quotation_html_list );

	}

	return;

}