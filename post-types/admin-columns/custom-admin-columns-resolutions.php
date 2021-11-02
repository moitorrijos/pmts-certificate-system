<?php

/**
 * Define Columns
 */

 add_filter('manage_resolutions_posts_columns', 'resolution_table_head');

 function resolution_table_head( $columns ) {

  unset($columns['date']);

  $columns['date_of_issuance'] = 'Date of Issuance';
  $columns['expiry_date'] = 'Expiry Date';

  return $columns;

 }

 add_action( 'manage_resolutions_posts_custom_column', 'resolution_table_content', 10, 2 );

 function resolution_table_content( $column_name, $post_id ) {

  if ( $column_name == 'date_of_issuance' ) {
    $date_of_issuance = get_post_meta( $post_id, 'resolution_issue_date', true );
    $date_of_issuance = DateTime::createFromFormat('Ymd', $date_of_issuance);
    if ($date_of_issuance) {
      echo $date_of_issuance->format('j F Y');
    } else {
      echo '';
    }
  }

  if ( $column_name == 'expiry_date' ) {
    $expiry_date = get_post_meta( $post_id, 'resolution_expiry_date', true );
    $expiry_date = DateTime::createFromFormat('Ymd', $expiry_date);
    if ($expiry_date) {
      echo $expiry_date->format('j F Y');
    } else {
      echo '';
    }
  }
 }