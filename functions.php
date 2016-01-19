<?php 


define ( 'THEMEROOT', get_template_directory_uri() );
define ( 'IMAGESPATH', THEMEROOT . '/images' );

function register_my_styles_and_scripts() {

	wp_enqueue_style( 'main_style', THEMEROOT . '/css/main.css', array(), '2015', 'all' );

	wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:700', array(), '2015', 'all');

	wp_enqueue_script( 'main-js', THEMEROOT . '/js/min/main-min.js', array(), '20151118', true);

	wp_enqueue_script( 'listmin-js', THEMEROOT . '/js/min/list-min.js', array(), '20151118', true);

}

add_action( 'wp_enqueue_scripts', 'register_my_styles_and_scripts' );

show_admin_bar(false);

require get_template_directory() . '/includes/register-nav-menus.php';
require get_template_directory() . '/post-types/certificates.php';
require get_template_directory() . '/post-types/courses.php';
require get_template_directory() . '/post-types/instructors.php';
require get_template_directory() . '/post-types/resolutions.php';
require get_template_directory() . '/post-types/offices.php';
require get_template_directory() . '/post-types/admin-columns/custom-admin-columns-courses.php';
require get_template_directory() . '/post-types/includes/change-title-lable.php';
require get_template_directory() . '/post-types/custom-fields/acf-code.php';
require get_template_directory() . '/includes/acf-total-certificate-number.php';
require get_template_directory() . '/includes/acf-save-post-data.php';
require get_template_directory() . '/includes/acf-remove-post-data.php';