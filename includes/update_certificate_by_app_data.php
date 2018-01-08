<?php

function save_application_id_data( $post_id ) {

	global $wpdb;

	// If we are editing an application...

	if ( is_singular( 'applications' ) ) {

		// get the passport number...

		$passport_id_app = get_field( 'passport_id_app', $post_id );

		$certificate_ids_by_passport = $wpdb->get_results(

			$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_key="passport_id" AND meta_value="%d" ORDER BY post_id DESC', $passport_id_app)

		);

		if ( $certificate_ids_by_passport ) {

			$_SESSION['certificates_ids'] = [];

			foreach ( $certificate_ids_by_passport as $key => $row ) {

				array_push( $_SESSION['certificates_ids'], $row->post_id );
				
			}

		} else {

			$participants_name_app = get_field( 'participants_name_app', $post_id );

			$certificate_ids_by_name = $wpdb->get_results(

				$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_key="students_name" AND meta_value="%d" ORDER BY post_id DESC', $participants_name_app)

			);

			$_SESSION['certificates_ids'] = [];

			foreach ( $certificate_ids_by_name as $key => $row ) {

				array_push( $_SESSION['certificates_ids'], $row->post_id );
				
			}

		}

	}

}

add_action( 'acf/save_post', 'save_application_id_data', 9 );

function update_certificate_by_app_data( $post_id ) {

	$place_of_training_slug = get_field('place_of_training_app', $post_id);

	$office = get_term_by( 'slug', $place_of_training_slug, 'office' );

	if ( is_singular( 'applications' ) ) {

		$certificate_ids = $_SESSION['certificates_ids'];

		foreach ($certificate_ids as $certificate_id) {
			
			update_field( 'students_name', get_field('participants_name_app', $post_id), (int)$certificate_id);
			update_field( 'passport_id', get_field('passport_id_app', $post_id), (int)$certificate_id);
			update_field( 'place_of_birth', get_field('place_of_birth_app', $post_id), (int)$certificate_id);
			update_field( 'student_nationality', get_field('nationality_app', $post_id), (int)$certificate_id);
			update_field( 'date_of_birth', get_field('date_of_birth_app', $post_id), (int)$certificate_id);
			update_field( 'office', $office, (int)$certificate_id);

		}

	}

	unset($_SESSION['certificates_ids']);
	
}

add_action( 'acf/save_post', 'update_certificate_by_app_data', 22 );