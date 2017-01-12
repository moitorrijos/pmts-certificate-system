<?php

function modify_application_code( $data , $postarr )
{
    global $_POST;

    if( $data['post_type'] == 'applications' ) {

        $count_applications = wp_count_posts('applications');
        $published_applications = $count_applications->publish;

        if ($published_applications == 0) {

            $data['post_title'] = 'PMTS/APF/' . date('Y') . '/' . '111' ;

        } else {
        	 $args = array(
                'numberposts' => 1,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'applications',
                'post_status' => 'publish'
            );
            $last_application = wp_get_recent_posts($args);
            $last_application_title = $last_application['0']['post_title'];

            $last_application_title_number = explode('/', $last_application_title);
            $last_application_title_number = $last_application_title_number[3] + 1;

            $data['post_title'] = 'PMTS/APP/' . date('Y') . '/' . $last_application_title_number;
        }

    }

    return $data;
}

add_filter( 'wp_insert_post_data' , 'modify_application_code' , '99', 2 );