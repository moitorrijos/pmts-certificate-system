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
			'redirecturl' 	=> home_url(),
			'security'		=> wp_create_nonce( 'pmtscs_login' ),
			'errormessage' 	=> 'Sorry, username and password ane incorrect. Please try again, or contact administrator for password reset.',
		) );
		
	}

	if ( is_page_template( 'new_panama_certificate.php' ) ) {

		wp_enqueue_script( 'search_passport', THEMEROOT . '/js/search-passport.js', array('jquery'), '20160421', true );

		wp_localize_script( 'search_passport', 'pmtscs_ajax_object', array(
			'security' => wp_create_nonce( 'pmtscs_passport' ),
			'ajaxurl' => admin_url( 'admin-ajax.php' ) )
		);

		wp_enqueue_script( 'form-field-magic', THEMEROOT . '/js/min/form-field-magic-min.js', array('jquery'), '20160422', true );

	}

	if ( is_page_template( 'new_application_form_page.php' ) ) {

		wp_enqueue_script( 'country-to-nationality', THEMEROOT . '/js/min/country-to-nationality-min.js', array('jquery'), '20160422', true );

	}

	if ( is_page_template( 'panama-certificate-page.php' ) ) {

		wp_enqueue_script( 'search_certificates', THEMEROOT . '/js/search-certificates.js', array('jquery'), '20160603', true );

		wp_localize_script( 'search_certificates', 'certificates_object', array(
				'security' 	=> wp_create_nonce( 'pmtscs_certificates' ),
				'ajaxurl'	=> admin_url( 'admin-ajax.php' )
			) 
		);

	}

	if ( is_page_template( 'panama-quotation-page.php' ) ) {

		wp_enqueue_script( 'search_quotation', THEMEROOT . '/js/search-quotation.js', array('jquery'), '20160603', true );

		wp_localize_script( 'search_quotation', 'quotation_object', array(
				'security' 	=> wp_create_nonce( 'pmtscs_quotation' ),
				'ajaxurl'	=> admin_url( 'admin-ajax.php' )
			)
		);

	}

	if ( is_singular( 'certificates' ) ) {

		wp_enqueue_script( 'form-field-magic', THEMEROOT . '/js/min/form-field-magic-min.js', array('jquery'), '20160422', true );

		wp_enqueue_script( 'author_information', THEMEROOT . '/js/min/author-information-min.js', array('jquery'), '20160422', true );

	}

	if ( is_singular( 'reports' ) ) {

		wp_enqueue_script( 'reports_js', THEMEROOT . '/js/report.js', array('jquery'), '20160720', true );

	}

	if ( is_singular( 'applications' ) ) {

		wp_enqueue_script( 'application_form', THEMEROOT . '/js/application-form.js', array('jquery'), '20160720', true );

		wp_enqueue_script( 'send_application', THEMEROOT . '/js/send-application.js', array('jquery'), '20170404', true );

		wp_localize_script( 'send_application', 'send_application_obj', array(
				'security'	=> wp_create_nonce( 'send_application_nonce' ),
				'ajaxurl'	=> admin_url('admin-ajax.php'),
			) 
		);

	}

	if ( is_singular( 'quotation' ) ) {

		wp_enqueue_script( 'quotation-js', THEMEROOT . '/js/quotation.js', array('jquery'), '20160317', true );

		wp_enqueue_script( 'create_invoice', THEMEROOT . '/js/create-invoice.js', array('jquery'), '20161220', true );

		wp_enqueue_script( 'duplicate_quotation', THEMEROOT . '/js/duplicate-quotation.js', array('jquery'), '20170321', true );

		wp_localize_script( 'duplicate_quotation', 'duplicate_quote_obj', array(
				'security'	=> wp_create_nonce( 'duplicate_quote_nonce' ),
				'ajaxurl'	=> admin_url( 'admin-ajax.php' ),
				'redirect_url'	=> get_permalink( 222 ),
			) 
		);		

		wp_localize_script( 'create_invoice', 'new_invoice_object', array(
				'security'	=> wp_create_nonce( 'new_invoice_nonce' ),
				'ajaxurl'	=> admin_url( 'admin-ajax.php' ),
			) 
		);
	}

}

add_action( 'wp_enqueue_scripts', 'register_my_styles_and_scripts' );