<?php get_header();

is_user_logged_in() ? get_template_part('templates/the-naked-loop') : get_template_part('templates/the_message');

get_footer(); ?>