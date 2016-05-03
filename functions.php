<?php 


define ( 'THEMEROOT', get_template_directory_uri() );
define ( 'IMAGESPATH', THEMEROOT . '/images' );

function register_my_styles_and_scripts() {

	wp_enqueue_style( 'main_style', THEMEROOT . '/css/main.css', array(), '2015', 'all' );

	wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:700', array(), '2015', 'all');

	wp_enqueue_script( 'main-js', THEMEROOT . '/js/min/main-min.js', array('jquery'), '20151118', true);

	wp_enqueue_script( 'listmin-js', THEMEROOT . '/js/min/list-min.js', array(), '20151118', true);

	if ( is_page_template( 'new_panama_certificate.php' ) ) {

		wp_enqueue_script( 'moment-js', THEMEROOT . '/js/moment.js', array(), '20160428', true );

		wp_enqueue_script( 'search_passport', THEMEROOT . '/js/search-passport.js', array('jquery'), '20160421', true );

		wp_localize_script( 'search_passport', 'pmtscs_ajax_object', array(
			'security' => wp_create_nonce( 'pmtscs_passport' ),
			'ajaxurl' => admin_url( 'admin-ajax.php' ) )
		);

		wp_enqueue_script( 'form-field-magic', THEMEROOT . '/js/form-field-magic.js', array('jquery'), '20160422', true );

	}

	if ( is_page_template( 'panama-courses-calendar-page.php' ) ) {

		wp_enqueue_style( 'fullcalendar-css', '//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.0/fullcalendar.min.css', array(), '20160428', 'all' );

		wp_enqueue_style( 'fullcalendar-print-css', '//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.0/fullcalendar.print.css', array(), '20160428', 'all' );

		wp_enqueue_script( 'moment-js', THEMEROOT . '/js/moment.js', array(), '20160428', true );

		wp_enqueue_script( 'fullcalendar-js', '//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.7.0/fullcalendar.min.js', array( 'jquery' ), '20160428', true );

		wp_enqueue_script( 'courses-calendar-js', THEMEROOT . '/js/courses-calendar.js', array('jquery'), '20160428', true );

	}

	if ( is_singular( 'quotation' ) ) {

		wp_enqueue_script( 'quotation-js', THEMEROOT . '/js/quotation.js', array('jquery'), '20160317', true );

	}

	if ( is_page( array( 8, 208 ) ) ) {

		wp_enqueue_script( 'reload_js', THEMEROOT . '/js/reload-page.js', array(), '20160405', true );
	
	}

}

add_action( 'wp_enqueue_scripts', 'register_my_styles_and_scripts' );

show_admin_bar(false);

function search_form() {
	
	return get_search_form();

}

add_shortcode( 'search', 'search_form' );

require get_template_directory() . '/includes/add_html5_support.php';
require get_template_directory() . '/includes/register-nav-menus.php';
require get_template_directory() . '/post-types/certificates.php';
require get_template_directory() . '/post-types/courses.php';
require get_template_directory() . '/post-types/instructors.php';
require get_template_directory() . '/post-types/resolutions.php';
require get_template_directory() . '/post-types/offices.php';
require get_template_directory() . '/post-types/quotations.php';
require get_template_directory() . '/post-types/quotation-code-title.php';
require get_template_directory() . '/post-types/admin-columns/custom-admin-columns-courses.php';
require get_template_directory() . '/post-types/includes/change-title-lable.php';
require get_template_directory() . '/post-types/custom-fields/acf-code.php';
require get_template_directory() . '/includes/acf-total-certificate-number.php';
require get_template_directory() . '/includes/acf-save-post-data.php';
require get_template_directory() . '/includes/acf-remove-post-data.php';
require get_template_directory() . '/includes/add-local-remote-button-admin-bar.php';
require get_template_directory() . '/includes/search-by-id-passport.php';