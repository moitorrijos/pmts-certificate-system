<?php 
	$signout_fa = '<i class="fa fa-sign-out"></i>';
	$user_fa = '<i class="fa fa-user"></i>';
	
	$current_user = wp_get_current_user();
?>

<div class="navigation">
	
	<p class="logout">
		<?php echo $user_fa; ?>&nbsp; Hi <?php echo $current_user->display_name; ?>
	</p>
	
	<?php get_template_part( 'templates/nav-menu' ); ?>

	<a href="<?php echo wp_logout_url( '/panama-certificates' ); ?>" class="logout-button">
		Click to Logout
		<?php echo $signout_fa; ?> 
	</a>

</div>
