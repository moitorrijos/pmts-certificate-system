<?php 

define ( 'THEMEROOT', get_template_directory_uri() );
define ( 'IMAGESPATH', THEMEROOT . '/images' );

function register_my_styles_and_scripts() {

	wp_enqueue_style( 'main_style', THEMEROOT . '/css/main.css', array(), '2015', 'all' );
	wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:700', array(), '2015', 'all');

	wp_enqueue_script ( 'download_xls', THEMEROOT . '/js/min/main-min.js', array('jquery'), '2015' );
}

add_action( 'wp_enqueue_scripts', 'register_my_styles_and_scripts' );

require get_template_directory() . '/includes/register-nav-menus.php';
require get_template_directory() . '/post-types/certificates.php';
require get_template_directory() . '/post-types/courses.php';
require get_template_directory() . '/post-types/instructors.php';
require get_template_directory() . '/post-types/resolutions.php';
require get_template_directory() . '/post-types/offices.php';
require get_template_directory() . '/post-types/admin-columns/custom-admin-columns-courses.php';
require get_template_directory() . '/post-types/includes/change-title-lable.php';