<?php 
	$signout_fa = '<i class="fa fa-sign-out"></i>';
	$user_fa = '<i class="fa fa-user"></i>';
	
	$current_user = wp_get_current_user();
?>
<div class="logout">


	<a href="<?php echo wp_logout_url( '/panama-certificates' ); ?>" class="logout-button">
		<?php echo $user_fa; ?>&nbsp; 
		Hi <?php echo $current_user->display_name; ?>
		<span class="click-logout">
			Click to Logout
			<?php echo $signout_fa; ?> 
		</span>
	</a>


</div>

<div class="navigation">
	
	<?php get_template_part( 'templates/nav-menu' ); ?>

</div>
