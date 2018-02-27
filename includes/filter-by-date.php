<?php

add_action( 'wp_ajax_filter_by_date', 'phtscs_filter_by_date' );

function phtscs_filter_by_date() {
	
	if ( !check_ajax_referer( 'pmtscs_filter_nonce', 'security' ) ) {
		return wp_send_json_error('Invalid security.');
	}

	$start_date = $_POST['valid_start_date'];
	$end_date = $_POST['valid_end_date'];

	$start_date = DateTime::createFromFormat('d/m/Y', $start_date);
	$end_date = DateTime::createFromFormat('d/m/Y', $end_date);

	$filtered_certs_args = array(
		'post_type'		=> 'certificates',
		'posts_per_page'=> 800,
		'meta_key'		=> 'date_of_issuance',
		'orderby'		=> 'meta_value_num',
		'order'			=> 'DESC',
		'meta_query'	=> array(
			array(
				'key'	  => 'date_of_issuance',
				'value'   => array($start_date->format('Ymd'), $end_date->format('Ymd')),
				'compare' => 'BETWEEN',
			),
		),
	);

	ob_start();
	
	$filtered_certs = new WP_Query( $filtered_certs_args );

	if ( $filtered_certs->have_posts() ) :
		while( $filtered_certs->have_posts() ) : $filtered_certs->the_post();

	get_template_part( 'templates/certificate_table' );

	endwhile; endif; wp_reset_query();

	$filtered_certs_html = ob_get_clean();

	return wp_send_json_success( $filtered_certs_html );

}