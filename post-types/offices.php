<?php

function office_init() {
	register_post_type( 'office', array(
		'labels'            => array(
			'name'                => __( 'Offices', 'certification-system' ),
			'singular_name'       => __( 'Office', 'certification-system' ),
			'all_items'           => __( 'Offices', 'certification-system' ),
			'new_item'            => __( 'New Office', 'certification-system' ),
			'add_new'             => __( 'Add New', 'certification-system' ),
			'add_new_item'        => __( 'Add New Office', 'certification-system' ),
			'edit_item'           => __( 'Edit Office', 'certification-system' ),
			'view_item'           => __( 'View Office', 'certification-system' ),
			'search_items'        => __( 'Search Offices', 'certification-system' ),
			'not_found'           => __( 'No Offices found', 'certification-system' ),
			'not_found_in_trash'  => __( 'No Offices found in trash', 'certification-system' ),
			'parent_item_colon'   => __( 'Parent Office', 'certification-system' ),
			'menu_name'           => __( 'Offices', 'certification-system' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-store',
	) );

}
add_action( 'init', 'office_init' );

function office_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['office'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Office updated. <a target="_blank" href="%s">View Office</a>', 'certification-system'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'certification-system'),
		3 => __('Custom field deleted.', 'certification-system'),
		4 => __('Office updated.', 'certification-system'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Office restored to revision from %s', 'certification-system'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Office published. <a href="%s">View Office</a>', 'certification-system'), esc_url( $permalink ) ),
		7 => __('Office saved.', 'certification-system'),
		8 => sprintf( __('Office submitted. <a target="_blank" href="%s">Preview Office</a>', 'certification-system'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Office scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Office</a>', 'certification-system'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Office draft updated. <a target="_blank" href="%s">Preview Office</a>', 'certification-system'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'office_updated_messages' );