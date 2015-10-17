<?php 


function add_courses_back_link() {
	global $current_screen;
	if ( $current_screen->post_type == 'courses' ) {
    	echo '<a href="#0" class="page-title-action">« Back to courses</a>';
	}
}

add_action( 'all_admin_notices', 'add_courses_back_link' );