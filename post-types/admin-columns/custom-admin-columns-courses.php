<?php

/**
 * Define Columns
 */

add_filter('manage_courses_posts_columns', 'courses_table_head');
function courses_table_head( $columns ) {

	unset($columns['date']);

    $columns['course_abbr']  = 'Course Abbr';
    $columns['course_imo_no']  = 'Course IMO No.';
    $columns['course_regulation'] = 'Course IMO Regulations';
    $columns['course_duration'] = 'Course Duration in days';
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
    if( $column_name == 'course_regulation' ) {
        $course_regulation = get_post_meta( $post_id, 'regulation', true );
        echo $course_regulation;
    }
    if( $column_name == 'course_duration' ) {
        $course_duration = get_post_meta( $post_id, 'duration', true );
        echo $course_duration;
    }

}

add_action( 'manage_courses_posts_custom_column', 'courses_table_content', 10, 2 );

/**
 * Table width
 */

function courses_posts_column_width() {
    $columns_css = '<style>
        #course_abbr { width: 7%; }
        #course_imo_no { width: 7%; }
        #course_regulation { width: 30%; }
        #course_duration { width: 7%; }
        #course_id { width: 7%; }
    </style>';

    echo $columns_css;
}

add_action( 'admin_head', 'courses_posts_column_width' );