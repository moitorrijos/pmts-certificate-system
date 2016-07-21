<?php

function modify_reports_code( $data , $postarr )
{
    global $_POST;

    if( $data['post_type'] == 'reports' ) {

        $count_reports = wp_count_posts('reports');
        $published_reports = $count_reports->publish;

        if ($published_reports == 0) {

            $data['post_title'] = 'PMTS/AMP/' . date('Y') . '/' . '111' ;

        } else {
        	 $args = array(
                'numberposts' => 1,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'reports',
                'post_status' => 'publish'
            );
            $last_report = wp_get_recent_posts($args);
            $last_report_title = $last_report['0']['post_title'];

            $last_report_title_number = explode('/', $last_report_title);
            $last_report_title_number = $last_report_title_number[3] + 1;

            $data['post_title'] = 'PMTS/AMP/' . date('Y') . '/' . $last_report_title_number;
        }

    }

    return $data;
}

add_filter( 'wp_insert_post_data' , 'modify_reports_code' , '99', 2 );