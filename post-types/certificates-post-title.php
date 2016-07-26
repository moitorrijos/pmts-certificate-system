<?php

function modify_certificate_title( $data , $postarr ) 
{
	global $_POST;

	if ( $data['post_type'] == 'certificates' ) {

        if ( !is_admin() ) {

            $passport = $_POST['acf']['field_5612fe8fe2a39'];
            $student_name = $_POST['acf']['field_5618388c2ff51'];
            $get_issue_date = $_POST['acf']['field_5619b16e70c02'];
            $get_course = $_POST['acf']['field_5612ff11fdc34'];
            $course_abbr = get_post_meta( $get_course, 'abbr', true );
            $issue_date = DateTime::createFromFormat( 'Ymd', $get_issue_date )->format('d/m/Y');

            $data['post_title'] = $student_name . ' ' . $passport . ' ' . $course_abbr . ' ' . $issue_date . '-' . date('His');

        }

    }

    return $data;

}

add_filter( 'wp_insert_post_data' , 'modify_certificate_title' , '99', 22 );