<?php

add_action( 'wp_ajax_search_certificates', 'pmtscs_ajax_search_certificates' );

function pmtscs_ajax_search_certificates() {

	global $wpdb;

	if ( !check_ajax_referer( 'pmtscs_certificates', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$passport_no = $_POST['passport_no'];

	$certificate_ids = $wpdb->get_results(

		$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_value="' . (string)$passport_no . '" ORDER BY post_id DESC', OBJECT)

	);

	if ( $certificate_ids ) {

		$cert_id = array();

		foreach ( $certificate_ids as $key => $row ) {

			array_push( $cert_id, $row->post_id );
		}

		$cert_ids_args = array(
			'post_type' => 'certificates',
			'meta_key' 	=> 'date_of_issuance',
			'orderby'	=> 'meta_value_num',
			'order'		=> 'DESC',
			'post__in' => $cert_id
		);

		ob_start();

		$cert_ids = new WP_Query( $cert_ids_args );

		if ( $cert_ids->have_posts() ) : 
		while ( $cert_ids->have_posts() ) : $cert_ids->the_post();

		get_template_part( 'templates/certificate_table' );

		endwhile; endif;

		$certificate_html_list = ob_get_clean();

		return wp_send_json_success( $certificate_html_list );

	} else {

		$search_certificates_args = array(
			'post_type' => 'certificates',
			'meta_key' 	=> 'date_of_issuance',
			'orderby'	=> 'meta_value_num',
			'order'		=> 'DESC',
			's'			=> (string)$passport_no
		);

		$search_certs = new WP_Query( $search_certificates_args );

		ob_start();

		if ( $search_certs->have_posts() ) : while ( $search_certs->have_posts() ) : $search_certs->the_post();

		get_template_part( 'templates/certificate_table' );

		endwhile; endif;

		$certificate_html_list = ob_get_clean();

		return wp_send_json_success( $certificate_html_list );

	}

return;

}