<?php

function modify_intial_reports_code( $data , $postarr )
{
    global $_POST;

    if( $data['post_type'] == 'initial_reports' ) {

        $count_reports = wp_count_posts('initial_reports');
        $published_reports = $count_reports->publish;

        if ($published_reports == 0) {

            $data['post_title'] = 'PMTS/AMPIR/' . date('Y') . '/' . add_leading_zeroes(1) . '1' ;

        } else {
        	 $args = array(
                'numberposts' => 1,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'initial_reports',
                'post_status' => 'publish'
            );
            $last_report = wp_get_recent_posts($args);
            $last_report_title = $last_report['0']['post_title'];

            $last_report_title_number = explode('/', $last_report_title);
            $last_report_title_number = $last_report_title_number[3] + 1;

            $data['post_title'] = 'PMTS/AMPIR/' . date('Y') . '/' . add_leading_zeroes($last_report_title_number) . $last_report_title_number;
        }

    }

    return $data;
}

add_filter( 'wp_insert_post_data' , 'modify_intial_reports_code' , '99', 2 );