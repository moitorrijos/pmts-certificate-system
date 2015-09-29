<?php get_header(); ?>

	<div class="main">

		<?php is_user_logged_in() ? get_template_part('templates/the-naked-loop') : get_template_part('templates/message'); ?>

	</div>

<?php get_footer(); ?>