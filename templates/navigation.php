<?php 
	$current_user = wp_get_current_user();

	$signout_fa = '<i class="fa fa-sign-out"></i>';
	$users_fa = '<i class="fa fa-user"></i>';
	$filetext_fa = '<i class="fa fa-file-text-o"></i>';
?>

<h3><?php echo $users_fa; ?>&nbsp; Welcome <?php echo $current_user->display_name; ?></h3>

<ul class="nav">
	<li><a href="<?php echo home_url('panama-certificates'); ?>"><?php echo $filetext_fa; ?>&nbsp; Panama Certificates</a></li>
	<li><a href="#0" class="deactivated"><?php echo $filetext_fa; ?>&nbsp; Belize Certificates</a></li>
	<li><a href="#0" class="deactivated"><?php echo $filetext_fa; ?>&nbsp; Honduras Certificates</a></li>
</ul>

<p class="logout">
	<a href="<?php echo wp_logout_url( '/panama-certificates' ); ?>" class="logout-button">
		<?php echo $signout_fa; ?> 
		Click to Logout
	</a>
</p>