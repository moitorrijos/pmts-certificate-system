<?php

// Register Custom Taxonomy
function offices_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Offices', 'Taxonomy General Name', 'certificate_system' ),
		'singular_name'              => _x( 'Office', 'Taxonomy Singular Name', 'certificate_system' ),
		'menu_name'                  => __( 'Offices', 'certificate_system' ),
		'all_items'                  => __( 'All Offices', 'certificate_system' ),
		'parent_item'                => __( 'Parent Office', 'certificate_system' ),
		'parent_item_colon'          => __( 'Parent Office:', 'certificate_system' ),
		'new_item_name'              => __( 'New Office Name', 'certificate_system' ),
		'add_new_item'               => __( 'Add Office', 'certificate_system' ),
		'edit_item'                  => __( 'Edit Office', 'certificate_system' ),
		'update_item'                => __( 'Update Office', 'certificate_system' ),
		'view_item'                  => __( 'View Office', 'certificate_system' ),
		'separate_items_with_commas' => __( 'Separate offices with commas', 'certificate_system' ),
		'add_or_remove_items'        => __( 'Add or remove offices', 'certificate_system' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'certificate_system' ),
		'popular_items'              => __( 'Popular Offices', 'certificate_system' ),
		'search_items'               => __( 'Search Offices', 'certificate_system' ),
		'not_found'                  => __( 'Not Found', 'certificate_system' ),
		'no_terms'                   => __( 'No offices', 'certificate_system' ),
		'items_list'                 => __( 'offices list', 'certificate_system' ),
		'items_list_navigation'      => __( 'Offices list navigation', 'certificate_system' ),
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
	register_taxonomy( 'office', array( 'certificates', 'courses', ' instructors', ' quotation' ), $args );

}
add_action( 'init', 'offices_taxonomy', 0 );