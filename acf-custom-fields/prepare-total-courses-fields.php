<?php

function my_acf_prepare_field( $field ) {

  if( $field['key'] === 'field_56e866046969c' ) {
      $field['type'] = 'text';
      $field['readonly'] = true;
  };
  return $field;
}

add_filter('acf/prepare_field', 'my_acf_prepare_field');