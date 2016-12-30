<?php

// Register Custom Post Type
function applications_post_type() {

	$labels = array(
		'name'                  => _x( 'Applications', 'Post Type General Name', 'certificate-system' ),
		'singular_name'         => _x( 'Application', 'Post Type Singular Name', 'certificate-system' ),
		'menu_name'             => __( 'Applications', 'certificate-system' ),
		'name_admin_bar'        => __( 'Applications', 'certificate-system' ),
		'archives'              => __( 'Application Archives', 'certificate-system' ),
		'parent_item_colon'     => __( 'Parent Application:', 'certificate-system' ),
		'all_items'             => __( 'All Applications', 'certificate-system' ),
		'add_new_item'          => __( 'Add New Application', 'certificate-system' ),
		'add_new'               => __( 'Add New', 'certificate-system' ),
		'new_item'              => __( 'New Application', 'certificate-system' ),
		'edit_item'             => __( 'Edit Application', 'certificate-system' ),
		'update_item'           => __( 'Update Application', 'certificate-system' ),
		'view_item'             => __( 'View Application', 'certificate-system' ),
		'search_items'          => __( 'Search Application', 'certificate-system' ),
		'not_found'             => __( 'Not found', 'certificate-system' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'certificate-system' ),
		'featured_image'        => __( 'Featured Image', 'certificate-system' ),
		'set_featured_image'    => __( 'Set featured image', 'certificate-system' ),
		'remove_featured_image' => __( 'Remove featured image', 'certificate-system' ),
		'use_featured_image'    => __( 'Use as featured image', 'certificate-system' ),
		'insert_into_item'      => __( 'Insert into Application', 'certificate-system' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Application', 'certificate-system' ),
		'items_list'            => __( 'Applications list', 'certificate-system' ),
		'items_list_navigation' => __( 'Applications list navigation', 'certificate-system' ),
		'filter_items_list'     => __( 'Filter Applications list', 'certificate-system' ),
	);
	$applications_post_args = array(
		'label'                 => __( 'Applications', 'certificate-system' ),
		'description'           => __( 'Applications Description', 'certificate-system' ),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'revisions' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         	=> 'dashicons-welcome-widgets-menus',
	);
	register_post_type( 'applications', $applications_post_args );

}
add_action( 'init', 'applications_post_type' );