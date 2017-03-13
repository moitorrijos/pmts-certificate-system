<?php

function my_courses_post_object_results( $title, $post, $field, $post_id ) {

    // add post type to each result
    if ( $post->ID != 97 && $post->ID != 81 ) {
    	$title .= ' (' . $post->abbr .  ')';
    }

    return $title;

}

add_filter('acf/fields/post_object/result/key=field_5612ff11fdc34', 'my_courses_post_object_results', 10, 4);

add_filter('acf/fields/post_object/result/key=field_56e04a980c978', 'my_courses_post_object_results', 10, 4);

add_filter('acf/fields/post_object/result/key=field_57890f2a200ba', 'my_courses_post_object_results', 10, 4);

add_filter('acf/fields/post_object/result/key=field_58839f02e1165', 'my_courses_post_object_results', 10, 4);