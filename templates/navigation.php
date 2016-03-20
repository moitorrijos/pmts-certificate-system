<?php 
	$signout_fa = '<i class="fa fa-sign-out"></i>';
	$user_fa = '<i class="fa fa-user"></i>';
	
	$current_user = wp_get_current_user();
?>
<p class="logout">
	<a href="<?php echo wp_logout_url( '/panama-certificates' ); ?>" class="logout-button">
		<?php echo $user_fa; ?>&nbsp; Hi <?php echo $current_user->display_name; ?>
		Click here to logout
		<?php echo $signout_fa; ?> 
	</a>
</p>

<div class="navigation">
	
	
	<?php get_template_part( 'templates/nav-menu' ); ?>


</div>
