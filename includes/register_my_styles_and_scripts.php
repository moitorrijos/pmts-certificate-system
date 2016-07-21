<?php

function register_my_styles_and_scripts() {

	wp_enqueue_style( 'main_style', THEMEROOT . '/css/main.css', array(), '2015', 'all' );

	wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:700', array(), '2015', 'all');

	wp_enqueue_script( 'listmin-js', THEMEROOT . '/js/min/list-min.js', array(), '20151118', true);

	wp_enqueue_script( 'main-js', THEMEROOT . '/js/min/main-min.js', array('jquery'), '20151118', true);

	if ( is_front_page() || is_home() ) {

		wp_enqueue_script( 'ajax_login', THEMEROOT . '/js/ajax-login.js', array('jquery'), '20160505', true );

		wp_localize_script( 'ajax_login', 'ajax_obj', array(
			'ajaxurl'		=> admin_url( 'admin-ajax.php' ),
			'redirecturl' 	=> 'panama-certificates',
			'security'		=> wp_create_nonce( 'pmtscs_login' ),
			'errormessage' 	=> 'Sorry, username and password ane incorrect. Please try again, or contact administrator for password reset.',
		) );
		
	}

	if ( is_page_template( 'new_panama_certificate.php' ) ) {

		wp_enqueue_script( 'moment-js', THEMEROOT . '/js/moment.js', array(), '20160428', true );

		wp_enqueue_script( 'search_passport', THEMEROOT . '/js/search-passport.js', array('jquery'), '20160421', true );

		wp_localize_script( 'search_passport', 'pmtscs_ajax_object', array(
			'security' => wp_create_nonce( 'pmtscs_passport' ),
			'ajaxurl' => admin_url( 'admin-ajax.php' ) )
		);

		wp_enqueue_script( 'form-field-magic', THEMEROOT . '/js/form-field-magic.js', array('jquery'), '20160422', true );

	}

	if ( is_page_template( 'panama-certificate-page.php' ) ) {

		wp_enqueue_script( 'search_certificates', THEMEROOT . '/js/search-certificates.js', array('jquery'), '20160603', true );

		wp_localize_script( 'search_certificates', 'certificates_object', array(
				'security' 	=> wp_create_nonce( 'pmtscs_certificates' ),
				'ajaxurl'	=> admin_url( 'admin-ajax.php' )
			) 
		);

	}

	if ( is_singular( 'reports' ) ) {

		wp_enqueue_script( 'reports_js', THEMEROOT . '/js/report.js', array('jquery'), '20160720', true );

	}

	if ( is_singular( 'quotation' ) ) {

		wp_enqueue_script( 'quotation-js', THEMEROOT . '/js/quotation.js', array('jquery'), '20160317', true );

	}

	/*if ( is_page( array( 8, 208 ) ) ) {

		wp_enqueue_script( 'reload_js', THEMEROOT . '/js/reload-page.js', array(), '20160405', true );
	
	}*/

}

add_action( 'wp_enqueue_scripts', 'register_my_styles_and_scripts' );