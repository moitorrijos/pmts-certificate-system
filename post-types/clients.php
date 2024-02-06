<?php

function clients_init() {
	register_post_type( 'clients', array(
		'labels'            => array(
			'name'                => __( 'Clients', 'certificate-system' ),
			'singular_name'       => __( 'Clients', 'certificate-system' ),
			'all_items'           => __( 'Clients', 'certificate-system' ),
			'new_item'            => __( 'New Clients', 'certificate-system' ),
			'add_new'             => __( 'Add New', 'certificate-system' ),
			'add_new_item'        => __( 'Add New Clients', 'certificate-system' ),
			'edit_item'           => __( 'Edit Clients', 'certificate-system' ),
			'view_item'           => __( 'View Clients', 'certificate-system' ),
			'search_items'        => __( 'Search Clients', 'certificate-system' ),
			'not_found'           => __( 'No Clients found', 'certificate-system' ),
			'not_found_in_trash'  => __( 'No Clients found in trash', 'certificate-system' ),
			'parent_item_colon'   => __( 'Parent Clients', 'certificate-system' ),
			'menu_name'           => __( 'Clients', 'certificate-system' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-groups',
	) );

}
add_action( 'init', 'clients_init' );

function clients_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['clients'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Clients updated. <a target="_blank" href="%s">View Clients</a>', 'certificate-system'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'certificate-system'),
		3 => __('Custom field deleted.', 'certificate-system'),
		4 => __('Clients updated.', 'certificate-system'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Clients restored to revision from %s', 'certificate-system'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Clients published. <a href="%s">View Clients</a>', 'certificate-system'), esc_url( $permalink ) ),
		7 => __('Clients saved.', 'certificate-system'),
		8 => sprintf( __('Clients submitted. <a target="_blank" href="%s">Preview Clients</a>', 'certificate-system'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Clients scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Clients</a>', 'certificate-system'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Clients draft updated. <a target="_blank" href="%s">Preview Clients</a>', 'certificate-system'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'clients_updated_messages' );
