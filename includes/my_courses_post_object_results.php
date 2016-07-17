<?php

function my_courses_post_object_results( $title, $post, $field, $post_id ) {

    // add post type to each result
    $title .= ' (' . $post->abbr .  ')';

    return $title;

}

add_filter('acf/fields/post_object/result/key=field_5612ff11fdc34', 'my_courses_post_object_results', 10, 4);

add_filter('acf/fields/post_object/result/key=field_56e04a980c978', 'my_courses_post_object_results', 10, 4);