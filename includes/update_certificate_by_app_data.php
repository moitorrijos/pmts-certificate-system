<?php

function save_application_id_data( $post_id ) {

	global $wpdb;

	// If we are editing an application get the old passport number and save to session
	if ( is_singular( 'applications' ) ) {

		$passport_id_app = get_field( 'passport_id_app', $post_id );

		$certificate_ids_by_passport = $wpdb->get_results(

		$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_key="passport_id" AND meta_value="' . (string)$passport_id_app . '" ORDER BY post_id DESC')

		);

		if ( $certificate_ids_by_passport ) {

			$_SESSION['certificates_ids'] = array();

			foreach ( $certificate_ids_by_passport as $key => $row ) {

				array_push( $_SESSION['certificates_ids'], $row->post_id );
				
			}

		} else {

			$participants_name_app = get_field( 'participants_name_app', $post_id );

			$certificate_ids_by_name = $wpdb->get_results(

				$wpdb->prepare('SELECT post_id FROM fytv_postmeta WHERE meta_key="students_name" AND meta_value="' . (string)$participants_name_app . '" ORDER BY post_id DESC')

			);

			$_SESSION['certificates_ids'] = array();

			foreach ( $certificate_ids_by_name as $key => $row ) {

				array_push( $_SESSION['certificates_ids'], $row->post_id );
				
			}

		}

	}

}

add_action( 'acf/save_post', 'save_application_id_data', 10 );

function update_certificate_by_app_data( $post_id ) {

	if ( isset($_SESSION['certificate_ids']) && is_singular( 'applications' )) {

		$certificate_ids = $_SESSION['certificates_ids'];

		foreach ($certificate_ids as $certificate_id) {
			
			update_field( 'students_name', get_field('participants_name_app', $post_id), (int)$certificate_id);
			update_field( 'passport_id', get_field('passport_id_app', $post_id), (int)$certificate_id);
			update_field( 'place_of_birth', get_field('place_of_birth_app', $post_id), (int)$certificate_id);
			update_field( 'student_nationality', get_field('nationality_app', $post_id), (int)$certificate_id);
			update_field( 'date_of_birth', get_field('date_of_birth_app', $post_id), (int)$certificate_id);

		}

	}

	unset($_SESSION['certificates_ids']);
	
}

add_action( 'acf/save_post', 'update_certificate_by_app_data', 20 );