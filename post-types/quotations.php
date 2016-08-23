<?php

function panama_quotation_init() {
	register_post_type( 'quotation', array(
		'labels'            => array(
			'name'                => __( 'Quotations', 'certificate-system' ),
			'singular_name'       => __( 'Quotation', 'certificate-system' ),
			'all_items'           => __( 'All Quotations', 'certificate-system' ),
			'new_item'            => __( 'New Quotation', 'certificate-system' ),
			'add_new'             => __( 'Add New', 'certificate-system' ),
			'add_new_item'        => __( 'Add New Quotation', 'certificate-system' ),
			'edit_item'           => __( 'Edit Quotation', 'certificate-system' ),
			'view_item'           => __( 'View Quotation', 'certificate-system' ),
			'search_items'        => __( 'Search Quotations', 'certificate-system' ),
			'not_found'           => __( 'No Quotations found', 'certificate-system' ),
			'not_found_in_trash'  => __( 'No Quotations found in trash', 'certificate-system' ),
			'parent_item_colon'   => __( 'Parent Quotation', 'certificate-system' ),
			'menu_name'           => __( 'Quotations', 'certificate-system' ),
		),
		'public'            => true,
		'hierarchical'      => false,
		'show_ui'           => true,
		'show_in_nav_menus' => true,
		'supports'          => array( 'title', 'editor', 'revisions' ),
		'has_archive'       => true,
		'rewrite'           => true,
		'query_var'         => true,
		'menu_icon'         => 'dashicons-media-spreadsheet',
	) );

}
add_action( 'init', 'panama_quotation_init' );

function panama_quotation_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['quotation'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => sprintf( __('Quotation updated. <a target="_blank" href="%s">View Quotation</a>', 'certificate-system'), esc_url( $permalink ) ),
		2 => __('Custom field updated.', 'certificate-system'),
		3 => __('Custom field deleted.', 'certificate-system'),
		4 => __('Quotation updated.', 'certificate-system'),
		/* translators: %s: date and time of the revision */
		5 => isset($_GET['revision']) ? sprintf( __('Quotation restored to revision from %s', 'certificate-system'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		6 => sprintf( __('Quotation published. <a href="%s">View Quotation</a>', 'certificate-system'), esc_url( $permalink ) ),
		7 => __('Quotation saved.', 'certificate-system'),
		8 => sprintf( __('Quotation submitted. <a target="_blank" href="%s">Preview Quotation</a>', 'certificate-system'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		9 => sprintf( __('Quotation scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Quotation</a>', 'certificate-system'),
		// translators: Publish box date format, see http://php.net/date
		date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		10 => sprintf( __('Quotation draft updated. <a target="_blank" href="%s">Preview Quotation</a>', 'certificate-system'), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'panama_quotation_updated_messages' );