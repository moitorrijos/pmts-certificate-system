<?php 
/**
 * Add link to local or remote to admin bar
 * 
 */

function local_remote_admin_bar($wp_admin_bar){
	$home_url = home_url();

	if ($home_url == 'http://certificate-system:8888'){
		$admin_bar_args = array(
			'id' 	=> 'remote-button',
			'title' => 'Go to Remote',
			'href' 	=> 'http://certificates.panamamaritimetraining.com/wp-admin/',
			'meta'	=> array( 'class' => 'admin-bar-remote-button', 'target' => '_blank' )
		);
	} else {
		$admin_bar_args = array(
			'id' 	=> 'local-button',
			'title' => 'Go to Local',
			'href' 	=> 'http://certificate-system:8888/wp-admin/',
			'meta'	=> array( 'class' => 'admin-bar-local-button', 'target' => '_blank' )
		);
	}
	$wp_admin_bar->add_node($admin_bar_args);
}

add_action('admin_bar_menu', 'local_remote_admin_bar', 60);