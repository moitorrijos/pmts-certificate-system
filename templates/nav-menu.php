<?php 

	$args = array(
		'theme_location'  => 'primary',
		'menu'            => '',
		'container'       => false,
		'menu_class'      => 'nav',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
	);

	wp_nav_menu( $args );

?>