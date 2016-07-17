<?php

// Register Custom Taxonomy
function country_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Countries', 'Taxonomy General Name', 'certificate_system' ),
		'singular_name'              => _x( 'Country', 'Taxonomy Singular Name', 'certificate_system' ),
		'menu_name'                  => __( 'Country', 'certificate_system' ),
		'all_items'                  => __( 'All Countries', 'certificate_system' ),
		'parent_item'                => __( 'Parent Country', 'certificate_system' ),
		'parent_item_colon'          => __( 'Parent Country:', 'certificate_system' ),
		'new_item_name'              => __( 'New Country Name', 'certificate_system' ),
		'add_new_item'               => __( 'Add New Country', 'certificate_system' ),
		'edit_item'                  => __( 'Edit Country', 'certificate_system' ),
		'update_item'                => __( 'Update Country', 'certificate_system' ),
		'view_item'                  => __( 'View Country', 'certificate_system' ),
		'separate_items_with_commas' => __( 'Separate countries with commas', 'certificate_system' ),
		'add_or_remove_items'        => __( 'Add or remove countries', 'certificate_system' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'certificate_system' ),
		'popular_items'              => __( 'Popular countries', 'certificate_system' ),
		'search_items'               => __( 'Search countries', 'certificate_system' ),
		'not_found'                  => __( 'Not Found', 'certificate_system' ),
		'no_terms'                   => __( 'No countries', 'certificate_system' ),
		'items_list'                 => __( 'Countries list', 'certificate_system' ),
		'items_list_navigation'      => __( 'Countries list navigation', 'certificate_system' ),
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
	register_taxonomy( 'country', array( 'certificates', ' courses', ' instructors', ' quotation' ), $args );

}
add_action( 'init', 'country_taxonomy', 0 );