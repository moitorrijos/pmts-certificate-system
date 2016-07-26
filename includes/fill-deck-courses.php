<?php

function fill_deck_courses( $field ) {

	if( isset($_GET['action']) && $_GET['action'] == 'fill_deck_courses') {

		if ( $field['key'] == 'field_56e04a740c977' ){

			$field['value'] = array(

				array(
					'field_56e04a980c978' => 92
				), 
				
				array(
					'field_56e04a980c978' => 91
				), 

				array(
					'field_56e04a980c978' => 96
				), 
				
				array(
					'field_56e04a980c978' => 69
				), 
				

			);

		}

		return $field;
		
	}

}



add_action( 'acf/load_field/key=field_56e04a740c977', 'fill_deck_courses' );