<?php 

define ( 'THEMEROOT', get_template_directory_uri() );
define ( 'IMAGESPATH', THEMEROOT . '/images' );

function register_my_styles_and_scripts() {

	wp_enqueue_style( 'main_style', THEMEROOT . '/css/main.css', array(), '2015', 'all' );
	wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:700', array(), '2015', 'all');

}

add_action( 'wp_enqueue_scripts', 'register_my_styles_and_scripts' );