<?php

/**
 * Define Columns
 */

add_filter('manage_courses_posts_columns', 'courses_table_head');
function courses_table_head( $columns ) {

	unset($columns['date']);

    $columns['course_abbr']  = 'Course Abbr';
    $columns['course_imo_no']  = 'Course IMO No.';
    $columns['course_id']  = 'ID';
    return $columns;

}

/**
 * Show fields
 */

function courses_table_content( $column_name, $post_id ) {

    if( $column_name == 'course_id' ) {
        echo $post_id;
    }
    if( $column_name == 'course_abbr' ) {
        $course_abbr = get_post_meta( $post_id, 'abbr', true );
        echo $course_abbr;
    }
    if( $column_name == 'course_imo_no' ) {
        $course_imo_no = get_post_meta( $post_id, 'imo_no', true );
        echo $course_imo_no;
    }

}

add_action( 'manage_courses_posts_custom_column', 'courses_table_content', 10, 2 );