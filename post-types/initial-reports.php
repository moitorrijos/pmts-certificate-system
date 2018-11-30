<?php

// Register Custom Post Type
function initial_reports_post_type() {

	$labels = array(
		'name'                  => _x( 'Initial Reports', 'Post Type General Name', 'certificate-system' ),
		'singular_name'         => _x( 'Initial Report', 'Post Type Singular Name', 'certificate-system' ),
		'menu_name'             => __( 'Initial Reports', 'certificate-system' ),
		'name_admin_bar'        => __( 'Initial Report', 'certificate-system' ),
		'archives'              => __( 'Initial Report Archives', 'certificate-system' ),
		'parent_item_colon'     => __( 'Parent Report:', 'certificate-system' ),
		'all_items'             => __( 'All Reports', 'certificate-system' ),
		'add_new_item'          => __( 'Add New Report', 'certificate-system' ),
		'add_new'               => __( 'Add New', 'certificate-system' ),
		'new_item'              => __( 'New Report', 'certificate-system' ),
		'edit_item'             => __( 'Edit Report', 'certificate-system' ),
		'update_item'           => __( 'Update Report', 'certificate-system' ),
		'view_item'             => __( 'View Report', 'certificate-system' ),
		'search_items'          => __( 'Search Report', 'certificate-system' ),
		'not_found'             => __( 'Not found', 'certificate-system' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'certificate-system' ),
		'featured_image'        => __( 'Featured Image', 'certificate-system' ),
		'set_featured_image'    => __( 'Set featured image', 'certificate-system' ),
		'remove_featured_image' => __( 'Remove featured image', 'certificate-system' ),
		'use_featured_image'    => __( 'Use as featured image', 'certificate-system' ),
		'insert_into_item'      => __( 'Insert into report', 'certificate-system' ),
		'uploaded_to_this_item' => __( 'Uploaded to this report', 'certificate-system' ),
		'items_list'            => __( 'Initial reports list', 'certificate-system' ),
		'items_list_navigation' => __( 'Initial reports list navigation', 'certificate-system' ),
		'filter_items_list'     => __( 'Filter reports list', 'certificate-system' ),
	);
	$initial_reports_post_args = array(
		'label'                 => __( 'Initial Reports', 'certificate-system' ),
		'description'           => __( 'Initial Reports Description', 'certificate-system' ),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'revisions' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         	=> 'dashicons-media-document',
	);
	register_post_type( 'initial_reports', $initial_reports_post_args );

}
add_action( 'init', 'initial_reports_post_type' );