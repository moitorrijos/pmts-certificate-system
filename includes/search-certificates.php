<?php

add_action( 'wp_ajax_search_certificates', 'pmtscs_ajax_search_certificates' );

function pmtscs_ajax_search_certificates() {

	global $wpdb;

	if ( !check_ajax_referer( 'pmtscs_certificates', 'security' ) ) {

		return wp_send_json_error('Invalid security threshold, please try again later.');

	}

	$passport_no = $_POST['passport_no'];

	$certificate_id = $wpdb->get_results(

		$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_value="' . (string)$passport_no . '" ORDER BY post_id DESC', OBJECT)

	);

	if ( $certificate_id ) {

		ob_start();

		foreach ( $certificate_id as $cert_id ) {

			echo 
			'<tr><td><a href=' . get_permalink( $cert_id->post_id ) . ' >' .
			get_post($cert_id->post_id)->students_name .
			'</a></td><td class="centered">' .
			get_post($cert_id->post_id)->student_nationality .
			'</td><td class="centered">' .
			get_post($cert_id->post_id)->passport_id .
			'</td><td class="centered">' .
			get_post($cert_id->post_id)->pmtscs_register_code .
			'</td><td class="centered">' .
			get_post(get_post( $cert_id->post_id )->course)->abbr .
			'</td><td class="centered">' .
			DateTime::createFromFormat('Ymd', get_post($cert_id->post_id)->start_date)->format('d/m/y') .
			'</td><td class="centered">' .
			DateTime::createFromFormat('Ymd', get_post($cert_id->post_id)->end_date)->format('d/m/y') .
			'</td><td class="centered">' .
			get_the_title(get_post($cert_id->post_id)->instructor) .
			'</td><td class="centered">' .
			DateTime::createFromFormat('Ymd', get_post($cert_id->post_id)->date_of_issuance)->format('d/m/y') .
			'</td><td class="centered">' .
			get_term(get_post($cert_id->post_id)->office)->name .
			'</td><td class="centered edit">' .
				'<a href="' . get_permalink( $cert_id->post_id ) . '" class="edit-form"><i class="fa fa-pencil-square-o"></i></a>' .
			'</td></tr>';

		} 

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

		endwhile; endif; wp_reset_query();

		$certificate_html_list = ob_get_clean();

		return wp_send_json_success( $certificate_html_list );

	}

}