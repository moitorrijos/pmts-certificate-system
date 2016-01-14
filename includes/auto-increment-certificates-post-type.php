<?php

// Use a filter to make the change
add_filter( 'wp_insert_post_data' , 'modify_post_title' , '99', 2 );  
function modify_post_title( $data , $postarr ) {

    // Check for the custom post type and it's status
    // We only need to modify it when it's going to be published
    $posts_status = ['publish', 'future', 'pending', 'private', 'trash'];
    if( $data['post_type'] == 'certificates' && !in_array($data['post_status'], $posts_status)) {

        // Count the number of posts to check if the current post is the first one
        $count_posts = wp_count_posts('certificates');
        $published_posts = $count_posts->publish;

        // Check if it's the first one
        if ($published_posts == 0) {

            // Save the title and the slug
            $data['post_title'] = date('Y-m') . '-1';
            $data['post_name'] = sanitize_title($data['post_title']);

        } else {

            // Get the most recent post
            $args = array(
                'numberposts' => 1,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'certificates',
                'post_status' => 'publish'
            );
            $last_post = wp_get_recent_posts($args);
            // Get the title
            $last_post_title = $last_post['0']['post_title'];
            // Get the title and get the number from it.
            // We increment from that number
            $number = explode('-', $last_post_title);
            $number = intval($number[2]) + 1;

            // Save the title and the slug
            $data['post_title'] = date('Y-m') . '-' . $number;
            $data['post_name'] = sanitize_title($data['post_title']);

        }        
    }
    return $data;
}