<?php

show_admin_bar(false);

function search_form() {
	
	return get_search_form();

}

add_shortcode( 'search', 'search_form' );