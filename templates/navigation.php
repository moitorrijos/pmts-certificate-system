<?php 
	$signout_fa = '<i class="fa fa-sign-out"></i>';
	$user_fa = '<i class="fa fa-user"></i>';
	$filetext_fa = '<i class="fa fa-file-text-o"></i>';
	$graduation_fa = '<i class="fa fa-graduation-cap"></i>';
	$users_fa = '<i class="fa fa-users"></i>';
	$current_user = wp_get_current_user();
?>

<div class="navigation">
	<h3><?php echo $user_fa; ?>&nbsp; Hi <?php echo $current_user->display_name; ?></h3>
	
	<?php get_template_part( 'templates/nav-menu' ); ?>

</div>

<p class="logout">
	<a href="<?php echo wp_logout_url( '/panama-certificates' ); ?>" class="logout-button">
		<?php echo $signout_fa; ?> 
		Click to Logout
	</a>
</p>