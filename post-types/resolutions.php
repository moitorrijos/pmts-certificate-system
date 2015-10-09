<?php

function resolutions_init() {
	register_post_type( 'resolutions', array(
		'labels'            => array(
			'name'                => __( 'Resolutions', 'certificate-system' ),
			'singular_name'       => __( 'Resolutions', 'certificate-system' ),
			'all_items'           => __( 'Resolutions', 'certificate-system' ),
			'new_item'            => __( 'New Resolutions', 'certificate-system' ),
			'add_new'             => __( 'Add New', 'certificate-system' ),
			'add_new_item'        => __( 'Add New Resolutions', 'certificate-system' ),
			'edit_item'           => __( 'Edit Resolutions', 'certificate-system' ),
			'view_item'           => __( 'View Resolutions', 'certificate-system' ),
			'search_items'        => __( 'Search Resolutions', 'certificate-system' ),
			'not_found'           => __( 'No Resolutions found', 'certificate-system' ),
			'not_found_in_trash'  => __( 'No Resolutions found in trash', 'certificate-system' ),
			'parent_item_colon'   => __( 'Parent Resolutions', 'certificate-system' ),
			'menu_name'           => __( 'Resolutions', 'certificate-system' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-book',
	) );

}
add_action( 'init', 'resolutions_init' );

function resolutions_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['resolutions'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Resolutions updated. <a target="_blank" href="%s">View Resolutions</a>', 'certificate-system'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'certificate-system'),
		3 => __('Custom field deleted.', 'certificate-system'),
		4 => __('Resolutions updated.', 'certificate-system'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Resolutions restored to revision from %s', 'certificate-system'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Resolutions published. <a href="%s">View Resolutions</a>', 'certificate-system'), esc_url( $permalink ) ),
		7 => __('Resolutions saved.', 'certificate-system'),
		8 => sprintf( __('Resolutions submitted. <a target="_blank" href="%s">Preview Resolutions</a>', 'certificate-system'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Resolutions scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Resolutions</a>', 'certificate-system'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Resolutions draft updated. <a target="_blank" href="%s">Preview Resolutions</a>', 'certificate-system'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'resolutions_updated_messages' );
