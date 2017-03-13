<?php

function create_new_pmts_invoice() {

	$count_invoices = wp_count_posts( 'invoices' );
	$published_invoices = $count_invoices->publish;

	$quote_post_id = $_POST['post_id'];

	$participants_name_quotation 		 = get_post_meta( $quote_post_id, 'participants_name', true );
	$participants_nationality_quotation  = get_post_meta( $quote_post_id, 'participants_nationality', true );
	$participants_phone_number_quotation = get_post_meta( $quote_post_id, 'participants_phone_number', true );
	$clients_name_quotation 			 = get_post_meta( $quote_post_id, 'clients_name', true );
	$clients_email_quotation 			 = get_post_meta( $quote_post_id, 'clients_email', true );
	$courses_quotation 					 = get_post_meta( $quote_post_id, 'courses', true );

	$invoices_fields = array(
		'participants_name_invoice' 		=> $participants_name_quotation,
		'participants_nationality_invoice' 	=> $participants_nationality_quotation,
		'participants_phone_number_invoice' => $participants_phone_number_quotation,
		'clients_name_invoice' 				=> $clients_name_quotation,
		'clients_email_invoice' 			=> $clients_email_quotation,
	);

	if ($published_invoices == 0) {

		$invoice_title = 'PMTS/INV/' . date('Y') . '/' . '1';

	} else {

		$invoice_args = array(
			'numberposts' => 1,
			'orderby'	  => 'post_date',
			'order'		  => 'DESC',
			'post_type'	  => 'invoices',
			'post_status' => 'publish',
		);

		$last_invoice 		= wp_get_recent_posts( $invoice_args );
		$last_invoice_title = $last_invoice['0']['post_title'];

		$last_invoice_title_number = explode('/', $last_invoice_title);
		$last_invoice_title_number = $last_invoice_title_number[3] + 1;

		$invoice_title = 'PMTS/INV/' . date('Y') . '/' . $last_invoice_title_number;

	}

	$new_invoice_arr = array(
		'post_title' 	=> $invoice_title,
		'post_status' 	=> 'publish',
		'post_type' 	=> 'invoices',
		'meta_input' 	=> $invoices_fields,
	);

	$new_invoice_post_id = wp_insert_post( $new_invoice_arr );

	// save a repeater field value
	$invoice_courses_field_key = "field_58839ecde1164";

	$value = array(
		array(
			"course_name"	=> get_post_meta( $quote_post_id, 'courses_0_course_name', true ),
			"quantity"	=> get_post_meta( $quote_post_id, 'courses_0_quantity', true ),
			"price"	=> get_post_meta( $quote_post_id, 'courses_0_price', true ),
			"renewal"	=> get_post_meta( $quote_post_id, 'courses_0_renewal', true ),
		)
	);

	update_field( $invoice_courses_field_key, $value, $new_invoice_post_id );

	return wp_send_json_success( 'Invoice Created' );

}

add_action('wp_ajax_create_new_invoice', 'create_new_pmts_invoice');