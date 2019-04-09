<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title(''); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> >

	<?php if ( is_page_template( 'new_panama_certificate.php' ) ) : ?>

		<div class="certificate-loader">
			<h2>Creating certificate, please wait...</h2>
		</div>

	<?php else : ?>

	<div class="loader"></div>

	<?php endif; ?>

	<?php if ( current_user_can('administrator') ) : ?>

		<a class="admin" href="<?php echo admin_url(); ?>"><i class="_mi _before dashicons dashicons-dashboard"></i></a>

	<?php endif; ?>

<header>

		<?php if ( is_user_logged_in() ) {

				get_template_part('templates/navigation');

			} else {

				get_template_part( 'templates/logo_image' );

				get_template_part( 'templates/login_form' );

				get_template_part('pmts-copyright');

			}
		?>

</header>