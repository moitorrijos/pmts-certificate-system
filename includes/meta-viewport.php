<?php

/**
 * Prints favicon link to the head
 * 
 */
function register_meta_viewport() {
  echo '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
}
add_action( 'wp_head', 'register_meta_viewport' );