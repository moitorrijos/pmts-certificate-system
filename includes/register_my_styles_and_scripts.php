<?php

function register_my_styles_and_scripts() {

	wp_enqueue_style( 'main_style', THEMEROOT . '/css/main.css', array(), '122', 'all' );
	wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:700', array(), '2015', 'all');
	wp_enqueue_script( 'listmin-js', THEMEROOT . '/js/min/list-min.js', array(), '20151118', true);
	wp_enqueue_script( 'main-js', THEMEROOT . '/js/min/main-min.js', array('jquery'), '230', true);

	if ( is_front_page() || is_home() ) {

		wp_enqueue_script( 'ajax_login', THEMEROOT . '/js/ajax-login.js', array('jquery'), '20160505', true );

		wp_localize_script( 'ajax_login', 'ajax_obj', array(
			'ajaxurl'		=> admin_url( 'admin-ajax.php' ),
			'redirecturl' 	=> get_permalink( 7188 ),
			'security'		=> wp_create_nonce( 'pmtscs_login' ),
			'errormessage' 	=> 'Sorry, username and password ane incorrect. Please try again, or contact administrator for password reset.',
		) );
		
	}

	if ( is_page_template( 'new_panama_certificate.php' ) ) {

		wp_enqueue_script( 'form-field-magic', THEMEROOT . '/js/min/form-field-magic-min.js', array('jquery'), '20170912', true );

	}

	if ( is_page_template( 'new_application_form_page.php' ) ) {

		wp_enqueue_script( 'velocity_js', THEMEROOT . '/js/min/velocity-min.js', 'jquery', '150', true );
		wp_enqueue_script( 'country-to-nationality', THEMEROOT . '/js/min/country-to-nationality-min.js', array('jquery'), '20160422', true );
		wp_enqueue_script( 'form-field-magic', THEMEROOT . '/js/min/form-field-magic-min.js', array('jquery'), '20170912', true );
		wp_enqueue_script( 'search_passport_app', THEMEROOT . '/js/search-passport-application.js', array('jquery'), '20170412', true );

		wp_localize_script( 'search_passport_app', 'passport_obj_app', array(
			'security' 	=> wp_create_nonce('pmtscs_passport_app'),
			'ajaxurl' 	=> admin_url( 'admin-ajax.php' ),
		) );

	}

	if ( is_page_template( 'panama-certificate-page.php' ) ) {

		wp_enqueue_style( 'jquery-ui-datepicker-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), 'all' );
		wp_enqueue_script( 'jquery-ui-datepicker' );
		wp_enqueue_script( 'filter_by_date', THEMEROOT . '/js/filter-by-date.js', array( 'jquery', 'jquery-ui-datepicker'), '6', true );
		wp_localize_script( 'filter_by_date', 'filter_object', array(
				'security' 	=> wp_create_nonce( 'pmtscs_filter_nonce' ),
				'ajax_action'		=> 'filter_by_date',
				'ajaxurl' 	=> admin_url( 'admin-ajax.php'),
			) 
		);

		wp_enqueue_script( 'search_certificates', THEMEROOT . '/js/search-certificates.js', array('jquery'), '20160603', true );

		wp_localize_script( 'search_certificates', 'certificates_object', array(
				'security' 	=> wp_create_nonce( 'pmtscs_certificates' ),
				'ajaxurl'	=> admin_url( 'admin-ajax.php' ),
			) 
		);

	}

	if ( is_page_template( 'panama-quotation-page.php' ) ) {

		wp_enqueue_script( 'search_quotation', THEMEROOT . '/js/search-quotation.js', array('jquery'), '23', true );

		wp_localize_script( 'search_quotation', 'quotation_object', array(
				'security' 	=> wp_create_nonce( 'pmtscs_quotation' ),
				'ajaxurl'	=> admin_url( 'admin-ajax.php' )
			)
		);

		wp_enqueue_style( 'jquery-ui-datepicker-css', '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css', array(), 'all' );

		wp_enqueue_script( 'filter_by_date', THEMEROOT . '/js/filter-by-date.js', array( 'jquery', 'jquery-ui-datepicker'), '6', true );

		wp_localize_script( 'filter_by_date', 'filter_object', array(
				'security' 	=> wp_create_nonce( 'pmtscs_filter_nonce' ),
				'ajax_action'		=> 'filter_quotation_by_date',
				'ajaxurl' 	=> admin_url( 'admin-ajax.php'),
			) 
		);

	}

	if ( is_page_template( 'application-form-page.php' )) {

		wp_enqueue_script( 'search_application', THEMEROOT . '/js/search-application.js', array('jquery'), '20170422', true );

		wp_localize_script( 'search_application', 'application_object', array(
				'security'	=> wp_create_nonce( 'search_application_nonce' ),
				'ajaxurl'	=> admin_url( 'admin-ajax.php' ),
			) 
		);

		wp_enqueue_script( 'delete_application', THEMEROOT . '/js/delete-application.js', array('jquery'), '22', true );

		wp_localize_script( 'delete_application', 'delete_app_obj', array(
				'security'	=> wp_create_nonce( 'delete_app_nonce' ),
				'ajaxurl'	=> admin_url( 'admin-ajax.php' ),
			) 
		);

	}

	if ( is_page_template( 'pmts-certificate-check-page.php' ) ) {

		wp_enqueue_script( 'certificate_check_page', THEMEROOT . '/js/certificate-check-page.js', array('jquery'), '22', true );
		
		wp_localize_script( 'certificate_check_page', 'check_object', array(
				'security'	=> wp_create_nonce( 'check_certificate_nonce'),
				'ajaxurl'	=> admin_url( 'admin-ajax.php' ),
				'check_url' => AUTHENTICCERTIPAGE
			) 
		);

	}

	if ( is_singular( 'certificates' ) ) {

		wp_enqueue_script( 'velocity_js', THEMEROOT . '/js/min/velocity-min.js', 'jquery', '150', true );

		wp_enqueue_script( 'form-field-magic', THEMEROOT . '/js/min/form-field-magic-min.js', array('jquery'), '20171015', true );

		wp_enqueue_script( 'author_information', THEMEROOT . '/js/min/author-information-min.js', array('jquery'), '20160422', true );

		wp_enqueue_script( 'qrcode-client', THEMEROOT . '/js/min/qrcode-client-min.js', array('jquery'), '24', true );
		
		wp_localize_script( 'qrcode-client', 'qrcode_obj', array(
				'qr_url' => AUTHENTICCERTIPAGE
			)
		);

	}

	if ( is_singular( 'reports' ) ) {

		wp_enqueue_script( 'reports_js', THEMEROOT . '/js/report.js', array('jquery'), '20160720', true );

	}

	if ( is_singular( 'applications' ) ) {

		wp_enqueue_script( 'velocity_js', THEMEROOT . '/js/min/velocity-min.js', 'jquery', '150', true );

		wp_enqueue_script( 'application_form', THEMEROOT . '/js/application-form.js', array('jquery'), '20180204', true );

		wp_enqueue_script( 'create_certificate', THEMEROOT . '/js/create-certificate.js', array('jquery'), '20201130', true );

		wp_enqueue_script( 'duplicate_application', THEMEROOT . '/js/duplicate-application.js', array( 'jquery' ), '20170509', true );

		wp_enqueue_script( 'full_class', THEMEROOT . '/js/full-class.js', array('jquery'), '20180518', true );

		wp_localize_script( 'duplicate_application', 'duplicate_application_obj', array(
				'security' 	=> wp_create_nonce( 'duplicate_application_nonce' )	,
				'ajaxurl' 	=> admin_url( 'admin-ajax.php' ),
				'new_application_url' => get_permalink( 7190 ),
			) 
		);

		wp_localize_script( 'send_application', 'send_application_obj', array(
				'security'	=> wp_create_nonce( 'send_application_nonce' ),
				'ajaxurl'	=> admin_url('admin-ajax.php'),
			) 
		);

		wp_localize_script( 'create_certificate', 'create_certificate_obj', array(
				'security'				=> wp_create_nonce( 'create_certificate_nonce' ),
				'ajaxurl'				=> admin_url('admin-ajax.php'),
				'new_certificate_url' 	=> get_permalink( 32 ),
			) 
		);

	}

	if ( is_singular( 'quotation' ) ) {

		wp_enqueue_script( 'quotation-js', THEMEROOT . '/js/quotation.js', array('jquery'), '20160317', true );

		wp_enqueue_script( 'approve_quotation', THEMEROOT . '/js/approve-quotation.js', array('jquery'), '20170919', true );
		
		wp_enqueue_script( 'change_to_euro', THEMEROOT . '/js/change-to-euro.js', array('jquery'), '20191023', true );

		wp_localize_script( 'approve_quotation', 'approve_quote_obj', array(
				'security' 		=> wp_create_nonce( 'approve_quote_nonce' ),
				'ajaxurl' 		=> admin_url( 'admin-ajax.php' ),
				'new_app_url'	=> get_permalink( 7190 ),
			)
		);

		wp_enqueue_script( 'duplicate_quotation', THEMEROOT . '/js/duplicate-quotation.js', array('jquery'), '20170321', true );

		wp_localize_script( 'duplicate_quotation', 'duplicate_quote_obj', array(
				'security'		=> wp_create_nonce( 'duplicate_quote_nonce' ),
				'ajaxurl'		=> admin_url( 'admin-ajax.php' ),
				'redirect_url'	=> get_permalink( 222 ),
			) 
		);
	}
}

add_action( 'wp_enqueue_scripts', 'register_my_styles_and_scripts' );