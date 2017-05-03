<?php 

define ( 'THEMEROOT', get_template_directory_uri() );
define ( 'IMAGESPATH', THEMEROOT . '/images' );

/**
 * Register Styles and Scripts
 */
require get_template_directory() . '/includes/register_my_styles_and_scripts.php';

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
require get_template_directory() . '/post-types/quotation-code-title.php';
require get_template_directory() . '/post-types/reports-code-title.php';
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
require get_template_directory() . '/includes/my_courses_post_object_results.php';
require get_template_directory() . '/includes/add_leading_zeroes.php';
require get_template_directory() . '/includes/certificate-exists-validation.php';
require get_template_directory() . '/includes/duplicate-quote-pmtscs.php';
require get_template_directory() . '/includes/create-certificate-pmtscs.php';
require get_template_directory() . '/includes/create-table-with.php';
require get_template_directory() . '/includes/update_certificate_by_app_data.php';
require get_template_directory() . '/includes/get_participant_number.php';

/**
 * Ajax calls
 */
require get_template_directory() . '/includes/search-by-id-passport.php';
require get_template_directory() . '/includes/search-passport-application.php';
require get_template_directory() . '/includes/search-certificates.php';
require get_template_directory() . '/includes/search-quotations.php';
require get_template_directory() . '/includes/send-application-pmtscs.php';
require get_template_directory() . '/includes/search-application-form.php';

/**
 * Includes for application
 */
require get_template_directory() . '/includes/pmtscs_header_for_print.php';
require get_template_directory() . '/includes/student_info_complete_table.php';
require get_template_directory() . '/includes/student_info_short_table.php';
require get_template_directory() . '/includes/practical_exam_results.php';

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