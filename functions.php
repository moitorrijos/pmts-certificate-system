<?php 

define ( 'THEMEROOT', get_template_directory_uri() );
define ( 'IMAGESPATH', THEMEROOT . '/images' );
define ( 'AUTHENTICCERTIPAGE', get_permalink( 17578 ) );
define ( 'NEW_RESOLUTION', 'DGGM-CFM-028-2019' );
define ( 'NEW_RESOLUTION_DATE', '20190430' );
define ( 'NEW_RES_EXPIRY_DATE', '20210525' );
define ( 'RESOLUTION', 'DGGM-CFM-058-2018' );
define ( 'RESOLUTION_DATE', '20181227' );
define ( 'RES_EXPIRY_DATE', '20190627' );
define ( 'OLD_RESOLUTION', 'DGGM-CFM-024-2015' );
define ( 'OLD_RESOLUTION_DATE', '20150618' );
define ( 'OLD_RES_EXPIRY_DATE', '20180618' );

/**
 * Register Styles and Scripts
 */
require get_template_directory() . '/includes/register_my_styles_and_scripts.php';
require get_template_directory() . '/includes/fill-sample-courses.php';

/**
 * Post Types
 */
require get_template_directory() . '/post-types/certificates.php';
require get_template_directory() . '/post-types/courses.php';
require get_template_directory() . '/post-types/instructors.php';
require get_template_directory() . '/post-types/resolutions.php';
require get_template_directory() . '/post-types/quotations.php';
require get_template_directory() . '/post-types/invoices.php';
require get_template_directory() . '/post-types/application-forms.php';
require get_template_directory() . '/post-types/reports.php';
require get_template_directory() . '/post-types/initial-reports.php';
require get_template_directory() . '/post-types/reports-code-title.php';
require get_template_directory() . '/post-types/initial-reports-code-title.php';
require get_template_directory() . '/post-types/quotation-code-title.php';
require get_template_directory() . '/post-types/application-form-code-title.php';
require get_template_directory() . '/post-types/certificates-post-title.php';
require get_template_directory() . '/post-types/admin-columns/custom-admin-columns-courses.php';
require get_template_directory() . '/post-types/includes/change-title-lable.php';


/**
 * Custom Fields
 */
require get_template_directory() . '/acf-custom-fields/certificates-fields.php';
require get_template_directory() . '/acf-custom-fields/courses-fields.php';
require get_template_directory() . '/acf-custom-fields/quotations-fields.php';
require get_template_directory() . '/acf-custom-fields/invoices-fields.php';
require get_template_directory() . '/acf-custom-fields/application-forms-fields.php';
require get_template_directory() . '/acf-custom-fields/resolutions-fields.php';
require get_template_directory() . '/acf-custom-fields/reports-fields.php';
require get_template_directory() . '/acf-custom-fields/initial-reports-fields.php';
require get_template_directory() . '/acf-custom-fields/instructors-fields.php';

/**
 * Custom Taxonomies
 */
require get_template_directory() . '/custom-tax/office-taxonomy.php';
require get_template_directory() . '/custom-tax/country-taxonomy.php';

/**
 * WP Specific Includes
 */
require get_template_directory() . '/includes/start_session.php';
require get_template_directory() . '/includes/search_form_remove_admin_bar.php';
require get_template_directory() . '/includes/add_html5_support.php';
require get_template_directory() . '/includes/register-nav-menus.php';
require get_template_directory() . '/includes/add-local-remote-button-admin-bar.php';
require get_template_directory() . '/includes/custom-pagination.php';
require get_template_directory() . '/includes/ajax-login.php';

/**
 * Custom Functions
 */
require get_template_directory() . '/includes/acf-total-certificate-number.php';
require get_template_directory() . '/includes/acf-save-post-data.php';
require get_template_directory() . '/includes/acf-remove-post-data.php';
require get_template_directory() . '/includes/fill-form-randomly.php';
require get_template_directory() . '/includes/fill-deck-courses.php';
require get_template_directory() . '/includes/fill-engine-courses.php';
require get_template_directory() . '/includes/fill-yacht-courses.php';
require get_template_directory() . '/includes/my_courses_post_object_results.php';
require get_template_directory() . '/includes/add_leading_zeroes.php';
require get_template_directory() . '/includes/certificate-exists-validation.php';
require get_template_directory() . '/includes/duplicate-quote-pmtscs.php';
require get_template_directory() . '/includes/duplicate-application-pmtscs.php';
require get_template_directory() . '/includes/approve-quote-pmtscs.php';
require get_template_directory() . '/includes/create-certificate-pmtscs.php';
require get_template_directory() . '/includes/create-table-with.php';
require get_template_directory() . '/includes/update_certificate_by_app_data.php';
require get_template_directory() . '/includes/get_participant_number.php';
require get_template_directory() . '/includes/certificate_exists.php';
require get_template_directory() . '/includes/pmtscs_report_dates.php';
/**
 * Ajax calls
 */
require get_template_directory() . '/includes/search-by-id-passport.php';
require get_template_directory() . '/includes/search-passport-application.php';
require get_template_directory() . '/includes/delete-application.php';
require get_template_directory() . '/includes/search-certificates.php';
require get_template_directory() . '/includes/search-quotations.php';
require get_template_directory() . '/includes/send-application-pmtscs.php';
require get_template_directory() . '/includes/search-application-form.php';
require get_template_directory() . '/includes/check-certificate-authenticity.php';
require get_template_directory() . '/includes/filter-by-date.php';

/**
 * Includes for application
 */
require get_template_directory() . '/includes/pmtscs_header_for_print.php';
require get_template_directory() . '/includes/student_info_complete_table.php';
require get_template_directory() . '/includes/student_info_short_table.php';
require get_template_directory() . '/includes/practical_exam_results.php';
require get_template_directory() . '/includes/instructor_signature.php';

/**
 * Meta Boxes
 */
require get_template_directory() . '/meta-boxes/pmtscs-register-meta-boxes.php';

function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

function pmtscs_price_sum($carry, $item) {
    $carry += $item;
    return $carry;
}

function pmtscs_author_details($post_ID)  {
	$auth = get_post($post_ID); // gets author from post
	$authid = $auth->post_author; // gets author id for the post
	$user_firstname = get_the_author_meta('user_firstname',$authid); // retrieve firstname
	$user_lastname = get_the_author_meta('user_lastname',$authid); // retrieve firstname

	return $user_firstname . ' ' . $user_lastname;
}

function is_next_month( int $the_month ) {
	$current_month = date('m');
	if ($the_month > (int)$current_month) return true;
	return false;
}


function flatten_array ($array_to_flatten){
	return (int)$array_to_flatten[0];
}

function initial_reports($end_date, $start_date, $instructor, $course) {
	global $wpdb;
	$end_date_app_ids = $wpdb->get_results("select distinct post_id 
		from {$wpdb->prefix}postmeta 
		where meta_key like 'courses_app_%_end_date_app' 
		and meta_value=" . $end_date . "", ARRAY_N);
	if ($end_date_app_ids) { $end_date_app_ids = array_map('flatten_array', $end_date_app_ids); }
	$start_date_app_ids = $wpdb->get_results("select distinct post_id 
		from {$wpdb->prefix}postmeta 
		where meta_key like 'courses_app_%_start_date_app' 
		and meta_value=" . $start_date . " 
		and post_id in (" . implode(",", $end_date_app_ids) . ")", ARRAY_N);
	if ($start_date_app_ids) { $start_date_app_ids = array_map('flatten_array', $start_date_app_ids); }
	$instructor_app_ids = $wpdb->get_results("select distinct post_id 
		from {$wpdb->prefix}postmeta 
		where meta_key 
		like 'courses_app_%_instructor_name_app' 
		and meta_value=" . $instructor->ID . " 
		and post_id in (" . implode(",", $start_date_app_ids) . ")", ARRAY_N);
	if ($instructor_app_ids) { $instructor_app_ids = array_map('flatten_array', $instructor_app_ids); }
	$courses_app_ids = $wpdb->get_results("select distinct post_id 
		from {$wpdb->prefix}postmeta 
		where meta_key 
		like 'courses_app_%_course_name_app' 
		and meta_value=" . (int)$course->ID . " 
		and post_id in (" . implode(",", $instructor_app_ids) . ")", ARRAY_N);
	if ($courses_app_ids) { $courses_app_ids = array_map('flatten_array', $courses_app_ids); }
	return $courses_app_ids;
}