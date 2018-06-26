<?php

function fill_yacht_courses( $field ) {

if( isset($_GET['action']) && $_GET['action'] == 'fill_yacht_courses') {

	if ( $field['key'] == 'field_56e04a740c977' ){

		$field['value'] = array(
			array( 'field_56e04a980c978' => 92 ),
			array( 'field_56e04a980c978' => 91 ),
			array( 'field_56e04a980c978' => 96 ),
			array( 'field_56e04a980c978' => 69 ),
			array( 'field_56e04a980c978' => 83 ),
			array( 'field_56e04a980c978' => 81 ),
			array( 'field_56e04a980c978' => 72 ),
			array( 'field_56e04a980c978' => 49 ),
			array( 'field_56e04a980c978' => 75 ),
			array( 'field_56e04a980c978' => 73 ),
		);

	}

}

return $field;

}

add_action( 'acf/load_field/key=field_56e04a740c977', 'fill_yacht_courses' );