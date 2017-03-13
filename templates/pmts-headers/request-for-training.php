<div class="pmts-header">
	
	<?php get_template_part( 'templates/logo_image' ); ?>

	<div class="name-of-course">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<?php if ( have_rows('courses_app') ) : while( have_rows('courses_app') ): the_row(); ?>

				<?php $course = get_field('course_name_app'); var_dump($course); die(); ?>

			<?php endwhile; endif; wp_reset_query(); ?>	

		<?php endwhile; endif; wp_reset_query(); ?>

	</div>

</div>