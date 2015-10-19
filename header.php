<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('title'); wp_title('|'); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<header>
	<div class="logo">
		<img src="<?php echo IMAGESPATH . '/pmts-logo-certificate.png'; ?>" />
	</div>

	<?php if ( is_user_logged_in() ) {

			get_template_part('templates/navigation');

		} else {

			get_template_part('plugins/login-with-ajax/widget_out');

			get_template_part('pmts-copyright');

		}
	?>

</header>