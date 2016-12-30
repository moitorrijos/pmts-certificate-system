<?php

// Register Custom Taxonomy
function location_taxonomies() {

	$labels = array(
		'name'                       => _x( 'Locations', 'Taxonomy General Name', 'certificate_system' ),
		'singular_name'              => _x( 'Location', 'Taxonomy Singular Name', 'certificate_system' ),
		'menu_name'                  => __( 'Locations', 'certificate_system' ),
		'all_items'                  => __( 'All Locations', 'certificate_system' ),
		'parent_item'                => __( 'Parent Location', 'certificate_system' ),
		'parent_item_colon'          => __( 'Parent Location:', 'certificate_system' ),
		'new_item_name'              => __( 'New Location Name', 'certificate_system' ),
		'add_new_item'               => __( 'Add Location', 'certificate_system' ),
		'edit_item'                  => __( 'Edit Location', 'certificate_system' ),
		'update_item'                => __( 'Update Location', 'certificate_system' ),
		'view_item'                  => __( 'View Location', 'certificate_system' ),
		'separate_items_with_commas' => __( 'Separate Locations with commas', 'certificate_system' ),
		'add_or_remove_items'        => __( 'Add or remove Locations', 'certificate_system' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'certificate_system' ),
		'popular_items'              => __( 'Popular Locations', 'certificate_system' ),
		'search_items'               => __( 'Search Locations', 'certificate_system' ),
		'not_found'                  => __( 'Not Found', 'certificate_system' ),
		'no_terms'                   => __( 'No Locations', 'certificate_system' ),
		'items_list'                 => __( 'Locations list', 'certificate_system' ),
		'items_list_navigation'      => __( 'Locations list navigation', 'certificate_system' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'location', array( 'certificates', 'courses', ' instructors', ' quotation' ), $args );

}
add_action( 'init', 'location_taxonomies', 0 );