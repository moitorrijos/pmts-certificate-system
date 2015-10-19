<?php

/**
 * For Front end forms
 */

add_filter( 'acf/get_valid_field', 'change_input_labels');

function change_input_labels( $field ) {

		if( $field['name'] == '_post_title' ) {
			$field['label'] = 'Name';
		}
		
	return $field;
		
}

/**
 * For back end placeholders
 */

add_filter( 'custom_enter_title', 'custom_enter_title' );

function custom_enter_title( $input ) {
    global $post_type;

    if ( is_admin() && 'courses' == $post_type ) {

        return 'Enter course name here...';

    } elseif ( is_admin() && 'instructors' == $post_type ) {

    	return 'Enter instructor name here...';

    }

    return $input;
}