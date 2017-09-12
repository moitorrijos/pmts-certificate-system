<?php

function save_post_to_session_vars( $post_id ) {
  
    $_SESSION['students_name'] = get_field('students_name', $post_id);

    $_SESSION['passport_id'] = get_field('passport_id', $post_id);

    $_SESSION['place_of_birth'] = get_field('place_of_birth', $post_id);

    $_SESSION['student_nationality'] = get_field('student_nationality', $post_id);

    $_SESSION['date_of_birth'] = get_field('date_of_birth', $post_id);

    $_SESSION['office'] = get_field('office', $post_id);

    $_SESSION['instructor'] = get_field('instructor', $post_id);

    $_SESSION['course'] = get_field('course', $post_id);

    $_SESSION['start_date'] = get_field('start_date', $post_id);

    $_SESSION['end_date'] = get_field('end_date', $post_id);

    $_SESSION['date_of_issuance'] = get_field('date_of_issuance', $post_id);

}

add_action('acf/save_post', 'save_post_to_session_vars', 20);

function load_session_vars_to_fields( $field ) {

  if ( is_page_template( 'new_panama_certificate.php' ) ) {

      if ($field['name'] == 'students_name' && isset($_SESSION['students_name'])){

          $field['value'] = $_SESSION['students_name'];   

      }

      if ($field['name'] == 'passport_id' && isset($_SESSION['passport_id'])){

          $field['value'] = $_SESSION['passport_id'];
          
      }

      if ($field['name'] == 'place_of_birth' && isset($_SESSION['place_of_birth'])){

          $field['value'] = $_SESSION['place_of_birth'];   
          
      }

      if ($field['name'] == 'student_nationality' && isset($_SESSION['student_nationality'])){

          $field['value'] = $_SESSION['student_nationality'];   
          
      }

      if ($field['name'] == 'date_of_birth' && isset($_SESSION['date_of_birth'])){
          
          $new_date = date('Ymd', strtotime($_SESSION['date_of_birth']));

          $field['value'] = $new_date;

      }

      if ($field['name'] == 'office' && isset($_SESSION['office'])){

        if ( is_object($_SESSION['office']) ) {
          $field['value'] = $_SESSION['office']->term_id;
        } else {
          $field['value'] = $_SESSION['office'];
        }
          
      }

      if ($field['name'] == 'instructor' && isset($_SESSION['instructor'])){

        if ( is_object($_SESSION['instructor']) ) {
          $field['value'] = $_SESSION['instructor']->ID;
        } else {
          $field['value'] = $_SESSION['instructor'];
        }

          
      }

      if ($field['name'] == 'course' && isset($_SESSION['course'])){

          if ( is_object($_SESSION['course']) ) {
            $field['value'] = $_SESSION['course']->ID;
          } else {
            $field['value'] = $_SESSION['course'];
          }
          
      }

      if ($field['name'] == 'resolution' && isset($_SESSION['office'])){

        if ( $_SESSION['office']->slug === 'ob') {
          $field['value'] = 'DGGM-CFM-037-2017';
        }

      }

      if ($field['name'] == 'resolution_date' && isset($_SESSION['office'])){

        if ( $_SESSION['office']->slug === 'ob') {
          $field['value'] = '9 August, 2017';
        }

      }

      if ($field['name'] == 'start_date' && isset($_SESSION['start_date'])){
          
          $start_date = date('Ymd', strtotime($_SESSION['start_date']));

          $field['value'] = $start_date;

      }

      if ($field['name'] == 'end_date' && isset($_SESSION['end_date'])){
          
          $end_date = date('Ymd', strtotime($_SESSION['end_date']));

          $field['value'] = $end_date;

      }

      if ($field['name'] == 'date_of_issuance' && isset($_SESSION['date_of_issuance'])){
          
          $date_of_issuance = date('Ymd', strtotime($_SESSION['date_of_issuance']));

          $field['value'] = $date_of_issuance;

      }

  }
	
  return $field;

}

add_filter('acf/load_field', 'load_session_vars_to_fields');