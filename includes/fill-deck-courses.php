<?php

// add_action( 'wp_ajax_fill_deck_courses', 'ajax_fill_deck_courses' );

// function ajax_fill_deck_courses() {

// 	$row = array(
// 		'course_name' 	=> get_the_title( 92 ),
// 		'quantity'		=> 1,
// 	);


// 	return wp_send_json_success( 'Hello' );

// }

function fill_deck_courses( $field ) {

	if( isset($_GET['action']) && $_GET['action'] == 'fill_deck_courses') {

		if ( $field['key'] == 'field_56e04a740c977' ){

			$field['value'] = array(

				array( 'field_56e04a980c978' => 92 ),
				array( 'field_56e04a980c978' => 91 ),
				array( 'field_56e04a980c978' => 96 ),
				array( 'field_56e04a980c978' => 69 ),
				array( 'field_56e04a980c978' => 62 ),

			);

		}
	
	}
	
	return $field;

}

add_action( 'acf/load_field/key=field_56e04a740c977', 'fill_deck_courses' );

function fill_master_courses( $field ) {

	if( isset($_GET['action']) && $_GET['action'] == 'fill_master_courses') {

		if ( $field['key'] == 'field_56e04a740c977' ){

			$field['value'] = array(

				array( 'field_56e04a980c978' => 92 ),
				array( 'field_56e04a980c978' => 91 ),
				array( 'field_56e04a980c978' => 96 ),
				array( 'field_56e04a980c978' => 69 ),
				array( 'field_56e04a980c978' => 71 ),
				array( 'field_56e04a980c978' => 70 ),
				array( 'field_56e04a980c978' => 61 ),
				array( 'field_56e04a980c978' => 50 ),
				array( 'field_56e04a980c978' => 49 ),
				array( 'field_56e04a980c978' => 73 ),
				array( 'field_56e04a980c978' => 79 ),
				array( 'field_56e04a980c978' => 72 ),
				array( 'field_56e04a980c978' => 55 ),
				array( 'field_56e04a980c978' => 81 ),
				array( 'field_56e04a980c978' => 97 ),
				array( 'field_56e04a980c978' => 65 ),
				array( 'field_56e04a980c978' => 80 ),
				array( 'field_56e04a980c978' => 75 ),
				array( 'field_56e04a980c978' => 78 ),

			);

		}
	
	}
	
	return $field;

}

add_action( 'acf/load_field/key=field_56e04a740c977', 'fill_master_courses' );

function fill_chief_engine( $field ) {

	if( isset($_GET['action']) && $_GET['action'] == 'fill_chief_engine') {

		if ( $field['key'] == 'field_56e04a740c977' ){

			$field['value'] = array(

				array( 'field_56e04a980c978' => 92 ),
				array( 'field_56e04a980c978' => 91 ),
				array( 'field_56e04a980c978' => 96 ),
				array( 'field_56e04a980c978' => 69 ),
				array( 'field_56e04a980c978' => 71 ),
				array( 'field_56e04a980c978' => 70 ),
				array( 'field_56e04a980c978' => 61 ),
				array( 'field_56e04a980c978' => 49 ),
				array( 'field_56e04a980c978' => 72 ),
				array( 'field_56e04a980c978' => 55 ),
				array( 'field_56e04a980c978' => 66 ),
				array( 'field_56e04a980c978' => 58 ),
				array( 'field_56e04a980c978' => 75 ),
				array( 'field_56e04a980c978' => 78 ),

			);

		}
	
	}
	
	return $field;

}

add_action( 'acf/load_field/key=field_56e04a740c977', 'fill_chief_engine' );

