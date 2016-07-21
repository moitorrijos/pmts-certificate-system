<?php

function fill_deck_courses( $field ) {
	if ( $field['name'] == 'course_name' ){
		$field['value'] = random_int( 47 , 97 );
	}
	/*echo '<pre>';
	var_dump($field[]);
	echo '</pre>';*/

	return $field;

}

add_action( 'acf/load_field', 'fill_deck_courses' );