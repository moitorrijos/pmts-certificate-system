<?php 
	$current_user = wp_get_current_user();
?>

<h3>Welcome <?php echo $current_user->display_name; ?></h3>
<p class="logout"><a href="<?php echo wp_logout_url( '/panama-certificates' ); ?>">Click to Logout »</a></p>

<ul class="nav">
	<li><a href="<?php echo home_url('panama-certificates'); ?>">Panama Certificates</a></li>
	<li><a href="#0" class="deactivated">Belize Certificates</a></li>
	<li><a href="#0" class="deactivated">Honduras Certificates</a></li>
</ul>