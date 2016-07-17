<?php

function save_post_course_id( $post_id ) {

	$new_certificate_template = '/new_panama_certificate.php';

	$page = '/page.php';

	$page_template = get_page_template();

	$template_dir = get_template_directory();

	$template_string = str_replace($template_dir, '', $page_template);

	if( $template_string == $new_certificate_template && get_post_type( $post_id ) == 'certificates' ){

		/**
		 * Get the Course Field
		 * @var string
		 */
		$course = get_field('course', $post_id);
		
		/**
		 * Get the office object and access the name property
		 * @var string
		 */
		$office = get_field('office', $post_id);

		$total_panama_certificates = get_field('total_panama_certificates', $course->ID);

		$total_peru_certificates = get_field('total_peru_certificates', $course->ID);
		
		$total_greece_certificates = get_field('total_greece_certificates', $course->ID);
		
		$total_egypt_certificates = get_field('total_egypt_certificates', $course->ID);

		$total_guyana_certificates = get_field('total_guyana_certificates', $course->ID);

		$total_south_africa_certificates = get_field('total_south_africa_certificates', $course->ID);

		$total_india_certificates = get_field('total_india_certificates', $course->ID);

		/**
		 * Switch Case for certificate register code
		 * This adds one to total certificate according to the office number and course taken.
		 */

		switch ( (string) $office->name ) {
			case 'Panama':
				update_field('total_panama_certificates', $total_panama_certificates+1, $course->ID);
				update_post_meta($post_id, 'register_code', $total_panama_certificates+1);
				break;

			case 'Peru':
				update_field('total_peru_certificates', $total_peru_certificates+1, $course->ID);
				update_post_meta($post_id, 'register_code', $total_peru_certificates+1);
				break;

			case 'Greece':
				update_field('total_greece_certificates', $total_greece_certificates+1, $course->ID);
				update_post_meta($post_id, 'register_code', $total_greece_certificates+1);
				break;

			case 'Egypt':
				update_field('total_egypt_certificates', $total_egypt_certificates+1, $course->ID);
				update_post_meta($post_id, 'register_code', $total_egypt_certificates+1);
				break;

			case 'Guyana':
				update_field('total_egypt_certificates', $total_egypt_certificates+1, $course->ID);
				update_post_meta($post_id, 'register_code', $total_egypt_certificates+1);
				break;

			case 'South Africa':
				update_field('total_south_africa_certificates', $total_south_africa_certificates+1, $course->ID);
				update_post_meta($post_id, 'register_code', $total_south_africa_certificates+1);
				break;

			case 'India':
				update_field('total_india_certificates', $total_india_certificates+1, $course->ID);
				update_post_meta($post_id, 'register_code', $total_india_certificates+1);
				break;
			
			default:
				function doer_of_stuff() {
				    return new WP_Error( 'broke', __( "I've fallen and can't get up", "certificate_system" ) );
				}

				$return = doer_of_stuff();
				if( is_wp_error( $return ) ) {
				    echo $return->get_error_message();
				}
				break;
		}

		/**
		 * Issue Dates an Register Code
		 */

		$issue_date = DateTime::createFromFormat( 'Ymd', get_field('date_of_issuance', $post_id) );

		$issue_month = $issue_date->format('m');

		$issue_year = $issue_date->format('y');

		$register_code =  get_post_meta($post_id, 'register_code', true);

		/**
		 * The leading zeroes for the Register Code.
		 */

		if ( $register_code > 9999 ) {

			$leading_zero = '';

		} elseif ( $register_code > 999 && $register_code <= 9999 ) {

			$leading_zero = '0';

		} elseif ( $register_code > 99 && $register_code <= 999 ) {

			$leading_zero = '00';

		} elseif ( $register_code > 9 && $register_code <= 99 ) {

			$leading_zero = '000';

		} else {

			$leading_zero = '0000';
		}

		$pmtscs_register_code_value = 'PMTS/' . $course->abbr . '/' . $issue_year . '-' . $office->slug . '-' . $leading_zero . $register_code;

		update_post_meta($post_id, 'pmtscs_register_code', $pmtscs_register_code_value);

	}
}

add_action('acf/save_post', 'save_post_course_id', 20);