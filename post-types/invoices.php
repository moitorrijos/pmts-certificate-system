<?php

// Register Custom Post Type
function invoices_post_type() {

	$labels = array(
		'name'                  => _x( 'Invoices', 'Post Type General Name', 'certificate-system' ),
		'singular_name'         => _x( 'Invoice', 'Post Type Singular Name', 'certificate-system' ),
		'menu_name'             => __( 'Invoices', 'certificate-system' ),
		'name_admin_bar'        => __( 'Invoice', 'certificate-system' ),
		'archives'              => __( 'Invoice Archives', 'certificate-system' ),
		'parent_item_colon'     => __( 'Parent Invoice:', 'certificate-system' ),
		'all_items'             => __( 'All Invoices', 'certificate-system' ),
		'add_new_item'          => __( 'Add New Invoice', 'certificate-system' ),
		'add_new'               => __( 'Add New', 'certificate-system' ),
		'new_item'              => __( 'New Invoice', 'certificate-system' ),
		'edit_item'             => __( 'Edit Invoice', 'certificate-system' ),
		'update_item'           => __( 'Update Invoice', 'certificate-system' ),
		'view_item'             => __( 'View Invoice', 'certificate-system' ),
		'search_items'          => __( 'Search Invoice', 'certificate-system' ),
		'not_found'             => __( 'Not found', 'certificate-system' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'certificate-system' ),
		'featured_image'        => __( 'Featured Image', 'certificate-system' ),
		'set_featured_image'    => __( 'Set featured image', 'certificate-system' ),
		'remove_featured_image' => __( 'Remove featured image', 'certificate-system' ),
		'use_featured_image'    => __( 'Use as featured image', 'certificate-system' ),
		'insert_into_item'      => __( 'Insert into Invoice', 'certificate-system' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Invoice', 'certificate-system' ),
		'items_list'            => __( 'Invoices list', 'certificate-system' ),
		'items_list_navigation' => __( 'Invoices list navigation', 'certificate-system' ),
		'filter_items_list'     => __( 'Filter Invoices list', 'certificate-system' ),
	);
	$invoices_post_args = array(
		'label'                 => __( 'Invoices', 'certificate-system' ),
		'description'           => __( 'Invoices Description', 'certificate-system' ),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'revisions' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         	=> 'dashicons-analytics',
	);
	register_post_type( 'invoices', $invoices_post_args );

}
add_action( 'init', 'invoices_post_type' );