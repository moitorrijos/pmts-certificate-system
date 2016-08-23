<?php

/**
 * Certificates Post Types
 * Created with WP-CLI
 * 
 */

function certificates_init() {
	register_post_type( 'certificates', array(
		'labels'            => array(
			'name'                => __( 'Certificates', 'certificate-system' ),
			'singular_name'       => __( 'Certificate', 'certificate-system' ),
			'all_items'           => __( 'All Certificates', 'certificate-system' ),
			'new_item'            => __( 'New Certificates', 'certificate-system' ),
			'add_new'             => __( 'Add New', 'certificate-system' ),
			'add_new_item'        => __( 'Add New Certificates', 'certificate-system' ),
			'edit_item'           => __( 'Edit Certificates', 'certificate-system' ),
			'view_item'           => __( 'View Certificates', 'certificate-system' ),
			'search_items'        => __( 'Search Certificates', 'certificate-system' ),
			'not_found'           => __( 'No Certificates found', 'certificate-system' ),
			'not_found_in_trash'  => __( 'No Certificates found in trash', 'certificate-system' ),
			'parent_item_colon'   => __( 'Parent Certificates', 'certificate-system' ),
			'menu_name'           => __( 'Certificates', 'certificate-system' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'revisions' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-format-aside',
	) );

}
add_action( 'init', 'certificates_init' );

function certificates_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['certificates'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Certificates updated. <a target="_blank" href="%s">View Certificates</a>', 'certificate-system'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'certificate-system'),
		3 => __('Custom field deleted.', 'certificate-system'),
		4 => __('Certificates updated.', 'certificate-system'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Certificates restored to revision from %s', 'certificate-system'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Certificates published. <a href="%s">View Certificates</a>', 'certificate-system'), esc_url( $permalink ) ),
		7 => __('Certificates saved.', 'certificate-system'),
		8 => sprintf( __('Certificates submitted. <a target="_blank" href="%s">Preview Certificates</a>', 'certificate-system'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Certificates scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Certificates</a>', 'certificate-system'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Certificates draft updated. <a target="_blank" href="%s">Preview Certificates</a>', 'certificate-system'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'certificates_updated_messages' );