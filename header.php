<?php $show_menu = '<i class="fa fa-reorder"></i>'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php bloginfo('title'); wp_title('|'); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

<div class="loader"></div>

<header>

		<a href="#0" class="toggle-menu not-link">
			<?php echo $show_menu; ?>
		</a>

		<?php if ( is_user_logged_in() ) {

				get_template_part('templates/navigation');

			} else {

				get_template_part( 'templates/logo_image' );

				get_template_part('plugins/login-with-ajax/widget_out');

				get_template_part('pmts-copyright');

			}
		?>

</header>