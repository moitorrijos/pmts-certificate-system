<?php

add_filter( 'wp_insert_post_data' , 'modify_post_title' , '99', 2 );

function modify_post_title( $data , $postarr )
{

    if( $data['post_type'] == 'quotation' ) {
    	 $args = array(
            'numberposts' => 1,
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => 'quotation',
            'post_status' => 'publish'
        );
        $last_post = wp_get_recent_posts($args);
        $last__post_id = (int)$last_post[0]['ID'];
        $data['post_title'] = 'PMTS/Q/' . date('Y') . '/' . ($last__post_id + 1);
    }
    return $data;
}