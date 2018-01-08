<?php

add_action( 'wp_ajax_search_by_id_passport', 'pmtscs_ajax_search_by_id_passport' );

function pmtscs_ajax_search_by_id_passport() {

	global $wpdb;

	if ( !check_ajax_referer( 'pmtscs_passport', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$passport_no = $_POST['passport_no'];

	$certificate_id = $wpdb->get_var(
		$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_value="%d" ORDER BY post_id DESC LIMIT 1', $passport_no)
	);

	$all_certs_ids = $wpdb->get_results(
		$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_value=""', $passport_no)
	);

	if ( $certificate_id ) {
	
		$student_info = $wpdb->get_results(
			$wpdb->prepare('SELECT meta_key, meta_value FROM fytv_postmeta WHERE post_id=%d' , $certificate_id)
		);

		$all_ids = array();

		foreach ( $all_certs_ids as $key => $row ) {

			array_push( $all_ids, $row->post_id );

		}

		$certs_ids_args = array(
			'post_type' => 'certificates',
			'post__in' => $all_ids
		);

		ob_start();

		$certs_query = new WP_Query( $certs_ids_args );

		if ( $certs_query->have_posts() ) : while ( $certs_query->have_posts() ) : $certs_query->the_post();

		get_template_part( 'templates/certificate_table' );

		endwhile; endif; wp_reset_query();

		$certificate_html_list = ob_get_clean();

		$student_array = array(
			'passport_no' => $passport_no,
			'certificate_id' => $certificate_id,
			'student_info' => $student_info,
			'certificate_table' => $certificate_html_list,
		);

		return wp_send_json_success( $student_array );

	}

	return wp_send_json_error( 'The Passport Number does not exist' );

}