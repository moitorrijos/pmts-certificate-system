<?php

function add_other_course_meta_boxes() {
	add_meta_box( 'course-ft-i', 'Course F-TI', 'course_ft_i', 'courses', 'side', 'low' );
}

add_action( 'add_meta_boxes', 'add_other_course_meta_boxes' );

// The Event Location Metabox

function course_ft_i() {
	global $post;

	echo '<input type="hidden" name="course_noncename" id="course_noncename" value="' . 
	wp_create_nonce( $post->ID . '_course_fti' ) . '" />';
	
	echo '<input type="text" name="_fti" value="" class="widefat" />';

}

function save_other_course_meta( $post_id, $post ) {
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['course_noncename'], $post->ID . '_course_fti' )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID )) {
		return $post->ID;
	}

	$course_meta['_fti'] = $_POST['_fti'];


}

add_action( 'save_post', 'save_other_course_meta' );