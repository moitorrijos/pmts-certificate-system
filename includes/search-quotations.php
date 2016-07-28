<?php

add_action( 'wp_ajax_search_quotations', 'pmtscs_ajax_search_quotations' );

function pmtscs_ajax_search_quotations() {

	if ( !check_ajax_referer( 'pmtscs_quotation', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$quotation_no = $_POST['quotation_no'];

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