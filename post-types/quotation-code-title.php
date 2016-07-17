<?php

function modify_quote_title( $data , $postarr )
{
    global $_POST;

    if( $data['post_type'] == 'quotation' ) {

        $count_quotation = wp_count_posts('quotation');
        $published_quotations = $count_quotation->publish;

        if ($published_quotations == 0) {

            $data['post_title'] = 'PMTS/Q/' . date('Y') . '/' . '222' ;

        } else {
        	 $args = array(
                'numberposts' => 1,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_type' => 'quotation',
                'post_status' => 'publish'
            );
            $last_quote = wp_get_recent_posts($args);
            $last_quote_title = $last_quote['0']['post_title'];

            $last_quote_title_number = explode('/', $last_quote_title);
            $last_quote_title_number = $last_quote_title_number[3] + 1;

            $data['post_title'] = 'PMTS/Q/' . date('Y') . '/' . $last_quote_title_number;
        }

    }

    return $data;
}

add_filter( 'wp_insert_post_data' , 'modify_quote_title' , '99', 2 );