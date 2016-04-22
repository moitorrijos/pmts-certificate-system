<?php

function startsession() { 
	
	if (!session_id()){

		session_start();
    
	}
}

add_action( 'init', 'startsession', 1);

function save_post_to_session_vars( $post_id ) {
  
    $_SESSION['students_name'] = get_field('students_name', $post_id);

    $_SESSION['passport_id'] = get_field('passport_id', $post_id);

    $_SESSION['place_of_birth'] = get_field('place_of_birth', $post_id);

    $_SESSION['date_of_birth'] = get_field('date_of_birth', $post_id);

}

// run after ACF saves the $_POST['acf'] data
add_action('acf/save_post', 'save_post_to_session_vars', 20);


function load_session_vars_to_fields( $field ) {


    if ($field['name'] == 'students_name' && isset($_SESSION['students_name'])){

        $field['value'] = $_SESSION['students_name'];   

    }

    if ($field['name'] == 'passport_id' && isset($_SESSION['passport_id'])){

        $field['value'] = $_SESSION['passport_id'];
        
    }

    if ($field['name'] == 'place_of_birth' && isset($_SESSION['place_of_birth'])){

        $field['value'] = $_SESSION['place_of_birth'];   
        
    }

    if ($field['name'] == 'date_of_birth' && isset($_SESSION['date_of_birth'])){
        
        $new_date = date('Ymd', strtotime($_SESSION['date_of_birth']));

        $field['value'] = $new_date;

    }

    
	return $field;
}

add_filter('acf/load_field', 'load_session_vars_to_fields');



function my_cert_title_updater( $post_id ) {

   	//Auto update the post title to be the certificate name + abbr 
   	
   	$this_cert = array();

   	$this_cert['ID'] = $post_id;

   	$this_cert_part_name = get_field('students_name');

   	$this_cert_course = get_field('course');

}

// run after ACF saves the $_POST['fields'] data
add_action('acf/save_post', 'my_cert_title_updater', 18);